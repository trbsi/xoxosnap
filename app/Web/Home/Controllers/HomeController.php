<?php

namespace App\Web\Home\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Web\Home\Repositores\Home\Above18Repository;
use App\Web\Home\Repositores\Home\HomeRepository;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function home(
        Request $request,
        Above18Repository $above18Repository,
        HomeRepository $homeRepository
    ) {	
        $user = Auth::user();
        $params = [
            'user' => $user,
            'profileTypePerfomer' => User::USER_TYPE_PERFORMER,
            'profileTypeViewer' => User::USER_TYPE_VIEWER,
        ];
        $params['javascript'] = $above18Repository->getJavascriptParam();
        $homepageData = $homeRepository->getDataForHomePage($user);

    	return view('web.home.home.home.home', array_merge($params, $homepageData));
    }

    public function explore()
    {
    	return view('web.home.home.explore.explore');
    }
}
