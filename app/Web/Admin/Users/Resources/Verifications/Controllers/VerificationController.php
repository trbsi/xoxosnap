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
     	$status = $changeVerificationStatusRepository->changeStatus($request->all());

     	if ($status) {
            $request->session()->flash('success', __('web/admin/users/resources/verification.user_verified'));
        } else {
            $request->session()->flash('success', __('web/admin/users/resources/verification.user_unverified'));
        }

        return redirect()->route('web.admin.user.get');
    }
    
}
