<?php

namespace App\Web\Users\Resources\Verifications\Repositories\Verification\RequestVerification;

use App\Models\UserVerification;
use App\Web\Users\Resources\Verifications\Mails\VerificationRequestedMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Exception;
use DB;

class RequestVerificationRepository
{
    public function request(array $data)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();

            $path = Storage::disk('local')->putFileAs('temp', $data['verification_photo'], rand() . '.jpg');
            $path = sprintf('%s/app/%s', storage_path(), $path);

            $verification = $user->verification;
            $verification->status = UserVerification::STATUS_IN_PROGRESS;
            $verification->save();

            Mail::to(env('APP_OFFICIAL_EMAIL'))
                ->send(new VerificationRequestedMail($user, $path));
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}