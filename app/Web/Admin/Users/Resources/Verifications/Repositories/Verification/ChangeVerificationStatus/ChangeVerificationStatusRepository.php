<?php

namespace App\Web\Admin\Users\Resources\Verifications\Repositories\Verification\ChangeVerificationStatus;

use App\Models\User;
use App\Models\UserVerification;
use App\Web\Admin\Users\Resources\Verifications\Mails\AccountVerifiedMail;
use Illuminate\Support\Facades\Mail;

class ChangeVerificationStatusRepository
{
    public function changeStatus(array $data): array
    {
        /** @var User $user */
        $user = User::where('id', $data['id'])->firstOrFail();
        $verification = $user->verification;
        $mailSent = false;

        //'status' values: 1 (verify) or 0 (unverify)
        if (true === (bool) $data['status']) {
            $user->is_verified = 1;
            $verification->status = UserVerification::STATUS_VERIFIED;
            $status = true;
        } else {
            $user->is_verified = 0;
            $verification->status = UserVerification::STATUS_UNVERIFIED;
            $status = false;
        }

        $user->save();
        $verification->save();

        if (true === $status && null !== $user->email) {
            Mail::to($user->email)->send(new AccountVerifiedMail($user));
            $mailSent = true;
        }

        return [
            'status' => $status,
            'mail_sent' => $mailSent,
        ];
    }

}