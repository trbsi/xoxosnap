<?php

namespace App\Web\Home\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LegalController extends Controller
{
    public function termsOfUse(Request $request)
    {	
    	return view('web.home.legal.terms-of-use');
    }

    public function privacyPolicy()
    {
    	return view('web.home.legal.privacy-policy');
    }
}
