<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseCustomerExam extends Model
{
    use HasFactory;

    protected $table = 'course_customer_exams';
    protected $fillable = [
        'customer_id', 'course_exam_id', 'course_customer_id', 'token', 'score', 'is_pass',
         'pass_course_level_id', 'last_updated_by', 'comment', 'from' ,'to', 'active'
    ];
    public function last_updated_by_user()
    {
        return $this->belongsTo(User::class, 'last_updated_by', 'id');
    }
    public function course_customer()
    {
        return $this->belongsTo(CourseCustomer::class, 'course_customer_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    public function pass_course_level(){
        return $this->belongsTo(CourseLevel::class ,"pass_course_level_id" ,"id");
    }
    public function course_exam()
    {
        return $this->belongsTo(CourseExam::class, 'course_exam_id', 'id');
    }
    public function course_customer_exams()
    {
        return $this->hasMany(CourseCustomerExam::class, 'course_customer_id', 'id');
    }
    public function exam_questions(){
        return $this->hasMany(CourseCustomerExamQuestion::class, 'course_customer_exam_id', 'id');
    }

    public function exam_questions_with_childs($only_parents = false , $only_childs = false){
        $ques_ids = $this->exam_questions()->pluck('question_id')->toArray();
        $query = CourseCustomerExamQuestion::query();


        if (!$only_parents)
            $query->orWhereIn('question_id',$ques_ids);
        if (!$only_childs)
            $query->whereIn( 'id', $ques_ids);


        return $query->get() ;

    }

    public function exam_questions_count(){
        $child_counts = $this->exam_questions()->whereNotNull('child_question_id')->count();
        $prents_ids = $this->exam_questions()->select('question_id')->distinct()->whereNotNull('child_question_id')->pluck('question_id')->toArray();

        $non_parents_questions = $this->exam_questions()->whereNotIn('question_id',$prents_ids)->count();
        return ($non_parents_questions + $child_counts);

    }

    public function exam_answers($status = false){

        $query = CourseCustomerExamAnswer::
                whereIn( 'course_customer_exam_question_id', $this->exam_questions()->pluck('id')->toArray());

        if ($status)
            $query->where('status','=',$status);

        return $query->get();

    }

    public function get_score(){

        // count correct score
        $score=0;

        foreach($this->exam_answers('correct') as $ans){

            if (!$ans->answer_id){
                $que = $ans->course_customer_exam_question->question;
            }
            else $que = $ans->answer->question;

            $question_score =($que->score);

            if ($que->answer_type == 'multiple choices'){

                $all_correct_score =  ($ans->answer->question->answers()->where('status','=',1)->get()->count());

                $score+= $question_score / $all_correct_score;
            }

            else $score += $question_score;


        }

        // count exam questions count score
        $question_score = 0;
        $child_counts = $this->exam_questions()->whereNotNull('child_question_id')->get();
        foreach($child_counts as $que ){
            $question_score +=$que->question->score ;
        }

        $prents_ids = $this->exam_questions()->select('question_id')->distinct()->whereNotNull('child_question_id')
                        ->pluck('question_id')->toArray();

        $non_parents_questions = $this->exam_questions()->whereNotIn('question_id',$prents_ids)->get();
        foreach($non_parents_questions as $que ){
            $question_score +=$que->question->score ;
            //log::info('que : '.$que->question->text .' = '. $que->question->score);
        }

        //dd($score .' = '. $question_score );
        return round( $score / $question_score , 2);
    }
}
