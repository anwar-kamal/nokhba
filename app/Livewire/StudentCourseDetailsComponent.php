<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\CourseCustomer;
use App\Models\CourseCustomerAttendance;
use App\Models\CourseSession;
use Livewire\Component;

class StudentCourseDetailsComponent extends Component
{
    public $course_id;
    public $course;
    public $active_session;
    public $open_session= false;
    public $cs_id;
    public $is_allowed_controller=true;
    public $disallow_reason=false;
    // protected $listeners = ['upload' => 'upload_check' , 'join'];
    public $show_exam=false;
    public $token = false;
    public $active_tab ='tab1';
    public $is_waiting =false ;

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

        $cs = CourseCustomer::where('course_id','=',$this->course->id)->where('customer_id','=',auth()->user()->id)->first();
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
                   //$this->dispatchBrowserEvent('redirect_to', ['url' => $url]);
                   return redirect()->to($url);
                   return ;
                }

        }

        // if not redirect wait for open
        $this->is_waiting = $course_session_id ;
        $this->dispatchBrowserEvent('wait_lecture', ['course_session_id' =>$course_session_id]);

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
}
