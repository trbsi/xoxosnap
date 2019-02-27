<?php

namespace App\Web\Home\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cookie;

class HomeController extends Controller
{
    public function index(Request $request)
    {	

		$params = ['javascript' => null];
    	if(empty(Cookie::get('above_18'))) {
            Cookie::queue(Cookie::make('above_18', true, time() + 60 * 60 * 24 * 365));//1year
	    	$params['javascript'] = sprintf("
                Swal.fire({
                  type: 'question',
                  title: '%s',
                  text: '%s',
                  allowOutsideClick: false
                })",
                __('web/home/index.over_18'),
                __('web/home/index.accept_that_you_are_over_18')
            );  		
    	}

    	return view('web.home.home.index.home', $params);
    }

    public function explore()
    {
    	return view('web.home.home.explore.explore');
    }
}
