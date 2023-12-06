<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Facades\Cart;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $product;

    protected $updatesQueryString = ['search'];

    public function mount($product): void
    {
        $this->product = $product;
    }

    public function render(): View
    {
        return view('livewire.products');
    }

    public function addToCart(int $productId): void
    {
        Cart::add(Product::where('id', $productId)->first());
    }
}
