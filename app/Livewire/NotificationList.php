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
    public function markOneAsRead($id)
    {
        $this->notifications->find($id)->markAsRead();
    }
    public function render()
    {
        $this->notifications = auth()->user()->unreadNotifications;
        return view('livewire.notification-list');
    }
}
