<?php

namespace App;

use App\Models\Lesson;
use App\Models\SubjectLevelDetail;
use App\Models\StudentLesson;
use App\Models\Subject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $guarded = ['id'];

    public function subject_level_details()
    {
        return $this->hasMany(SubjectLevelDetail::class, 'user_id')->with('Getsubject', 'Getlevel');
    }

    public function getSubjects()
    {
        return $this->hasMany(SubjectLevelDetail::class, 'user_id')->with('subject', 'level');
    }

    public function student_lesson()
    {
        return $this->hasMany(StudentLesson::class, 'user_id','id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->with('subject');
    }

     public function subjects()
    {
        return $this->hasOne(Subject::class,'id','subject_id');
    }

    public function roles()
    {
    }
    public static function getDataUser($id)
    {
        return self::with(['student_lesson' => function($q) use ($id) {
            $q->where('user_id','=',$id);
        }])->whereHas('student_lesson' , function($q) use ($id) {
            $q->where('user_id','=',$id);
        })->get();
    }

    public static function getUser(){
        return \DB::table('users')
                        ->join('lessons', 'users.id', 'lessons.user_id')
                        ->join('subjects', function ($join) {
                            $join->on('lessons.subject_id', 'subjects.id');
                        })
                        ->select(
                            'users.thumbnail as userthamnail',
                            'lessons.title',
                            'lessons.description',
                            'lessons.date',
                            'lessons.thumbnail',
                            'subjects.name as subjectname',
                            'lessons.time',
                            'lessons.id as lessonsId',
                            'lessons.user_id as teacher_id'
                        )->get();
    }
}
