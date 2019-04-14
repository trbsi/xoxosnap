<?php

namespace App\Api\V1\Web\Media\Repositories\Media\Like;

use App\Models\Media;
use Exception;
use Illuminate\Support\Facades\Auth;

class LikeRepository
{
    public function like(int $id): array
    {

        $media = Media::find($id);
        $media->noMutation = true;

        try {
            //like
            $media->likes()->attach(Auth::id());
            $media->increment('likes');
            $liked = true;
        } catch (Exception $e) {
            //unlike
            $media->likes()->detach(Auth::id());
            $media->decrement('likes');
            $liked = false;
        }

        $media->noMutation = false;

        return [
            'likes' => $media->likes,
            'liked' => $liked
        ];
    }
}
