<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Variant;
use Livewire\Attributes\Validate;


class ProductShowButtons extends Component
{
    
    public $count=1;
    public $variant;
    public $product;
    public $activeVariant = null;

    public function render()
    {
        return view('livewire.product-show-buttons');
    }

    public function mount()
    {
        // make activeVariant and variant to the first variant.
        $firstVariant = $this->product->variants->first();
        $this->activeVariant = $firstVariant->id;
        $this->variant=$firstVariant;
    }
    
    public function updateVariant($variantId){
       $this->variant=Variant::find($variantId);

       $this->activeVariant = $variantId;
    }

    public function increment(){
        $this->count++;
    }

    public function decrement(){
        $this->count--;
    }

    public function addToCart($productId)
    {   $pro=Product::findOrFail($productId);
        Cart::add($pro->id, $pro->name . "( ". $this->variant->name .")", $this->count, ($this->variant->price - $this->variant->price*$pro->discount_p/100),
        [
            'variant'=>$this->variant->name,
            'variant_id'=>$this->variant->id,
            'variant_price'=>$this->variant->price
            ])->associate($pro);
        //mssg flash to uer
        $this->dispatch('flash', mssg:'Items Added to Cart Successfully.');//event named flash that displays notification.
        //updates cart.
        $this->dispatch('update-cart');
    }
    
    public function buyNow($productId){
        Cart::remove($rowId);
        Cart::deleteStoredCart();
        $this->product=Product::findOrFail($productId);
        Cart::add($this->product->id, $this->product->name, 1, $this->product->purchase_price*$this->product->sell_margin_p,['variant'=>$this->product->variants()->first()->name])->associate($this->product);
          return redirect()->to('/checkout');
      }
    
}
