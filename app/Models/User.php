<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function created_by_user()
    {
        return $this->belongsTo(User::class, "created_by", "id");
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'current_team_id', 'id');
    }

    public function created_teams()
    {
        return $this->hasMany(Team::class, 'user_id', 'id');
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class, TeamUser::class, 'user_id', 'team_id', 'id', 'id');
    }
    public function contacts()
    {
        return $this->morphMany(Contact::class, 'account');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'created_by');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'created_by_user_id', 'id');
    }

    public function open_customer_accounts()
    {
        return $this->hasMany(Customer::class, 'opened_by', 'id');
    }

    // is_instructor
    public function branches()
    {
        return $this->belongsToMany(Branch::class, BranchInstructor::class, 'instructor_id', 'branch_id', 'id', 'id');
    }
    public function course_levels()
    {
        return $this->belongsToMany(CourseLevel::class, InstructorCourseLevel::class, 'instructor_id', 'course_level_id', 'id', 'id');
    }
    public function course_sessions()
    {
        return $this->hasMany(CourseSession::class, 'instructor_id', 'id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'instructor_id', 'id');
    }


    // assigned_to_user_id
    function monthly_targets()
    {
        return $this->hasMany(MonthlyTarget::class, "assigned_to_user_id", "id");
    }

    function targets()
    {
        return $this->hasMany(Target::class, "user_id", "id");
    }

    public function follow_up_requests_request_by()
    {
        return $this->hasMany(FollowUpRequest::class, 'request_by', 'id');
    }

    public function follow_up_requests_action_by()
    {
        return $this->hasMany(FollowUpRequest::class, 'action_by', 'id');
    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class)->withPivot('read_at');
    }

    public function inConversation($id)
    {
        return $this->conversations->contains('id', $id);
    }

    // public function hasRead(Conversation $conversation)
    // {
    //     return $this->conversations->find($conversation->id)->pivot->read_at;
    // }
    public function employee()
    {
        return $this->hasOne(Employee::class, "user_id", "id");
    }

    public function blog_posts()
    {
        return $this->morphMany(BlogPost::class, 'created_by');
    }
}
