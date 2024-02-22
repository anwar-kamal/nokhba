<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\CourseCustomer;
use App\Models\CourseCustomerAttendance;
use App\Models\CourseCustomerExam;
use App\Models\CourseSession;
use App\Services\CustomerService;
use Livewire\Component;
use Illuminate\Support\Str;
class StudentCourseDetailsComponent extends Component
{
    public $course_id;
    public $course;
    public $active_session;
    public $open_session= false;
    public $cs_id;
    public $is_allowed_controller=true;
    public $disallow_reason=false;
    public $show_exam=false;
    public $token = false;
    public $is_waiting =false ;
    protected $listeners = ['join'];

    public function render()
    {
        return view('livewire.student-course-details-component');
    }

    public function mount(){
        $this->course = Course::find($this->course_id);
        $this->active_session = $this->course->course_sessions->first();

        if( strtotime($this->active_session->session_date) > strtotime('now') ){
            $this->is_allowed_controller  = false;
            $this->disallow_reason = 'date';
        }

        $cs = CustomerService::course_course_customer($this->course->id)->first();
        if ($cs)
            $this->cs_id = $cs->id;
        else if (auth()->user()->is_demo_user()){ }
        else abort(403);
        $this->start();

    }

    public function start(){

        if ( $this->cs_id ){

            $courseCustomerAttendance = CourseCustomerAttendance:: where('course_customer_id', '=', $this->cs_id)->where('course_session_id', '=', $this->active_session->id)->first();

            if ($courseCustomerAttendance) {
                $courseCustomerAttendance->attend = 1;
            } else {
                $courseCustomerAttendance = new CourseCustomerAttendance();
                $courseCustomerAttendance->attend               = 1;
                $courseCustomerAttendance->course_customer_id   = $this->cs_id;
                $courseCustomerAttendance->course_session_id    = $this->active_session->id;
                $courseCustomerAttendance->instructor_id = $this->active_session->instructor_id;
                $courseCustomerAttendance->confirmed_by = 311;
            }
            $courseCustomerAttendance->save();
        }
        $this->open_session = true ;
    }

    function join ($course_session_id){

        $course_session = CourseSession::findOrFail($course_session_id);

        if ($this->active_session->id != $course_session_id) {
            return ;
        }

        if ( $course_session->meeting_id ){
            $rslt =  Bigbluebutton::getMeetingInfo([
                'meetingID' => $course_session->meeting_id,
                'moderatorPW' => '987654321',
            ]);

            if ($rslt && $rslt->count())
                if (Bigbluebutton::isMeetingRunning($course_session->meeting_id)){
                    $url = Bigbluebutton::join([
                        "meetingID" => $course_session->meeting_id,
                        'userName' => auth()->user()->name ?? 'test student',
                        'password' => env("BBB_attendeePW" ,'123456789'),
                    ]);
                    //dd($url);
                   //$this->dispatch('redirect_to', ['url' => $url]);
                   return redirect()->to($url);
                   return ;
                }

        }

        // if not redirect wait for open
        $this->is_waiting = $course_session_id ;
        $this->dispatch('wait_lecture', ['course_session_id' =>$course_session_id]);

    }

    function is_recorder($course_session_id){

        $course_session = CourseSession::findOrFail($course_session_id);

        if ($course_session->is_recorded  ){
            return $course_session->is_recorded;
        }else{

             try{
                 //dd($course_session);
                 $rslt = Bigbluebutton::getRecordings([
                    'meetingID' => $course_session->meeting_id,//'session_'.$course_session->id,
                 ]);

                 if ($rslt->count()){

                    foreach($rslt as $res){
                        $url = $res['playback']['format']['url'];
                        $course_session->is_recorded = $url ;
                        $course_session->save();
                     }
                     return $url ;
                 }


             }catch(Exception $exp){
                 return false;
             }
            return false;
        }

    }

    public function is_allowed( $prev , $is_prev_allowed , $course_session){
        // check current date
         if( strtotime($course_session->session_date) > strtotime('now') )
            return false ;

        if(!$prev)
            return true ;

        if (!$is_prev_allowed) return false ;

        if ($prev->exam && $this->cs_id){
            $customer_session_exam = CourseCustomerExam::
                where('course_customer_id','=',$this->cs_id)
                ->where('course_exam_id','=',$prev->exam_id)->first();


            if ($customer_session_exam && $customer_session_exam->total_score ){
                if ( ($prev->exam->exam->pass_percent > 0 && $customer_session_exam->total_score >= intval($prev->exam->exam->pass_percent) )  ||
                        ($customer_session_exam->total_score >= 0.5 ) ){
                    $aa = ($prev->exam->exam->pass_percent && $customer_session_exam->total_score >= intval($prev->exam->exam->pass_percent) );
                    $bb =$customer_session_exam->total_score >= 0.5 ;

                    return true ;
                }
            }
            return true ; //return false ; /* temporarly  */
        }
        return true ;
    }

    public function change_session($id , $exam=false , $is_allowed_controller= true){


        $this->active_session   = $this->course->course_sessions()->where('id','=',$id)->first();
        $this->dispatch('go_top');
        $this->open_session     = false ;
        $this->is_allowed_controller  = $is_allowed_controller;
        if (!$this->is_allowed_controller){
            //dd($this->active_session->session_date .' == '.strtotime('now'));
            if( strtotime($this->active_session->session_date) > strtotime('now') )
                $this->disallow_reason = 'date';
            else $this->disallow_reason = 'exam';

            return ;
        }

        $this->show_exam        = $exam;

        if ($exam && $this->cs_id){

            $customer_session_exam = CourseCustomerExam::
                where('course_customer_id','=',$this->cs_id)
                ->where('course_exam_id','=',$this->active_session->exam_id)->first();

            if (!$customer_session_exam){
                $customer_session_exam = new CourseCustomerExam();
                $customer_session_exam->customer_id      = auth()->user()->id;
                $customer_session_exam->course_exam_id   = $this->active_session->exam_id;
                $customer_session_exam->token            = Str::random(32);
                $customer_session_exam->last_updated_by  = 311;
                $customer_session_exam->course_customer_id = $this->cs_id;
                $customer_session_exam->active           = 1;
                $customer_session_exam->from             = date('Y-m-d H:i:s',time()) ;
                //$customer_session_exam->to               = date('Y-m-d H:i:s', strtotime('+3 day', time()));
                $customer_session_exam->save();
            } else{

            }
            $this->token = $customer_session_exam->token;
        }
        if( strtotime($this->active_session->session_date) < strtotime('now') ){

            $this->start();
        }

    }

    public function regenrate_session_exam( CourseCustomerExam $course_customer_exam ){

        $new_course_customer_exam = new CourseCustomerExam();
        $new_course_customer_exam->customer_id = $course_customer_exam->customer_id;
        $new_course_customer_exam->course_exam_id = $course_customer_exam->course_exam_id;
        $new_course_customer_exam->token = Str::random(32);
        $new_course_customer_exam->last_updated_by = 311;
        $new_course_customer_exam->created_by = 311;

        $new_course_customer_exam->course_customer_id = $course_customer_exam->course_customer_id;
        $new_course_customer_exam->active = $course_customer_exam->active;
        $new_course_customer_exam->from = $course_customer_exam->from;
        $new_course_customer_exam->to = $course_customer_exam->to;
        $new_course_customer_exam->save();

        $course_customer_exam->customer_id = null;
        $course_customer_exam->course_customer_id = null;
        $course_customer_exam->save();

        $this->dispatch('redirect_to', ['url' => route('exam.index', [$new_course_customer_exam->token])]);

    }
}
