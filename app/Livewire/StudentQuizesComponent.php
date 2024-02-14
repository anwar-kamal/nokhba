<?php

namespace App\Livewire;

use App\Models\CourseSession;
use App\Services\CustomerService;
use Livewire\Component;

class StudentQuizesComponent extends Component
{
    public $courseId;

    public function render()
    {
        $current_courses = CustomerService::current_courses();

        $query = CourseSession::query();
        $query->whereIn("id",CustomerService::quizes()->pluck("id")->toArray());
        if ($this->courseId) {
            $query->where("course_id",$this->courseId);
        }
        $quizes = $query->get();
        return view('livewire.student-quizes-component', ["current_courses" => $current_courses, "quizes"=>$quizes]);
    }

    public function select_course($course = null)
    {
        $this->courseId = $course;
    }
}
