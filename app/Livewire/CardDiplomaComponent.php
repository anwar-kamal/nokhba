<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class CardDiplomaComponent extends Component
{
    public $diploma, $card_title, $card_content, $diploma_id, $price;

    public function mount()
    {
        $this->card_title = langContent('card_title');
        $this->card_content = langContent('card_content');
        $this->diploma_id = isset($this->diploma['diploma_system_field']) && array_key_exists('value', $this->diploma['diploma_system_field']) ? $this->diploma['diploma_system_field']['value'] : null;
        $this->price = Product::findOrFail($this->diploma_id)->product_prices->first()->price_after_tax;
    }

    public function render()
    {
        return view('livewire.card-diploma-component');
    }
}
