<?php

namespace App\Livewire;

use Livewire\Component;
use Statamic\Entries\Entry;

class MainBlogsComponent extends Component
{
    public $page, $loadAmount = 3;
    protected $listeners = ['loadMoreBlogs'];

    public function render()
    {
        $entry = Entry::query();
        $entry->where('collection', 'blogs');
        $entry->orderByDesc('date');
        $slide = $entry->limit($this->page['number_of_blogs_displayed_in_slide']);
        return view('livewire.main-blogs-component', ['slideBlogs' => $slide->get(), 'blogs' => $entry->limit($this->loadAmount)->get()]);
    }

    public function loadMoreBlogs()
    {
        $this->loadAmount += 3;
    }
}
