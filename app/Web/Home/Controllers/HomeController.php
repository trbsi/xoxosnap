<?php

namespace App\Web\Home\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
    	return view('web.home.index.home');
    }

    public function explore()
    {
    	return view('web.home.explore.explore');
    }
}
