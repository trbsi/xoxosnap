<?php

namespace App\Web\Users\Resources\Profiles\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function profile($username)
    {
        //if user doesn't exist
    	return view('web.users.resources.profiles.profile.profile', [
    		'username' => $username,
            'videos' => [],
            'stories' => json_encode([]),
    	]);
    }

    public function about($username)
    {
    	return view('web.users.resources.profiles.about.about', [
    		'username' => $username
    	]);
    }
}
