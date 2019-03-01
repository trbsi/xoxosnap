<?php

use App\Models\CoreUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Media;
use App\Models\User;
use App\Models\Story;

class StoriesSeeder extends Seeder
{
	public function run(User $user)
    {
    	$performers = $user->where('profile_type', User::USER_TYPE_PERFORMER)->get();

    	foreach ($performers as $key => $performer) {
    		//add 5 stories to each performer
			for ($i = 0; $i < 5; $i++) {				
				if ($i % 2 === 0) { //video
		     		$fileName = sprintf('%s_%s_%s.mp4', date('YmdHisu'), $key, $i);
		     		$filePath = Media::MEDIA_PATH;
		     		$oldFilePath = sprintf('seeds/videos/%s.mp4', rand(1, 12));
				} else { //image
		     		$fileName = sprintf('%s_%s_%s.jpg', date('YmdHisu'), $key, $i);
		     		$filePath = Story::STORY_PATH;
		     		$oldFilePath = sprintf('seeds/pictures/%s.jpg', rand(1, 20));
				}
 		 		$data = [
					'cost' => rand(0, 5),
					'expires_at' => $this->calculateExpiresAt(),
				];
				
				$story = $performer->stories()->create($data);
				$story->media()->create([
					'file' => $fileName
				]);

				Storage::copy(
	                $oldFilePath,
	                sprintf('%s%s/%s', $filePath, $performer->id, $fileName)
	            );
			}
    	}
    }

    private function calculateExpiresAt()
    {
    	$type = (rand(0, 1) % 2 === 0) ? 'h' : 'd';
    	$number = rand(1, 10);

    	if (rand(0, 1) % 2 === 0) {
    		return null;
    	}

    	$date = new DateTime();
    	if ('h' === $type) {
    		$date->add(new DateInterval(sprintf('PT%dH', $number))); // PXD means a period of X days
    	} elseif ('d' === $type) {
			$date->add(new DateInterval(sprintf('P%dD', $number)));
    	} 

		return $date->format('Y-m-d H:i:s');
    }
}