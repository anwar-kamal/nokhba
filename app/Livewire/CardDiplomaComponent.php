<?php

namespace App\Livewire;

use Livewire\Component;

class CardDiplomaComponent extends Component
{
    public $key;
    public $diploma;

    public function render()
    {
        return view('livewire.card-diploma-component');
    }
}
