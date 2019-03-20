<?php

namespace App\Web\Users\Resources\Profiles\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Validator;
use Hash;
use App\Web\Users\Resources\Profiles\Repositories\Settings\EditPersonalInfoSettings\EditPersonalInfo;

class SettingsController extends Controller
{
    private $user;
    private $authUser;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = $this->authUser = User::where('id', Auth::id())->with(['profile'])->first();

            return $next($request);
        });
    }

    public function accountSettings(Request $request)
    {
        return view('web.users.resources.profiles.settings.account-settings', [
            'user' => $this->user,
            'authUser' => $this->authUser,
        ]);
    }

    public function editAccountSettings(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => sprintf('required|unique:users,username,%d|max:20|regex:%s', $this->authUser->id, User::USERNAME_VALIDATION_REGEX),
            'email' => sprintf('required|unique:users,email,%d|max:100|email', $this->authUser->id),
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->route('user.profile.settings.account-settings')
                    ->withErrors($validator)
                    ->withInput();
        }

        $authUser = $this->authUser;
        $authUser->username = $request->username;
        $authUser->email = $request->email;
        $authUser->save();
        $request->session()->flash('success', __('web/users/resources/profile.account_update'));

        return redirect()->route('user.profile.settings.account-settings');
    }

    public function personalInfoSettings(Request $request)
    {
        return view('web.users.resources.profiles.settings.personal-info-settings', [
            'genders' => UserProfile::$genders,
            'user' => $this->user,
            'authUser' => $this->authUser,
        ]);
    }


    public function editPersonalInfoSettings(Request $request, EditPersonalInfo $editPersonalInfo)
    {
        $validator = Validator::make($request->all(), [
            'birthday' => 'date',
            'picture' => 'nullable|image',
            'description' => 'max:10000',
            'current_city' => 'present|nullable|string',
            'gender' => 'in:1,2,3',
            'business_email' => 'present|nullable|email',
            'website' => 'present|nullable|url',
            'facebook' => 'present|nullable|string',
            'instagram' => 'present|nullable|string',
            'twitter' => 'present|nullable|string'
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->route('user.profile.settings.personal-info-settings')
                    ->withErrors($validator)
                    ->withInput();
        }

        $editPersonalInfo->editPersonalInfo($request->all(), $this->authUser->profile);
        $request->session()->flash('success', __('web/users/resources/profile.account_update'));

        return redirect()->route('user.profile.settings.personal-info-settings');
    }


    public function changePasswordSettings(Request $request)
    {
        return view('web.users.resources.profiles.settings.change-password-settings', [
            'user' => $this->user,
            'authUser' => $this->authUser,
        ]);
    }

    public function editChangePasswordSettings(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()
                    ->route('user.profile.settings.change-password-settings')
                    ->withErrors($validator)
                    ->withInput();
        }

        $authUser = $this->authUser;
        $authUser->password = Hash::make($request->password);
        $authUser->save();
        $request->session()->flash('success', __('web/users/resources/settings.change_password.password_changed'));

        return redirect()->route('user.profile.settings.change-password-settings');
    }
}
