<?php

namespace App\Livewire;

use Livewire\Component;
use Statamic\Facades\Entry;
use Illuminate\Support\Facades\Request;

class AllDiplomaComponent extends Component
{
    public $url;

    public function mount()
    {
        $this->url = basename(Request::path());
    }

    public function render()
    {
        $products = Entry::query();
        if($this->url == "women-diplomas"){
            $products->where('collection', 'Diplomas');
        }elseif($this->url == "courses"){
            $products->where('collection', 'Courses');
        }
        $products->where('status', 'Published');
        return view('livewire.all-diploma-component', ['products' => $products->get()]);
    }
}
