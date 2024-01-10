<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Locked;
use Livewire\Component;

class FilterCategories extends Component
{

    private $results;
    public $searchText;
    public $selected = [];
    public function boot()
    {
        $this->results = Category::all();
    }
    public function updatedSelected()
    {
        $filters = ['category' => $this->selected];
        $this->dispatch('filters-updated', filters: $filters);
    }
    public function render()
    {
        if ($this->searchText) {
            $this->results = Category::where('name', 'like', '%' . $this->searchText . '%')->get();
        }
        return view('livewire.filter-categories', ['categories' => $this->results]);
    }
}
