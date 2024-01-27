<?php

namespace App\Livewire;

use Livewire\Component;

class SortbyFilter extends Component
{
    public $selectedOrder = "Most Popular";
    public function mount()
    {
    }

    public function setSortFilter($sortBy, $sortOrder)
    {
        $filter = [
            'sorting' => [
                'by' => $sortBy,
                'order' => $sortOrder,
            ]
        ];
        $this->dispatch('filters-updated', filters: $filter);
        switch ($sortBy) {
            case 'purchase_price':
                $this->selectedOrder = "Purchase Price";
                break;
            case 'rating':
                $this->selectedOrder = "Average Rating";
                break;
            case 'name':
                $this->selectedOrder = "Alphabetical Order";
                break;
            case 'discount_p':
                $this->selectedOrder  = "Discount %";
                break;
        }
    }
    public function render()
    {
        return view('livewire.sortby-filter');
    }
}
