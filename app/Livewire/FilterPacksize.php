<?php

namespace App\Livewire;

use Livewire\Component;

class FilterPacksize extends Component
{
    public $packSize = [];
    public function mount()
    {
    }
    public function updated($name, $value)
    {
        if ($value !== "__rm__") {

            $filters = [
                'weight' => explode(',', $value),
            ];
        } else {
            $filters = [];
        }
        $this->dispatch('filters-updated', filters: $filters);
    }
    public function render()
    {
        return view('livewire.filter-packsize');
    }
}
