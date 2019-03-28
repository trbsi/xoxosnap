<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Media;
use App\Models\User;

class MediaSeeder extends Seeder
{
	public function run(User $user)
    {
    	$performers = $user->where('profile_type', User::USER_TYPE_PERFORMER)->get();

    	foreach ($performers as $key => $performer) {
    		//add various number of video for each performer
	   		$numberOfMedia = (($key + 1) > 12) ? 5 : $key + 1;

			for ($i = 0; $i < $numberOfMedia; $i++) {
	     		$fileName = sprintf('%s_%s_%s.mp4', date('YmdHisu'), $key, $i);
	     		$thumbnailName = sprintf('%s_%s_%s.jpg', date('YmdHisu'), $key, $i);
	     		$oldFilePath = sprintf('seeds/videos/%s.mp4', rand(1, 12));
	     		$thumbnailPath = sprintf('seeds/pictures/%s.jpg', rand(1, 20));

				$title = sprintf('Video title %s', mt_rand());
 		 		$data = [
					'title' => $title,
					'description' => 'Someone seems to enjoy the snow!Greetings from snowy Finland❄❄ #snow #test #lol #snap #porn',
					'file' => $fileName,
					'cost' => (rand(0,1) % 2 === 0) ? 5 : 0,
					'expires_at' => $this->calculateExpiresAt(),
					'likes' => 123456,
					'views' => 123456,
					'created_at' => date('Y-m-d 00:00:00'),
					'thumbnail' => $thumbnailName,
					'duration' => 128,
				];
				$media = $performer->media()->create($data);

				//set url
				$media->slug = sprintf('%s-%s', str_slug($title), $media->id);
				$media->save();

				//set hashtags
				$this->setHashtags($media);

				//copy files
				$this->copyFiles($media, $performer, $fileName, $thumbnailName, $oldFilePath, $thumbnailPath);
			}
    	}
	}
	
	private function copyFiles(
		Media $media,
		User $performer,
		string $fileName,
		string $thumbnailName,
		string $oldFilePath,
		string $thumbnailPath
	) {
		$year = date('Y', strtotime($media->created_at));
		$month = date('m', strtotime($media->created_at));

		//copy video
		Storage::copy(
			$oldFilePath,
			sprintf('%s%s/%s/%s/%s', Media::MEDIA_PATH, $performer->id, $year, $month, $fileName) //->/user/media/{user_id}/{year}/{month}/video.mp4
		);

		//copy thumbnail
		Storage::copy(
			$thumbnailPath,
			sprintf('%s%s/%s/%s/%s', Media::MEDIA_PATH, $performer->id, $year, $month, $thumbnailName) //->/user/media/{user_id}/{year}/{month}/thumbnail.jpg
		);
	}

	private function setHashtags(Media $media)
	{
		//hashtags are saved in db as autoincrement starting with 1
		$hashtagIds = [5, 10, 15, 20, 25];
		$media->hashtags()->attach($hashtagIds);
	}

    private function calculateExpiresAt()
    {
    	if (rand(0, 1) % 2 === 0) {
    		return null;
    	}

    	$type = (rand(0, 1) % 2 === 0) ? 'h' : 'd';
    	$number = rand(1, 10);

    	$date = new DateTime();
    	if ('h' === $type) {
    		$date->add(new DateInterval(sprintf('PT%dH', $number))); // PXD means a period of X days
    	} elseif ('d' === $type) {
			$date->add(new DateInterval(sprintf('P%dD', $number)));
    	} 

		return $date->format('Y-m-d H:i:s');
    }
}