<?php

namespace App\Services;

use App\Models\Course;
use App\Models\CourseCustomerExam;
use App\Models\CourseLevel;
use App\Models\CourseSession;
use App\Models\DiplomaProduct;
use App\Models\LibraryFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerService
{
    //courses
    public static function current_courses() //diploma open courses
    {
        if (auth('customers')->user()->is_demo_user()) {
            $courses = Course::query();
            $courses->where("is_diploma", 1);
            $courses =  $courses->whereHas('course_level', function ($query) {
                $query->whereIn('product_id', DiplomaProduct::get()->pluck('product_id')->toArray());
            })->where('course_status_id', 2)->get();
        } else {
            $courses = auth('customers')->user()->active_courses()->where('course_status_id', 2)
                ->where("is_diploma", 1)->get();
        }
        return $courses;
    }

    public static function day_sessions($date)
    {
        $sessions = CourseSession::whereIn("course_id", CustomerService::current_courses()->pluck("id")->toArray())
            ->where('status', '!=', 'canceled')->where('session_date', $date)->get();

        return $sessions;
    }

    public static function passed_course_sessions($course_id)
    {
        $sessions = CourseSession::where("course_id", $course_id)
            ->where('status', '!=', 'canceled')->where('session_date', '<=', date('Y-m-d'))->get();

        return $sessions;
    }

    public static function completed_courses()
    {
        return auth('customers')->user()->active_courses()->where("is_diploma", 1)->whereIn('course_status_id', [6, 7])->get();
    }

    public static function all_courses()
    {
        return auth('customers')->user()->active_courses()->where("is_diploma", 1)->get();
    }

    //course customers
    public static function current_course_customers() //diploma open courses - active course customers
    {
        return auth('customers')->user()->course_customer()
            ->whereIn('course_id', CustomerService::current_courses()->pluck("id")->toArray())
            ->whereNotIn("confirmation", ["Rejected", "Not Yet"])
            ->orderBy("created_at","desc")
            ->get();
    }

    public static function all_course_customers() //diploma open courses - active course customers
    {
        return auth('customers')->user()->course_customer()
            ->whereIn('course_id', CustomerService::all_courses()->pluck("id")->toArray())
            ->whereNotIn("confirmation", ["Rejected", "Not Yet"])
            ->orderBy('id', 'DESC')
            ->get();
    }

    public static function course_course_customer($course_id)
    {
        return CustomerService::all_course_customers()->where('course_id', '=', $course_id);
    }

    public static function course_customers_with_degree()
    {
        return auth('customers')->user()->course_customer()->whereNotIn("confirmation", ["Rejected", "Not Yet"])->whereNotNull('degree')->get();
    }

    // semesters
    public static function course_semester($course_id)
    {
        $cs = CustomerService::course_course_customer($course_id)->first();
        $semester = null;
        if ($cs && $cs->order_detail) {
            if ($cs->order_detail->item) {
                if ($cs->order_detail->item->semester) {
                    $semester = $cs->order_detail->item->semester;
                }
            }
        }
        return $semester;
    }

    public static function current_semester()
    {
        $cs = CustomerService::current_course_customers()->first();
        $semester = null;
        if ($cs && $cs->order_detail) {
            if ($cs->order_detail->item) {
                if ($cs->order_detail->item->semester) {
                    $semester = $cs->order_detail->item->semester;
                }
            }
        }
        return $semester;
    }


    //sessions
    public static function quizes()
    {
        $quizes = CustomerService::current_course_customers()
            ? CourseSession::whereIn('course_id', CustomerService::current_course_customers()->pluck('course_id')->toArray())
            ->whereNotNull('exam_id')
            ->orderBy("session_date", "asc")
            // ->get()
            : null;

        return $quizes;
    }

    public static function course_quizes_exam_ids($course_id)
    {
        $quizes = CourseSession::where('course_id', $course_id)
            ->whereNotNull('exam_id')
            ->pluck('exam_id')
            ->toArray();

        return $quizes;
    }

    public static function final_exams()
    {
        $courses_have_exams = [];
        foreach (CustomerService::current_courses() as $course) {
            $exam = CustomerService::course_final_exam($course->id);
            $courses_have_exams[] = ["course_name" => $course->name, "exam_id" => ($exam ? $exam->id : null), "exam_from" => ($exam ? $exam->from : null)];
        }
        //order by exam_from
        $exam_from = [];
        foreach ($courses_have_exams as $key => $row) {
            $exam_from[$key] = $row['exam_from'];
        }
        if ($exam_from) {
            array_multisort($exam_from, SORT_ASC, $courses_have_exams);
        }

        return $courses_have_exams;
    }

    public static function course_final_exam($course_id)
    {
        $exam = CustomerService::course_course_customer($course_id)->first()
            ? CourseCustomerExam::whereIn('course_customer_id', CustomerService::course_course_customer($course_id)->pluck('id')->toArray())
            ->whereNotIn('course_exam_id', CustomerService::course_quizes_exam_ids($course_id))
            ->orderBy("from", "desc")->first()
            : "";

        return $exam;
    }

    public static function passed_course_customer_exams($course_id)
    {
        $exams = CustomerService::course_course_customer($course_id)->first()
            ? CustomerService::course_course_customer($course_id)->first()
            ->course_customer_exams()->whereNotNull('total_score')->join('course_exams', 'course_customer_exams.course_exam_id', '=', 'course_exams.id')
            ->join('exams', 'course_exams.exam_id', '=', 'exams.id')->whereColumn('course_customer_exams.total_score', '>', DB::raw('CAST(exams.pass_percent AS UNSIGNED)'))
            ->distinct('course_customer_exams.course_exam_id')
            ->whereIn('course_customer_exams.course_exam_id', CustomerService::course_quizes_exam_ids($course_id)) : null;
        return $exams;
    }

    public static function enter_exam($id, $cs_id)
    {
        if ($cs_id) {
            $active_session = CourseSession::find($id);
            $customer_session_exam = CourseCustomerExam::where('course_customer_id', '=', $cs_id)
                ->where('course_exam_id', '=', $active_session->exam_id)->whereNotNull("token")->first();

            if (!$customer_session_exam) {
                $customer_session_exam = new CourseCustomerExam();
                $customer_session_exam->customer_id      = auth()->user()->id;
                $customer_session_exam->course_exam_id   = $active_session->exam_id;
                $customer_session_exam->token            = Str::random(32);
                $customer_session_exam->last_updated_by  = 311;
                $customer_session_exam->course_customer_id = $cs_id;
                $customer_session_exam->active           = 1;
                $customer_session_exam->from             = date('Y-m-d H:i:s', time());
                $customer_session_exam->to               = date('Y-m-d H:i:s', strtotime('+3 day', time()));
                $customer_session_exam->save();
            } else {
            }
            return redirect()->to(
                env('APP_URL_OLD') . '/course_customer_exam/' . $customer_session_exam->token . '/exam/create'
            );
        }
    }

    public static function session_files()
    {
        $session_files_query = LibraryFile::where("model_type","App\Models\CourseSession")
        ->whereIn("model_id", CourseSession::whereIn("course_id",CustomerService::all_courses()->pluck("id")->toArray())->pluck("id")->toArray());

        return $session_files_query;
    }

    public static function course_files()
    {
        $course_files_query = LibraryFile::query();
        $course_files_query->where("model_type","App\Models\Course")->whereIn("model_id",CustomerService::all_courses()->pluck("id")->toArray());

        return $course_files_query;
    }

    public static function product_files()
    {
        $product_files_query = LibraryFile::query();
        $product_files_query->where("model_type","App\Models\Product")->whereIn("model_id", CourseLevel::whereIn("id",CustomerService::all_courses()->pluck("course_level_id")->toArray())->pluck("product_id")->toArray());

        return $product_files_query;
    }
}
