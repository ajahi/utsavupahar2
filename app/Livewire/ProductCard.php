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
        $Product=Product::findOrFail($productId);
        Cart::add($Product->id, $Product->name, 1, $Product->purchase_price*$Product->sell_margin_p,['variant'=>$Product->variants()->first()->name])->associate($Product);

        $this->dispatch('update-cart');
    }

    
}
