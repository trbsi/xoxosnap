<?php

namespace App\Web\Media\Repositories\ListMedia;

use App\Models\Media;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ListMediaRepository
{
    public function getMediaByOrderType(?int $exploreType, ?int $authUserId)
    {
        switch ($exploreType) {
            case Media::ORDER_TYPE_RECENT:
                return $this->getMedia('id', 'DESC', $exploreType, $authUserId);

            case Media::ORDER_TYPE_ENDING_SOON:
                return $this->getMedia('expires_at', 'ASC', $exploreType, $authUserId);

            case Media::ORDER_TYPE_MOST_VIEWED:
                return $this->getMedia('views', 'DESC', $exploreType, $authUserId);

            case Media::ORDER_TYPE_MOST_PAID:
                return $this->getMedia('purchased_count', 'DESC', $exploreType, $authUserId);

            default:
                return $this->getMedia('id', 'DESC', $exploreType, $authUserId);
        }
    }

    public function getMedia(
        string $orderByColumn,
        string $orderByDirection,
        int $exploreType,
        ?int $authUserId
    ): LengthAwarePaginator
    {

        $media = Media::select('*')
            ->selectRaw('IF((SELECT COUNT(*) FROM media_purchases WHERE user_id = ? AND media_id = media.id) = 0, 0, 1) AS user_paid', [$authUserId])
            ->selectRaw('IF((SELECT COUNT(*) FROM media_likes WHERE user_id = ? AND media_id = media.id) = 0, 0, 1) AS user_liked', [$authUserId])
            ->with(['user.profile'])
            ->orderBy($orderByColumn, $orderByDirection);

        if (Media::ORDER_TYPE_ENDING_SOON === $exploreType) {
            $media->whereRaw('(expires_at >= ?)', [date('Y-m-d H:i:s')]);
        } else {
            $media->whereRaw('(expires_at IS NULL OR expires_at >= ?)', [date('Y-m-d H:i:s')]);
        }

        return $media->paginate(9);
    }
}
