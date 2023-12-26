<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class AddWishlist extends Component
{
    public $product_id, $wishlistItemCount, $items;
    public function mount($product_id = null)
    {
        // dd(Cart::count());
        $this->product_id = $product_id;
        if (!$product_id) {
            $this->wishlistItemCount = Cart::instance('wishlist')->count();
            $this->items = Cart::instance('wishlist')->content();
        }
    }

    public function addItemToWishlist()
    {
        if ($this->product_id) {
            $product = Product::find($this->product_id);
            Cart::instance('wishlist')->add($product->id, $product->name, 1, $product->purchase_price);
            $this->dispatch('product-added-to-wishlist');
        } else {

            return;
        }
    }
    public function render()
    {
        return view('livewire.add-wishlist');
    }
}
