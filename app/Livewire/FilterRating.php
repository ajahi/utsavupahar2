<?php

namespace App\Livewire;

use Livewire\Component;

class FilterRating extends Component
{
    public $rating = [];
    public function mount()
    {
    }

    public function updated($name, $value)
    {
        $this->dispatch('filters-updated', filters: ['rating' => $value]);
    }
    public function render()
    {
        return view('livewire.filter-rating');
    }
}
