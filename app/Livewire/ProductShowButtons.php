<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;


class ProductShowButtons extends Component
{
    public $counter;
    public $p_id;//product->id
    public function render()
    {
        return view('livewire.product-show-buttons');
    }

    public function addToCart($productId)
    
    {
        $Product=Product::findOrFail($productId);
        Cart::add($Product->id, $Product->name, 1, $Product->purchase_price*$Product->sell_margin_p,['variant'=>$Product->variants()->first()->name])->associate($Product);

        $this->dispatch('update-cart');
    }
}
