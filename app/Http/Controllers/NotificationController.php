<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getAllNotifications(Request $request)
    {
        $notifications = $request->user()->unreadNotifications;
        // return response()->json($notifications);
        dd(type_of($notifications));
    }

    public function markAllNotificationAsRead(Request $request)
    {
        $notifications = $request->user()->unreadNotifications;
        $notifications->markAsRead();
    }
}
