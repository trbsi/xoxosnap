<?php

namespace App\Web\Admin\Users\Resources\Verifications\Controllers;

use App\Http\Controllers\Controller;
use App\Web\Admin\Users\Resources\Verifications\Repositories\Verification\ChangeVerificationStatus\ChangeVerificationStatusRepository;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function changeVerificationStatus(
        Request $request,
        ChangeVerificationStatusRepository $changeVerificationStatusRepository
    ) {
     	$result = $changeVerificationStatusRepository->changeStatus($request->all());

     	if (true === $result['status']) {
            $successMessages[] = __('web/admin/users/resources/verification.change_verification_status.user_verified');
            if (true === $result['mail_sent']) {
                $successMessages[] = __('web/admin/users/resources/verification.change_verification_status.mail_sent');
            } else {
                $request->session()->flash('error', __('web/admin/users/resources/verification.change_verification_status.mail_not_sent'));
            }

            $request->session()->flash('success', implode(' ', $successMessages));

        } else {
            $request->session()->flash('success', __('web/admin/users/resources/verification.change_verification_status.user_unverified'));
        }

        return redirect()->route('web.admin.user.get');
    }
    
}
