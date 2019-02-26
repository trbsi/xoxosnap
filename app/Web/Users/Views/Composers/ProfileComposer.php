<?php

namespace App\Web\Users\Views\Composers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class ProfileComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $user = Auth::user();
        if (null !== $user) {
            $name = $user->name;
            $username = $user->username;
            $picture = $user->picture;
        } else {
            $name = __('web/users/user.guest');
            $username = null;
            $picture = null;
        }

        $view->with('name', $name);
        $view->with('profilePicture', $picture);
        $view->with('username', $username);
    }
}