<?php

namespace App\Web\Home\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Web\Home\Repositores\Home\Above18Repository;
use App\Web\Home\Repositores\Home\HomeRepository;

class HomeController extends Controller
{
    public function home(
        Request $request,
        Above18Repository $above18Repository,
        HomeRepository $homeRepository
    ) {	
        
        $params = [];
        $params['javascript'] = $above18Repository->getJavascriptParam();
        $homepageData = $homeRepository->getDataForHomePage();

    	return view('web.home.home.home.home', array_merge($params, $homepageData));
    }

    public function explore()
    {
    	return view('web.home.home.explore.explore');
    }
}
