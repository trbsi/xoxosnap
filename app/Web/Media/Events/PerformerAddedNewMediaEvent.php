<?php

namespace App\Web\Media\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;

class PerformerAddedNewMediaEvent
{
    use SerializesModels;

    public $performer;

    public function __construct(User $performer)
    {
        $this->performer = $performer;
    }
}