<?php

namespace App\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Attributes\On;


class MobileNavCart extends Component
{
    public $cartItemCount;
    
    #[On('update-cart')]
    public function updateCartCount(){
        $this->cartItemCount=Cart::count();
    }

    public function mount(){
        $this->cartItemCount=Cart::count();
    }
    public function render()
    {
        return view('livewire.mobile-nav-cart');
    }
}
