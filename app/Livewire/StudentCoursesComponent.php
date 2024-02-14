<?php

namespace App\Livewire;

use App\Models\Course;
use App\Services\CustomerService;
use Livewire\Component;

class StudentCoursesComponent extends Component
{
    public $course_tab = 'current';
    public $name;
    protected $listeners = ['navigate'];

    public function render()
    {
        $query = Course::query();

        switch ($this->course_tab) {
            case 'current':
                $query->whereIn("id", CustomerService::current_courses()->pluck("id")->toArray());
                break;
            case 'completed':
                $query->whereIn("id", CustomerService::completed_courses()->pluck("id")->toArray());
                break;
            case 'all':
                $query->whereIn("id", CustomerService::all_courses()->pluck("id")->toArray());
                break;
            default:
                $query = collect();
                break;
        }

        if ($this->name) {
            $query->where('name', 'like', '%' . $this->name . '%');
        }
        $courses = $query->get();

        return view('livewire.student-courses-component', ["courses" => $courses]);
    }

    public function navigate($to_tab, $courseId = null)
    {
        $this->dispatch('navigate-tab', tab: $to_tab, course_id: $courseId);
    }

    public function move_to($tab)
    {
        $this->course_tab = $tab;
    }

    public function search()
    {
    }
}
