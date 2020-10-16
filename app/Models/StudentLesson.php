<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        $auth   =Auth::user()->id;
        return \DB::table('student_lessons')
                    ->where('student_lessons.user_id', $auth)
                    ->join('users', 'users.id', 'student_lessons.techer_id')
                    ->join('subjects', 'subjects.id', 'student_lessons.subjects_id')
                    ->select('users.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'users.id as U_id')
                    ->get();
    }

    public static function getLesson()
    {
        $auth   =Auth::user()->id;
        return \DB::table('student_lessons')
                    ->where('student_lessons.user_id', $auth)
                    ->join('users', 'users.id', 'student_lessons.techer_id')
                    ->join('subjects', 'subjects.id', 'student_lessons.subjects_id')
                    ->select('subjects.name as sub_name', 'subjects.id as sub_id')
                    ->get();
    }

    public static function getTeacher()
    {
        $auth   =Auth::user()->id;
        return \DB::table('student_lessons')
                    ->where('student_lessons.user_id', $auth)
                    ->join('users', 'users.id', 'student_lessons.techer_id')
                    ->join('subjects', 'subjects.id', 'student_lessons.subjects_id')
                    ->select('users.id as U_id', 'users.fname')
                    ->get();
    }

    public static function getStudent()
    {
        $auth   =Auth::user()->id;
        return \DB::table('student_lessons')->where('student_lessons.techer_id', $request->teacher_id)->where('student_lessons.user_id', $auth)
                    ->join('users', 'users.id', 'student_lessons.techer_id')
                    ->join('subjects', 'student_lessons.subjects_id', 'subjects.id')
                    ->select('subjects.name as subName', 'users.*')
                    ->get();
    }

    public static function getTitle($id)
    {
        return self::with('lesson')->where('user_id','=',$id)->get();
        // return \DB::table('student_lessons')
        //                         ->join('lessons', 'lessons.id', 'student_lessons.lesson_id')
        //                         ->where('student_lessons.user_id', $id)->select('lessons.title', 'lessons.id')
        //                         ->get();
    }

    public static function getData($id)
    {
        return self::with('lesson')->where('user_id','=',$id)->get();
        // return \DB::table('student_lessons')
        //                         ->join('lessons', 'lessons.id', 'student_lessons.lesson_id')
        //                         ->where('student_lessons.user_id', $id)->select('lessons.date', 'lessons.id')
        //                         ->get();

    }

    public static function getTitleStudent()
    {
        $student_iid=Auth::user()->id;
        return \DB::table('student_lessons')
                                    ->join('lessons', 'lessons.id', 'student_lessons.lesson_id')
                                    ->where('student_lessons.user_id', $student_iid)->select('lessons.title', 'lessons.id')
                                    ->get();
    }

    public static function getDataSearch()
    {
         $student_iid=Auth::user()->id;
        return \DB::table('student_lessons')
                                    ->join('lessons', 'lessons.id', 'student_lessons.lesson_id')
                                    ->where('student_lessons.user_id', $student_iid)->select('lessons.date', 'lessons.id')
                                    ->get();
    }

    public static function getStudentLesson($id)
    {
        return \DB::table('student_lessons')
            ->join('users', 'student_lessons.user_id', '=', 'users.id')
            ->join('lessons', 'student_lessons.lesson_id', '=', 'lessons.id')
            ->join('levels', function ($join) {
                $join->on('lessons.level_id', '=', 'levels.id');
            })
            ->join('subjects', function ($join) {
                $join->on('lessons.subject_id', '=', 'subjects.id');
            })
            ->where('student_lessons.user_id', $id)
            ->select('users.*')
            ->orderBy('users.id', 'DESC')
            ->get();
    }

    public static function getLessonData($id)
    {
        return \DB::table('student_lessons')
            ->join('users', 'student_lessons.user_id', '=', 'users.id')
            ->join('lessons', 'student_lessons.lesson_id', '=', 'lessons.id')
            ->join('levels', function ($join) {
                $join->on('lessons.level_id', '=', 'levels.id');
            })
            ->join('subjects', function ($join) {
                $join->on('lessons.subject_id', '=', 'subjects.id');
            })
            ->where('student_lessons.user_id', $id)
            ->select('subjects.name', 'subjects.id')
            ->orderBy('users.id', 'DESC')
            ->get();
    }
}
