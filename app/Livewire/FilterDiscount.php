<?php

namespace App\Livewire;

use Livewire\Component;

class FilterDiscount extends Component
{
    public $discount = [];
    public function mount()
    {
    }
    public function updated($name, $value)
    {
        if ($value !== "__rm__") {

            $filters = [
                'discount' => explode(',', $value),
            ];
        } else {
            $filters = [];
        }
        $this->dispatch('filters-updated', filters: $filters);
    }
    public function render()
    {
        return view('livewire.filter-discount');
    }
}
