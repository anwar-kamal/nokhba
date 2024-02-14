<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class StudentDashboardSidebarComponent extends Component
{
    public $tab;
    public $course_id;
    protected $queryString = ['tab','course_id'];

    public function mount(){
        $this->tab = $this->tab ? $this->tab : "dashboard";
    }

    public function render()
    {
        return view('livewire.student-dashboard-sidebar-component');
    }

    public function navigate($to_tab)
    {
        $this->tab = $to_tab;
        $this->dispatch('navigate-tab', tab: $to_tab);
    }

    #[On('navigate-tab')]
    function update_tab($tab , $course_id =null){
        $this->tab = $tab;
        $this->course_id = $course_id;
        $this->dispatch('refresh_calender');
    }

    #[On('update-tab')]
    function navigate_to_tab($tab , $course_id =null){
        $this->tab = $tab;
        $this->course_id = $course_id;
    }
}
