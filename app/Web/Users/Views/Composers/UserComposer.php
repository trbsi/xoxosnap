<?php

namespace App\Web\Users\Views\Composers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProfile;
use App\Models\User;

class UserComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $user = User::with(['coin'])->find(Auth::id());
        if (null !== $user) {
            $userId = $user->id;
            $name = $user->name ?? $user->username;
            $username = $user->username;
            $picture = $user->profile->picture;
            $coins = $user->coin->coins;
            $coinsFormatted = $user->coin->coins_formatted;
        } else {
            $userId = null;
            $name = __('web/users/user.guest');
            $username = null;
            $picture = UserProfile::NO_PROFILE_PICTURE_PATH;
            $coins = 0;
            $coinsFormatted = 0;
        }

        $view->with('userId', $userId);
        $view->with('name', $name);
        $view->with('profilePicture', $picture);
        $view->with('username', $username);
        $view->with('coins', $coins);
        $view->with('coinsFormatted', $coinsFormatted);
    }
}