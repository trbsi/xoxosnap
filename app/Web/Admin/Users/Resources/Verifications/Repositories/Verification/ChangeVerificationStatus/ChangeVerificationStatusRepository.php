<?php

namespace App\Web\Admin\Users\Resources\Verifications\Repositories\Verification\ChangeVerificationStatus;

use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class ChangeVerificationStatusRepository
{
    public function getAllUsersPaginated(array $data): LengthAwarePaginator
    {
        $user = User::with(['profile'])
            ->where('profile_type', $data['profile_type'] ?? User::USER_TYPE_PERFORMER)
        ;

        if (isset($data['username'])) {
            $user->where('username', $data['username']);
        }

        if (isset($data['id'])) {
            $user->where('id', $data['id']);
        }

        if (isset($data['order_by_type']) && isset($data['order_by_column'])) {
            $user->orderBy($data['order_by_column'], $data['order_by_type']);
        }

        return $user->paginate(50);

    }

}