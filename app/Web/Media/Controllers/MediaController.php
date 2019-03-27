<?php

namespace App\Web\Media\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Web\Media\Repositories\Media\Delete\DeleteMediaRepository;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    public function delete(Request $request, DeleteMediaRepository $deleteMediaRepository)
    {   
        $data = $request->validate([
            'id' => 'required|integer',
        ]);

        try {
            $user = Auth::user();
            $deleteMediaRepository->delete($data['id']);
            $request->session()->flash('success', __('web/media/media.delete.video_deleted'));
            return redirect()->route('user.profile', ['username' => $user->username]);
        } catch (Exception $e) {
            abort(403);
        }
    } 
}
