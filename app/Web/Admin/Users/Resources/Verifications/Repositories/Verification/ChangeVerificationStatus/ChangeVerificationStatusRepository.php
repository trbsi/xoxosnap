<?php

namespace App\Web\Admin\Users\Resources\Verifications\Repositories\Verification\ChangeVerificationStatus;

use App\Models\User;
use App\Models\UserVerification;

class ChangeVerificationStatusRepository
{
    public function changeStatus(array $data): bool
    {
        /** @var User $user */
        $user = User::where('id', $data['id'])->firstOrFail();
        $verification = $user->verification;

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

        return $status;
    }

}