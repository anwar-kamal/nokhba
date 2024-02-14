<?php

namespace App\Livewire;

use Livewire\Component;
use Statamic\Entries\Entry;

class CardBlogsComponent extends Component
{
    public $loadAmount = 3;
    protected $listeners = ['loadMoreBlogs'];

    public function render()
    {
        $entry = Entry::query();
        $entry->where('collection', 'blogs');
        $blogs = $entry->orderByDesc('date');
        return view('livewire.card-blogs-component', ['blogs' => $blogs->limit($this->loadAmount)->get()]);
    }

    public function loadMoreBlogs()
    {
        dd(123);
        $this->loadAmount += 3;
    }
}
