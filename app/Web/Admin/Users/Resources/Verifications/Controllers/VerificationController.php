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
        
    }
    
}
