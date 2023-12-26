<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderStatus extends Component
{
    public $oid;
    public function mount($oid)
    {
        $this->oid = $oid;
    }
    public function changeStatus($status)
    {
        Order::find($this->oid)->update([
            'status' => $status
        ]);
        $this->dispatch('order-status-changed', $status);
    }
    public function render()
    {
        return view('livewire.order-status');
    }
}
