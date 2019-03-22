<?php

namespace App\Api\V1\Web\Media\Repositories\Media\Create;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Media;
use App\Models\User;
use App\Web\Media\Traits\MediaFileTrait;
use DateTime;
use DateInterval;
use Exception;
use DB;

class CreateRepository 
{
	use MediaFileTrait;

    public function create(array $data): void
    {
        try {
            $user = Auth::user();
            $data['file'] = $this->uploadVideo($data, $user);
            $data['thumbnail'] = $this->uploadThumbnail($data, $user);
            $data['expires_at'] = $this->calculateExpiresAt($data);

            DB::beginTransaction();
            $saveData = [
                'user_id' => $user->id,
                'file' => $data['file'],
                'thumbnail' => $data['thumbnail'],
                'title' => $data['title'],
                'description' => $data['description'],
                'cost' => $data['cost'],
                'expires_at' => $data['expires_at'],
                'duration' => $data['duration'],
            ];
            $media = Media::create($saveData);     
            $hashtags = explode(',', $data['hashtags']);
            $media->hashtags()->attach($hashtags);
                
            DB::commit();   
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

    }

    private function uploadVideo(array $data, User $user) : string
    {
    	$uploadPath = $this->getMediaUploadPath($user->id);
    	$video = $data['video'];
    	$videoName = sprintf('%s_%s_%s.%s', time(), rand(), $user->id, $video->extension());
    	Storage::putFileAs($uploadPath, $video, $videoName);

    	return $videoName;
    }

    private function uploadThumbnail(array $data, User $user): string
    {
    	//decode image
    	$img = str_replace('data:image/jpeg;base64,', '', $data['thumbnail']);
		$img = str_replace(' ', '+', $img);
		$image = base64_decode($img);

		//remove extension from video
		$withoutExt = preg_replace('/\\.[^.\\s]{2,4}$/', '', $data['file']);

		//save image
		$thumbnailName = sprintf('thumbnail_%s.%s', $withoutExt, 'jpg');
		$uploadPath = $this->getMediaAbsoluteUploadPath($user->id); 
		file_put_contents(sprintf('%s/%s', $uploadPath, $thumbnailName), $image);

		return $thumbnailName;
    }

    private function calculateExpiresAt(array $data): ?string
    {
        if (Media::EXPIRY_TYPE_NEVER === $data['expiry_type']) {
            return null;
        }
        
        $date = new DateTime();

        switch ($data['expires_in_type']) {
            case Media::EXPIRY_TIME_DAYS:
                $date->add(new DateInterval(sprintf('P%dD', $data['expires_in'])));
                break;
            
            case Media::EXPIRY_TIME_HOURS:
                $date->add(new DateInterval(sprintf('PT%dH', $data['expires_in'])));
                break;

            case Media::EXPIRY_TIME_MINUTES:
                $date->add(new DateInterval(sprintf('PT%dM', $data['expires_in'])));
                break;
        }

        return $date->format('Y-m-d H:i:s');
    }
}
