<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;


class FlashMessage extends Component
{
    public $flashMessage;
    public function mount()
    {
        
    }
    #[On('flash')]
    public function updateMessage($mssg){
        $this->flashMessage=$mssg;
    }

    public function render()
    {
        return view('livewire.flash-message');
    }

    public function remove(){
        $this->flashMessage=null;
    }
}
