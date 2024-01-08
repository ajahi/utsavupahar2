<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

class FilteredProducts extends Component
{
    #[Url]
    public $search;
    private $results;
    private $filters = [];
    public function mount()
    {
        $this->filters = [
            'search' => $this->search ?? '',
        ];
        $this->results = Product::filter($this->filters);
    }
    #[On('filters-updated')]
    public function updateProductList($filters)
    {
        // dd($filters);
        $allFilters = array_merge($this->filters, [
            'search' => $this->search ?? '',
            'category' => $filters['category'] ?? '',
            'rating' => $filters['rating'] ?? '',
            'sorting' => $filters['sorting'] ?? '',
        ]);
        $this->results = Product::filter($allFilters);
    }
    public function render()
    {
        return view('livewire.filtered-products', ['products' => $this->results->get()]);
    }
}
