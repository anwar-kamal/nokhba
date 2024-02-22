<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\CourseSession;
use App\Models\LibraryFile;
use App\Services\CustomerService;
use Livewire\Component;

class StudentDocumentsComponent extends Component
{
    public $courseId;
    public $typeId;

    public function render()
    {
        $current_courses = CustomerService::current_courses();

        $session_files_query = CustomerService::session_files();

        $course_files_query = CustomerService::course_files();

        $product_files_query = CustomerService::product_files();

        if ($this->courseId) {
            $course = Course::find($this->courseId);

            $session_files_query->whereIn("model_id",$course->course_sessions->pluck("id")->toArray());

            $course_files_query->where("model_id",$this->courseId);

            $product_files_query->where("model_id", $course->course_level->product_id);
        }
        if ($this->typeId) {
            $session_files_query->where("library_file_type_id", $this->typeId);
            $course_files_query->where("library_file_type_id", $this->typeId);
            $product_files_query->where("library_file_type_id", $this->typeId);
        }
        $session_files = $session_files_query->get();
        $course_files = $course_files_query->get();
        $product_files = $product_files_query->get();

        return view('livewire.student-documents-component', ["current_courses" => $current_courses,
        "session_files"=>$session_files, "course_files"=>$course_files, "product_files"=>$product_files,]);
    }

    public function select_course($course = null)
    {
        $this->courseId = $course;
    }
    public function select_type($type = null)
    {
        $this->typeId = $type;
    }
}
