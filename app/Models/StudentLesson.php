<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentLesson extends Model
{
    protected $guarded = [];
    protected $table   = 'student_lessons';

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
    public static function getSubject()
    {
        return \DB::table('student_lessons')
                    ->where('student_lessons.user_id', $auth)
                    ->join('users', 'users.id', 'student_lessons.techer_id')
                    ->join('subjects', 'subjects.id', 'student_lessons.subjects_id')
                    ->select('users.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'users.id as U_id')
                    ->get();
    }

    public static function getLesson()
    {
        return \DB::table('student_lessons')
                    ->where('student_lessons.user_id', $auth)
                    ->join('users', 'users.id', 'student_lessons.techer_id')
                    ->join('subjects', 'subjects.id', 'student_lessons.subjects_id')
                    ->select('subjects.name as sub_name', 'subjects.id as sub_id')
                    ->get();
    }

    public static function getTeacher()
    {
        return \DB::table('student_lessons')
                    ->where('student_lessons.user_id', $auth)
                    ->join('users', 'users.id', 'student_lessons.techer_id')
                    ->join('subjects', 'subjects.id', 'student_lessons.subjects_id')
                    ->select('users.id as U_id', 'users.fname')
                    ->get();
    }

    public static function getStudent()
    {
        return \DB::table('student_lessons')->where('student_lessons.techer_id', $request->teacher_id)->where('student_lessons.user_id', $auth)
                    ->join('users', 'users.id', 'student_lessons.techer_id')
                    ->join('subjects', 'student_lessons.subjects_id', 'subjects.id')
                    ->select('subjects.name as subName', 'users.*')
                    ->get();
    }

    public static function getTitle()
    {
        return \DB::table('student_lessons')
                                ->join('lessons', 'lessons.id', 'student_lessons.lesson_id')
                                ->where('student_lessons.user_id', $student_iid)->select('lessons.title', 'lessons.id')
                                ->get();
    }

    public static function getData()
    {
        return \DB::table('student_lessons')
                                ->join('lessons', 'lessons.id', 'student_lessons.lesson_id')
                                ->where('student_lessons.user_id', $student_iid)->select('lessons.date', 'lessons.id')
                                ->get();

    }
}
