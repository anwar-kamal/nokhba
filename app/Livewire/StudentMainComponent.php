<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\CustomerService;

class StudentMainComponent extends Component
{
    public $data;
    public $session_date;

    protected $listeners = ['dateSelected','navigate'];

    public function mount()
    {
        $this->session_date = now()->format('Y-m-d');
    }

    public function render()
    {
        $current_courses = collect();
        $final_exams = [];

        $current_courses = CustomerService::current_courses()->take(4);
        $final_exams = CustomerService::final_exams();
        $this->data = [
            "current" => $current_courses->count(),
            "completed" => CustomerService::completed_courses()->count(),
            "exams" => CustomerService::course_customers_with_degree()->count(),
            "certs" => CustomerService::course_customers_with_degree()->whereNotIn("order_detail_id", auth('customers')->user()->customer_diploma_orders()->pluck("id")->toArray())->count()
        ];

        $this->dispatch('refresh_calender');

        return view('livewire.student-main-component', ["current_courses" => $current_courses, "final_exams" => $final_exams]);
    }

    public function navigate($to_tab, $courseId = null)
    {
        $this->dispatch('navigate-tab', tab: $to_tab, course_id: $courseId);
    }

    public function dateSelected($dateStr)
    {
        $this->session_date = $dateStr;
    }
}
