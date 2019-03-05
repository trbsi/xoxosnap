<?php

namespace App\Api\V1\Web\Media\Repositories\UpdateViews;

use App\Models\Media;

class UpdateViewsRepository 
{
    public function update(array $data, int $id): array
    {
        $media = Media::find($id);
        $media->increment('views');
        return ['views' => $media->views];
    }
}
