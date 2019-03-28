<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers {
        RegistersUsers::showRegistrationForm as parentShowRegistrationForm;
    }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {        
        $userTypes = [
            'performer' => User::USER_TYPE_PERFORMER,
            'viewer' => User::USER_TYPE_VIEWER
        ];

        return view('auth.register', [
            'genders' => UserProfile::$genders,
            'userTypes' => $userTypes
        ]);
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'agree_terms' => ['accepted'],
            'gender' => ['required', 'integer', 'in:1,2,3'],
            'profile_type' => ['required', 'integer', 'in:1,2'],
            'username' => ['required', 'string', 'max:20', 'unique:users', sprintf('regex:%s',User::USERNAME_VALIDATION_REGEX)],
            'name' => ['required_if:profile_type,1', 'string', 'max:100', 'nullable'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        session(['you_may_login' => __('auth.you_may_login')]);

        $user = User::create([
            'profile_type' => $data['profile_type'],
            'username' => $data['username'],
            'name' => (User::USER_TYPE_PERFORMER === $data['profile_type']) ? $data['name'] : null,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->profile()->create([
            'gender' => $data['gender'],
        ]);

        return $user;
    }
}
