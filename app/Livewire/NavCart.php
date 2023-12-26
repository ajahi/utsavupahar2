<?php

namespace App\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use Livewire\Attributes\On;


class NavCart extends Component
{
    public $cartItems, $cartItemCount;

    public function mount()
    {
        $this->dispatch('update-cart');
    }
    #[On('update-cart')]
    public function updateCartData()
    {
        $this->cartItemCount = Cart::count();
        // dd($this->cartItemCount);
        $this->cartItems = Cart::content()->toArray();
    }

    public function removeCartItem($rowId)
    {
        Cart::remove($rowId);
        $this->cartItems = Cart::content()->toArray();
        $this->cartItemCount = Cart::count();
        $this->dispatch('flash', mssg: 'Items Removed from Cart Successfully.');
        $this->dispatch('update-cart');

        // You may emit an event or perform other actions after removing an item
    }

    public function clearCart()
    {
        Cart::destroy();
        $this->cartItems = Cart::content()->toArray();
        $this->cartItemCount = Cart::count();
        $this->dispatch('update-cart');
        // You may emit an event or perform other actions after clearing the cart
    }

    public function render()
    {
        $this->cartItems = Cart::content()->toArray();
        $this->cartItemCount = Cart::count();
        // dd(Cart::content()->toArray());
        return view('livewire.nav-cart', ['items' => $this->cartItems]);
    }
}
