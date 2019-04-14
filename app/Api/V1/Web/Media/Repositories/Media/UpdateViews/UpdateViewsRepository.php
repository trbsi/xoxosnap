<?php

namespace App\Api\V1\Web\Media\Repositories\Media\UpdateViews;

use App\Models\Media;

class UpdateViewsRepository
{
    public function update(int $id): array
    {
        $media = Media::find($id);
        $media->noMutation = true;
        $media->increment('views');

        $media = $media->fresh();
        return ['views' => $media->views];
    }
}
