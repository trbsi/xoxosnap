<?php

namespace App\Web\Admin\Auth\Controllers;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.auth.login.login.login');
    }
}
