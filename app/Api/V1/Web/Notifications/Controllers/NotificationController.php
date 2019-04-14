<?php

namespace App\Api\V1\Web\Notifications\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Web\Notifications\Repositories\GetNotifications\GetNotificationsRepository;
use App\Models\Notification;
use App\Api\V1\Web\Notifications\Repositories\Notification\MarkAllAsRead\MarkAllAsReadRepository;

class NotificationController extends Controller
{
    public function get(Request $request, GetNotificationsRepository $getNotificationsRepository)
    {
        $data = $request->validate([
            'type' => sprintf('in:%s',
                Notification::TYPE_PERFORMER_NEW_FOLLOWER
            ),
        ]);

        $data = $getNotificationsRepository->getNotifications($data['type'] ?? null);
        return response()->json($data);
    }

    public function markAllAsRead(Request $request, MarkAllAsReadRepository $markAllAsReadRepository)
    {
        $data = $request->validate([
            'type' => sprintf('in:%s,%s,%s',
                Notification::TYPE_PERFORMER_NEW_FOLLOWER,
                Notification::TYPE_PERFORMER_NEW_PURCHASE,
                Notification::TYPE_VIEWER_PERFORMER_POSTED
            ),
        ]);

        $markAllAsReadRepository->markAllAsRead($data['type'] ?? null);
        return response()->json();
    }
}
