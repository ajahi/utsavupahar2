<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartItem extends Component
{
    public $cartItems;

    #[On('update-cart')]
    public function updateCartData()
    {
        // dd($this->cartItemCount);
        $this->cartItems = Cart::content()->toArray();
    }
    public function render()
    {
        // dd(Cart::content()->toArray());
        $this->cartItems = Cart::content()->toArray();
        
        return view('livewire.cart-item', ['items' => $this->cartItems]);
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
        $this->dispatch('update-cart');
        // You may emit an event or perform other actions after clearing the cart
    }
    public function getData()
    {
        $this->cartItems = Cart::content()->toArray();
    }

    public function decrementCartQuantity($rowId)
    {
        $current = Cart::get($rowId);
        Cart::update($rowId, $current->qty - 1);
        $this->dispatch('update-cart');
    }
    public function incrementCartQuantity($rowId)
    {
        $current = Cart::get($rowId);
        Cart::update($rowId, $current->qty + 1);
        $this->dispatch('update-cart');
    }
}
