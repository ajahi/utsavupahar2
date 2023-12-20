<?php

namespace App\Livewire;

use Livewire\Component;

class NotificationList extends Component
{
    public $notifications;
    public function markAllAsRead()
    {
        $this->notifications->markAsRead();
    }
    public function render()
    {
        $this->notifications = auth()->user()->unreadNotifications;
        return view('livewire.notification-list');
    }
}
