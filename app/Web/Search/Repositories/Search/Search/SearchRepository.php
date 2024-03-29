<?php

namespace App\Web\Search\Repositores\Search\Search;

use App\Models\User;
use App\Models\Media;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Web\Search\Constants\SearchConstants;

class SearchRepository
{
    private const PAGINTION = 9;

    public function search(?string $term, ?string $type): LengthAwarePaginator
    {
        if (empty($term)) {
            return new LengthAwarePaginator([], 1, 1);
        }

        switch ($type) {
            case SearchConstants::SEARCH_USER:
                return $this->searchUsers($term);
                break;
            case SearchConstants::SEARCH_MEDIA:
                return $this->searchMedia($term);
                break;
            default:
                return $this->searchUsers($term);
                break;
        }
    }

    private function searchMedia(string $term): LengthAwarePaginator
    {
        /**
         * SELECT media.*,
         * MATCH(media.title, media.description) AGAINST("malen*" IN BOOLEAN MODE) AS mediaScore,
         * MATCH(hashtags.name) AGAINST("malen*" IN BOOLEAN MODE) AS hashtagScore
         * FROM `media`
         * LEFT JOIN media_hashtags ON (media_hashtags.media_id = media.id)
         * LEFT JOIN hashtags ON (hashtags.id = media_hashtags.hashtag_id)
         * WHERE
         * (expires_at IS NULL OR expires_at >= ?)
         * AND
         * (
         * MATCH(media.title, media.description) AGAINST("malen*" IN BOOLEAN MODE)
         * OR
         * MATCH(hashtags.name) AGAINST("malen*" IN BOOLEAN MODE)
         * )
         * GROUP BY media.id
         * ORDER BY (mediaScore + hashtagScore) DESC
         */
        $where = sprintf('
            (expires_at IS NULL OR expires_at >= "%2$s")
            AND
            (
        		MATCH(media.title, media.description) AGAINST("%1$s*" IN BOOLEAN MODE) 
        		OR 
        		MATCH(hashtags.name) AGAINST("%1$s*" IN BOOLEAN MODE)
            )', $term, date('Y-m-d H:i:s'));

        $select = sprintf('
		media.*,
		MATCH(media.title, media.description) AGAINST("%1$s*" IN BOOLEAN MODE) AS mediaScore,
		MATCH(hashtags.name) AGAINST("%1$s*" IN BOOLEAN MODE) AS hashtagScore
		', $term);

        return Media::selectRaw($select)
            ->whereRaw($where)
            ->with(['user'])
            ->leftJoin('media_hashtags', 'media_hashtags.media_id', '=', 'media.id')
            ->leftJoin('hashtags', 'hashtags.id', '=', 'media_hashtags.hashtag_id')
            ->groupBy(['media.id'])
            ->orderByRaw('mediaScore + hashtagScore', 'DESC')
            ->paginate(self::PAGINTION);
    }

    private function searchUsers(string $term): LengthAwarePaginator
    {
        /**
         * SELECT users.*,
         * MATCH(users.name, users.username) AGAINST("blonde*" IN BOOLEAN MODE) AS userScore,
         * MATCH(hashtags.name) AGAINST("blonde*" IN BOOLEAN MODE) AS hashtagScore
         * FROM `users`
         * LEFT JOIN users_profiles_hashtags ON (users_profiles_hashtags.user_id = users.id)
         * LEFT JOIN hashtags ON (hashtags.id = users_profiles_hashtags.hashtag_id)
         * WHERE
         * (
         * MATCH(users.name, users.username) AGAINST("blonde*" IN BOOLEAN MODE)
         * OR
         * MATCH(hashtags.name) AGAINST("blonde*" IN BOOLEAN MODE)
         * )
         * AND users.profile_type = 1
         * ORDER BY (userScore + hashtagScore) DESC
         */
        $where = sprintf('
    		(
                MATCH(users.name, users.username) AGAINST("%1$s*" IN BOOLEAN MODE) 
        		OR 
        		MATCH(hashtags.name) AGAINST("%1$s*" IN BOOLEAN MODE)
            )
            AND users.profile_type = %2$s', $term, User::USER_TYPE_PERFORMER);

        $select = sprintf('
		users.*,
		MATCH(users.name, users.username) AGAINST("%1$s*" IN BOOLEAN MODE) AS userScore,
		MATCH(hashtags.name) AGAINST("%1$s*" IN BOOLEAN MODE) AS hashtagScore
		', $term);

        return User::selectRaw($select)
            ->whereRaw($where)
            ->with(['profile'])
            ->leftJoin('users_profiles_hashtags', 'users_profiles_hashtags.user_id', '=', 'users.id')
            ->leftJoin('hashtags', 'users_profiles_hashtags.hashtag_id', '=', 'hashtags.id')
            ->orderByRaw('userScore + hashtagScore', 'DESC')
            ->paginate(self::PAGINTION);
    }
}
