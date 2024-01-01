<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Spatie\Searchable\Search;
use App\Models\Product;
use Livewire\Attributes\Layout;

class SearchWebsite extends Component
{
    public $searchText;
    private $searchResults;
    public function mount($searchText)
    {
        $this->searchText = $searchText;
        $this->searchResults = (new Search())
        ->registerModel(Product::class, 'name')
        ->registerModel(Category::class, 'name')
        ->search($this->searchText);
    }
    public function updatedSearchText()
    {
        
        $this->searchResults = (new Search())
        ->registerModel(Product::class, 'name')
        ->search($this->searchText)
    ;
    }
    // #[Layout('layouts.app')] 
    public function render()
    {
        return view('livewire.search-website', ['searchResults' => $this->searchResults]);
    }
}
