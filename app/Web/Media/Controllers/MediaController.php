<?php

namespace App\Web\Media\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Web\Media\Repositories\Media\Delete\DeleteMediaRepository;
use App\Web\Media\Repositories\Media\Update\UpdateMediaRepository;
use Illuminate\Support\Facades\Auth;
use App\Web\Media\Requests\Media\Update\UpdateMediaRequest;
use App\Models\Media;

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
            return redirect()->route('web.user.profile', ['username' => $user->username]);
        } catch (Exception $e) {
            abort(403);
        }
    }

    public function update(UpdateMediaRequest $request, UpdateMediaRepository $updateMediaRepository)
    {
        try {
            $media = Media::find($request->id);
            $media = $updateMediaRepository->update($media, $request->all());
            $request->session()->flash('success', __('web/media/media.update.video_updated'));
            return redirect($media->url);
        } catch (Exception $e) {
            abort(403);
        }
    }
}
