<?php

namespace App\Livewire;

use App\Services\CustomerService;
use Livewire\Component;

class StudentReportsComponent extends Component
{
    public function render()
    {
        $current_courses = CustomerService::current_courses();
        return view('livewire.student-reports-component',["current_courses"=>$current_courses]);
    }
}
