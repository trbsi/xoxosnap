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
        if (false !== strpos($view->getPath(), 'views/admin')) {
            return;
        }

        $user = User::with(['coin', 'profile'])
            ->find(Auth::id());

        if (null !== $user) {
            $userId = $user->id;
            $name = $user->name ?? $user->username;
            $username = $user->username;
            $picture = $user->profile->picture;
            $coins = $user->coin->current_coins;
            $coinsFormatted = $user->coin->current_coins_formatted;
            $isVerified = $user->is_verified;
            $profileType = $user->profile_type;
        } else {
            $userId = null;
            $name = __('web/users/user.guest');
            $username = null;
            $picture = UserProfile::NO_PROFILE_PICTURE_PATH;
            $coins = 0;
            $coinsFormatted = 0;
            $isVerified = false;
            $profileType = null;
        }

        $view->with('userComposerUserId', $userId);
        $view->with('userComposerName', $name);
        $view->with('userComposerProfilePicture', $picture);
        $view->with('userComposerUsername', $username);
        $view->with('userComposerCoins', $coins);
        $view->with('userComposerCoinsFormatted', $coinsFormatted);
        $view->with('userComposerIsVerified', $isVerified);
        $view->with('userComposerProfileType', $profileType);
    }
}