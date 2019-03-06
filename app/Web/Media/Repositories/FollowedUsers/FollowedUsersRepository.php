<?php

namespace App\Web\Media\Repositories\FollowedUsers;

use App\Models\Media;

class FollowedUsersRepository
{
    public function getMediaOfFollowedUsers(object $followsIds, int $userId): object
    {
    	return Media::whereIn('user_id', $followsIds)
		->select('*')
		->selectRaw('IF((SELECT COUNT(*) FROM media_purchases WHERE user_id = ? AND media_id = media.id) = 0, 0, 1) AS user_paid', [$userId])
		->selectRaw('IF((SELECT COUNT(*) FROM media_likes WHERE user_id = ? AND media_id = media.id) = 0, 0, 1) AS user_liked', [$userId])
		->whereRaw('(expires_at IS NULL OR expires_at >= ?)', [date('Y-m-d H:i:s')])
		->with(['user.profile'])
		->orderBy('id', 'DESC')
		->paginate(9);
    }
}
