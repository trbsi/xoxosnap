<?php

namespace App\Web\Admin\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('web.admin.login');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('web.admin.user.get');
        }

        return view('web.admin.auth.login.login.login');
    }

    public function submitLogin(Request $request)
    {
        $role = UserRole::where('role_key', UserRole::ROLE_ADMIN)->first();

    	$credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $role->id,
        ];
    	$remember = $request->remember_me ? true : false;

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('web.admin.user.get');
        }


        return redirect()->route('web.admin.login');
    }
}
