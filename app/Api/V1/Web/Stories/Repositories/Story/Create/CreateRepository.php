<?php

namespace App\Api\V1\Web\Stories\Repositories\Story\Create;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Story;
use Exception;
use DB;
use App\Models\StoryMedia;
use DateInterval;
use DateTime;
use App\Web\Stories\Traits\StoryFileTrait;
use App\Helpers\Traits\ImageManipulationTrait;

class CreateRepository 
{
	use StoryFileTrait, ImageManipulationTrait;

    public function create(array $data): void
    {
    	try {
	    	$user = Auth::user();
	    	$data['expires_at'] = $this->calculateExpiresAt($data);

	    	DB::beginTransaction();
			$saveData = [
	    		'user_id' => $user->id,
				'expires_at' => $data['expires_at'],
	    	];
	    	$story = Story::create($saveData);

	    	$storyMediaData = $this->uploadStoryMedia($data['stories'], $user->id);
            $story->media()->createMany($storyMediaData);
	    	DB::commit();
    	} catch (Exception $e) {
    		DB::rollBack();
    		throw $e;
    	}
    }

    private function uploadStoryMedia(array $stories, int $userId): array
    {
    	$storyMediaData = [];
    	foreach ($stories as $storyFile) {
	    	$uploadPath = $this->getStoryUploadPath($userId);
	    	$mediaName = sprintf('%s_%s_%s.%s', time(), rand(), $userId, $storyFile->extension());
	    	Storage::putFileAs($uploadPath, $storyFile, $mediaName);

    		if (false !== strpos($storyFile->getMimeType(), 'video')) {
    			$type = StoryMedia::TYPE_VIDEO;
    		} else {
    			$type = StoryMedia::TYPE_PHOTO;
    			$pictureAbsoluthePath = $this->getStoryPictureAbsolutePath($userId, $mediaName, date('Y'), date('m'));
    			$this->resizeOrientateAndLowerImageQuality($pictureAbsoluthePath, null, 1200);
    		}

    		$storyMediaData[] = [
    			'file' => $mediaName,
    			'type' => $type,
    		];
    	}

        return $storyMediaData;
    }

    private function calculateExpiresAt(array $data): ?string
    {
        $date = new DateTime();

        if (Story::EXPIRY_TYPE_NEVER === $data['expiry_type']) {
            $date->add(new DateInterval('PT24H'));
            return $date->format('Y-m-d H:i:s');
        }
        

        switch ($data['expires_in_type']) {
            case Story::EXPIRY_TIME_HOURS:
                $date->add(new DateInterval(sprintf('PT%dH', $data['expires_in'])));
                break;

            case Story::EXPIRY_TIME_MINUTES:
                $date->add(new DateInterval(sprintf('PT%dM', $data['expires_in'])));
                break;

            default:
                $date->add(new DateInterval('PT24H'));
                break;

        }

        return $date->format('Y-m-d H:i:s');
    }
}
