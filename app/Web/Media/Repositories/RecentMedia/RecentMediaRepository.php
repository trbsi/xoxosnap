<?php

namespace App\Web\Media\Repositories\RecentMedia;

use App\Models\Media;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class RecentMediaRepository
{
    public function getRecentMediaOfUser(int $userId, ?int $authUserId): LengthAwarePaginator
    {
        return $this->getRecentMediaOfUsers(collect([$userId]), (int)$authUserId);
    }

    public function getRecentMediaOfUsers(Collection $userIds, int $authUserId): LengthAwarePaginator
    {
        return Media::whereIn('user_id', $userIds)
            ->select('*')
            ->selectRaw('IF((SELECT COUNT(*) FROM media_purchases WHERE user_id = ? AND media_id = media.id) = 0, 0, 1) AS user_paid', [$authUserId])
            ->selectRaw('IF((SELECT COUNT(*) FROM media_likes WHERE user_id = ? AND media_id = media.id) = 0, 0, 1) AS user_liked', [$authUserId])
            ->whereRaw('(expires_at IS NULL OR expires_at >= ?)', [date('Y-m-d H:i:s')])
            ->orderBy('id', 'DESC')
            ->paginate(9);
    }
}
