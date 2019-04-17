{!!__('web/admin/users/resources/verification.change_verification_status.mail_account_verified_body', [
    'username' => $user->username,
    'site_url' => env('APP_URL'),
    'site_name' => env('APP_NAME'),
    'discord_url' => env('DISCORD_LINK')
])!!}