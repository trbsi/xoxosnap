<?php

use App\Models\CoreUser;
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
	     		$oldFilePath = sprintf('seeds/videos/%s.mp4', rand(1, 12));
 		 		$data = [
					'title' => sprintf('Video title %s', mt_rand(), rand()),
					'description' => 'Someone seems to enjoy the snow!Greetings from snowy Finland❄❄ #snow #test #lol #snap #porn',
					'file' => $fileName,
					'cost' => rand(0, 5),
					'expires_at' => $this->calculateExpiresAt(),
					'likes' => rand(),
				];
				$performer->media()->create($data);

				Storage::copy(
	                $oldFilePath,
	                sprintf('%s%s/%s', Media::MEDIA_PATH, $performer->id, $fileName)
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