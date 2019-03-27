<?php

namespace App\Web\Media\Repositories\Media\Delete;

use App\Models\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Web\Media\Traits\MediaFileTrait;

class DeleteMediaRepository
{
    use MediaFileTrait;

    public function delete(int $id): bool
    {
        $media = Media::find($id);
        $media->noMutation = true;

        if ($media->user_id !== Auth::id()) {
            abort(403);
        }

        $year = date('Y', strtotime($media->created_at));
        $month = date('m', strtotime($media->created_at));

        $mediaFile = $this->getMediaRelativePath($media->user_id, $year, $month, $media->file);
        $thumbnail = $this->getMediaRelativePath($media->user_id, $year, $month, $media->thumbnail);
        Storage::delete($mediaFile);
        Storage::delete($thumbnail);

        $media->delete();

        return true; 
    }
}