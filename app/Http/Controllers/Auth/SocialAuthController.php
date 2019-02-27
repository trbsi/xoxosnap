<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use App\Models\User;

class SocialAuthController extends Controller
{
    public function callback($provider)
    {
        $user = $this->getOrCreateUser($provider);
        auth()->login($user);
        return redirect()->to('/');
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    private function getOrCreateUser(string $provider): User
    {
        $providerData = Socialite::driver($provider);
        $providerUser = $providerData->user();
        $providerName = class_basename($provider);

        $user = User::where('provider', $providerName)
                    ->where('provider_id', $providerUser->getId())
                    ->first();

        if (!$user) {
            $user = User::create([
                'profile_type' => User::USER_TYPE_PERFORMER,
                'username' => $providerUser->getNickname(),
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'provider_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);
        }

        return $user;
    }
}
