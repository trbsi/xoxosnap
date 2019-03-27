<?php

namespace App\Web\Media\Repositories\Media\Update;

use App\Models\Media;
use Illuminate\Support\Facades\Auth;

class UpdateMediaRepository
{
    public function update(Media $media, array $data): Media
    {
        if ($media->user_id !== Auth::id()) {
            abort(403);
        }
            
        $media->title = $data['title'];
        $media->description = $data['description'];
        $media->slug = sprintf('%s-%s', str_slug($media->title), $media->id);
        $media->save();

        $hashtags = explode(',', $data['hashtags']);
        $media->hashtags()->sync($hashtags);
    
        return $media;
    }
}