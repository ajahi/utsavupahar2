<?php

namespace App\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartItem extends Component
{
    public $cartItems;
    

    public function mount(){
        $this->cartItems=Cart::content()->toArray();
    }
    public function render()
    {
        return view('livewire.cart-item',['items'=>$this->cartItems]);
    }

    
    public function removeCartItem($rowId)
    {
        Cart::remove($rowId);
        $this->cartItems = Cart::content()->toArray();
        $this->dispatch('update-cart');

        // You may emit an event or perform other actions after removing an item
    }
    public function clearCart()
    {
        Cart::destroy();
        $this->cartItems = Cart::content()->toArray();

        // You may emit an event or perform other actions after clearing the cart
    }
    public function getData(){
        $this->cartItems=Cart::content()->toArray();
    }

}
