<?php

namespace App\Web\Users\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;

class ViewerFollowedPerformerEvent
{
    use SerializesModels;

    public $followedUser;
    public $followedBy;

    public function __construct(User $followedUser, User $followedBy)
    {
        $this->followedUser = $followedUser;
        $this->followedBy = $followedBy;
    }
}
