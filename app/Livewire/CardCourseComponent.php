<?php

namespace App\Livewire;

use Livewire\Component;

class CardCourseComponent extends Component
{
    public $course;

    public function render()
    {
        return view('livewire.card-course-component');
    }
}
