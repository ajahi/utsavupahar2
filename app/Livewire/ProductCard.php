<?php

namespace App\Livewire;

use Livewire\Component;
use Auth;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductCard extends Component
{
    public $product;
    
    public function render()
    {
        return view('livewire.product-card');
    }

    public function addToCart($productId)
    {
        $this->product=Product::findOrFail($productId);
        Cart::add($this->product->id, $this->product->name, 1, $this->product->purchase_price*$this->product->sell_margin_p,['variant'=>$this->product->variants()->first()->name])->associate($this->product);
        session()->flash('success','Product added to cart');
        $this->dispatch('cart-item-updated');
    }

    public function buyNow($productId){
        Cart::deleteStoredCart();
        $this->product=Product::findOrFail($productId);
        Cart::add($this->product->id, $this->product->name, 1, $this->product->purchase_price*$this->product->sell_margin_p,['variant'=>$this->product->variants()->first()->name])->associate($this->product);
        return redirect()->to('/checkout');
    }

    
}
