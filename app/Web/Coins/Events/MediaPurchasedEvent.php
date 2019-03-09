<?php

namespace App\Web\Coins\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\User;
use App\Models\Media;
use App\Models\Story;

class MediaPurchasedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var User User who bought media */
    public $authenticatedUser;

    /** @var Media|Story */
    public $model;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($authenticatedUser, $model)
    {
        $this->authenticatedUser = $authenticatedUser;
        $this->model = $model;
    }
}
