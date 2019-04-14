<?php

namespace App\Web\Users\Resources\Verifications\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Web\Users\Resources\Verifications\Repositories\Verification\RequestVerification\RequestVerificationRepository;
use Exception;

class VerificationController extends Controller
{
    public function requestVerification(
        Request $request,
        RequestVerificationRepository $requestVerificationRepository
    )
    {
        $validator = Validator::make($request->all(), [
            'verification_photo' => 'required|image',
        ]);

        if ($validator->fails()) {
            $request->session()->flash('error', __('general/site.something_went_wrong_check_inputs'));
            return redirect()
                ->route('web.home')
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $requestVerificationRepository->request($request->all());
            $request->session()->flash('success', __('web/home/home.performer.not_verified.request_sent'));
        } catch (Exception $e) {
            $request->session()->flash('error', __('general/site.something_went_wrong'));
        }

        return redirect()->route('web.home');
    }
}
