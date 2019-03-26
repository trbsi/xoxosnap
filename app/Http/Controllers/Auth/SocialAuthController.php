<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

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
        $providerUserRaw = $providerUser->getRaw();
        $providerName = strtolower($provider);

        $user = User::where('provider', $providerName)
                    ->where('provider_id', $providerUser->getId())
                    ->first();

        if (!$user) {
            $userData = [
                'profile_type' => User::USER_TYPE_PERFORMER,
                'username' => $providerUser->getNickname(),
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'provider_id' => $providerUser->getId(),
                'provider' => $providerName
            ];

            if (isset($providerUserRaw['verified'])) {
                $userData['is_verified'] = $providerUserRaw['verified'];
            }

            $user = User::create($userData);

            $user->profile()->create([
                'picture' => $providerUser->getAvatar(),
            ]);

            event(new Registered($user));
        }

        return $user;
    }
}
