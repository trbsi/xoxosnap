<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\UserRole;

class UsersSeeder extends Seeder
{
    private $performes = [
        'niki' => 'Nicole Kuk',
        'lola' => 'Lola Shurter',
        'catwoman' => 'Cat Woman',
        'cinnemon' => 'Cinne Pokemon',
        'natasha' => 'Natasha Russian',
        'loraX' => 'Lora Xcalibur',
        'naughtygirl' => 'Naughty Girl',
        'GirlSlap' => 'Girl With Manner',
        'testGirl' => 'Testing Girl',
        'gayguy' => 'Nice Boi',
    ];

    private $users = [
        'john' => null,
        'will' => null,
        'watcher02' => null,
        '1991guy' => null,
        'somerandomuser' => null,
        'totallyCool2' => null,
        'iphonefan' => null,
        'runnerBlade' => null,
        'littlemouse' => null,
        '98uuuu98' => null,
    ];

    public function run()
    {
        if ('production' === env('APP_ENV')) {
            return;
        }

        $profiles = [
            [
                'data' => $this->performes,
                'profile_type' => User::USER_TYPE_PERFORMER,
            ],
            [
                'data' => $this->users,
                'profile_type' => User::USER_TYPE_VIEWER,
            ],
        ];

        foreach ($profiles as $profile) {
            $this->seed($profile['data'], $profile['profile_type']);
        }
    }

    private function seed(array $profiles, int $profileType)
    {
        $i = 1;
        $userRole = UserRole::where('role_key', UserRole::ROLE_USER)->first();

        foreach ($profiles as $username => $name) {
            //General data
            $pictureName = sprintf('%s.jpg', $username);

            //User data
            $userData = [
                'email' => sprintf('%s@fakemail.com', $username),
                'password' => Hash::make('123456'),
                'username' => $username,
                'profile_type' => $profileType,
                'is_verified' => ($i <= 5) ? true : false,
                'role_id' => $userRole->id,
            ];

            if (User::USER_TYPE_PERFORMER === $profileType) {
                $userData['name'] = $name;
            }

            //Profile data
            $profileData = [
                'picture' => $pictureName,
                'followers' => rand(),
                'videos' => rand(),
                'description' => (rand(0, 1) % 2 === 0) ? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.' : null,
                'birthday' => (rand(0, 1) % 2 === 0) ? date('1990-05-12') : null,
                'current_city' => (rand(0, 1) % 2 === 0) ? 'New York' : null,
                'gender' => (rand(0, 1) % 2 === 0) ? UserProfile::GENDER_MALE : UserProfile::GENDER_FEMALE,
                'business_email' => (rand(0, 1) % 2 === 0) ? sprintf('%s@businessmail.com', $username) : null,
                //'badge' => (rand(0,1) % 2 === 0) ? 1 : null,
                'website' => (rand(0, 1) % 2 === 0) ? 'http://www.mysite.com' : null,
                'facebook' => (rand(0, 1) % 2 === 0) ? 'name' : null,
                'instagram' => (rand(0, 1) % 2 === 0) ? 'name' : null,
                'twitter' => (rand(0, 1) % 2 === 0) ? 'name' : null,
            ];

            $user = User::create($userData);
            $user->profile()->create($profileData);

            Storage::copy(
                sprintf('seeds/pictures/%s.jpg', rand(1, 20)),
                sprintf('%s%s/%s', UserProfile::USER_PICTURE_PATH, $user->id, $pictureName)
            );

            $i++;
        }
    }

}
