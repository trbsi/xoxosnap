<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Media;
use App\Models\User;
use App\Models\Story;
use App\Models\StoryMedia;

class StoriesSeeder extends Seeder
{
	public function run(User $user)
    {
    	if ('production' === env('APP_ENV')) {
            return;
        }
        
    	$performers = $user->where('profile_type', User::USER_TYPE_PERFORMER)->get();

    	foreach ($performers as $key => $performer) {
    		//add 5 stories to each performer
			for ($i = 0; $i < 5; $i++) {				
	     		$filePath = Story::STORY_PATH;
				if ($i % 2 === 0) { //video
		     		$fileName = sprintf('%s_%s_%s.mp4', date('YmdHisu'), $key, $i);
		     		$oldFilePath = sprintf('seeds/videos/%s.mp4', rand(1, 12));
		     		$type = StoryMedia::TYPE_VIDEO;
				} else { //image
		     		$fileName = sprintf('%s_%s_%s.jpg', date('YmdHisu'), $key, $i);
		     		$oldFilePath = sprintf('seeds/pictures/%s.jpg', rand(1, 20));
		     		$type = StoryMedia::TYPE_PHOTO;
				}
 		 		$data = [
					'cost' => 0,
					'expires_at' => $this->calculateExpiresAt(),
					'created_at' => '2019-02-20 10:12:25'
				];
				
				$story = $performer->stories()->create($data);

				//create multiple media for stories
				$story->media()->createMany([
					[
						'file' => $fileName,
						'type' => $type
					],
					[
						'file' => $fileName,
						'type' => $type
					]
				]);
				$year = date('Y', strtotime($story->created_at));
				$month = date('m', strtotime($story->created_at));

				Storage::copy(
	                $oldFilePath,
	                sprintf('%s%s/%s/%s/%s', $filePath, $performer->id, $year, $month, $fileName) //->/user/stories/{user_id}/{year}/{month}/video.mp4
	            );
			}
    	}
    }

    private function calculateExpiresAt()
    {
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