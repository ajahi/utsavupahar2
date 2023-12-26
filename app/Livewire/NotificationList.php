<?php

namespace App\Livewire;

use Livewire\Component;

class NotificationList extends Component
{
    public $readNotifications, $unreadNotifications;
    // public function markAllAsRead()
    // {
    //     $this->notifications->markAsRead();
    // }
    public function markOneAsRead($id, $oid)
    {
        $this->unreadNotifications->find($id)?->markAsRead();
        return redirect()->route('order.show', $oid);
    }
    public function render()
    {
        $this->readNotifications = auth()->user()->readNotifications;
        $this->unreadNotifications = auth()->user()->unreadNotifications;
        return view('livewire.notification-list');
    }
}
