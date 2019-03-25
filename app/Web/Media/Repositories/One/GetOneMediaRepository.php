<?php

namespace App\Web\Media\Repositories\One;

use App\Models\Media;

class GetOneMediaRepository
{
    public function getOneVideo(int $id, ?int $authUserId): Media
    {
    	return Media::where('id', $id)
		->select('*')
		->selectRaw('
		IF (
			(SELECT COUNT(*) FROM media_purchases WHERE user_id = ? AND media_id = media.id) = 0, 0, 1
		) AS user_paid', [$authUserId])
		->selectRaw('
		IF (
			(SELECT COUNT(*) FROM media_likes WHERE user_id = ? AND media_id = media.id) = 0, 0, 1
		) AS user_liked', [$authUserId])
		->whereRaw('(expires_at IS NULL OR expires_at >= ?)', [date('Y-m-d H:i:s')])
		->orderBy('id', 'DESC')
		->firstOrFail();
    }
}
