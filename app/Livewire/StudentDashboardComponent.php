<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class StudentDashboardComponent extends Component
{
    public $tab;
    public $course_id;

    protected $queryString = ['tab','course_id'];

    public function mount()
    {
        $this->tab = $this->tab ? $this->tab : "dashboard";
    }

    public function render()
    {
        return view('livewire.student-dashboard-component');
    }

    #[On('navigate-tab')]
    function navigate($tab , $course_id =null){
        $this->tab = $tab;
        $this->course_id = $course_id;
        if ($tab == 'dashboard') {
            $this->dispatch('update-tab', tab: $tab);
            $this->dispatch('refresh_calender');
        }
    }

}
