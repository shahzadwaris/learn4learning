<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Homework;
use App\Models\Lesson;
use App\Models\StudentLesson;

class Subject extends Model
{
    protected $guarded = ['_token'];


    public function getTitle($id){
        $lesson = Lesson::where('subject_id','=',$id)->first();
        return isset($lesson) ? $lesson->title : '';
    }

    public function getDate($id){
        $lesson = Lesson::where('subject_id','=',$id)->first();
        return isset($lesson) ? $lesson->date : '';
    }


    public static function getSubject($id)
    {
        return self::with(['homework' =>  function($q) use ($id) {
            $q->where('teacher_id','=',$id);
        },'lessons','student_lessons.lesson'])
            ->whereHas('homework', function ($q) use ($id) {
                $q->where('teacher_id','=',$id);
            })
            ->get();
//    	return \DB::table('subjects')
//                               ->join('homework', 'subjects.id', '=', 'homework.Sub_id')
//
//                               ->join('lessons', 'subjects.id', '=', 'lessons.subject_id')
//
//                                ->join('student_lessons', function ($join) {
//                                    $join->on('lessons.id', '=', 'student_lessons.lesson_id');
//                                })
//
//                                ->where('student_lessons.user_id', $id)
//
//                               ->join('users', 'users.id', '=', 'homework.teacher_id')
//
//                                ->orderBy('homework.id', 'DESC')
//                                ->select(
//                                    'subjects.name as subname',
//                                    'subjects.id as subject_iid',
//                                    'homework.id as homeWorkId',
//                                    'homework.title as homeworkTitle',
//                                    'homework.discription as homeworkdes',
//                                    'homework.date as homeDate',
//                                    'homework.document as homeworkDocument',
//                                    'lessons.id as lesson_id',
//                                    'lessons.title as Tilte_Lessons',
//                                    'lessons.Description as Lesson_des',
//                                    'lessons.date as LesonDate',
//                                    'users.fname'
//                                )
//                                ->limit(10)
//                                ->get();
    }

    public static function getSubjectData()
    {
    	return self::get();
    }

    public function homework(){
        return $this->hasMany(Homework::class , 'Sub_id','id');
    }

    public function lessons(){
        return $this->hasMany(Lesson::class , 'subject_id','id');
    }

    public function student_lessons(){
        return $this->hasMany(StudentLesson::class , 'subjects_id','id');
    }

    public static function getSearchStudent($id,$request)
    {
        $date_id = $request->date_id;
        return self::with(['homework','lessons' => function($q) use ($date_id) {
                $q->where('id',$date_id);
        },
        'student_lessons' => function($q) use ($id) {
            $q->where('user_id','=',$id);
        }])->where('id',$request->subject_id)->get();

//                               \DB::table('subjects')
//                                   ->join('homework', 'subjects.id', '=', 'homework.Sub_id')
//
//                                    ->join('lessons', 'subjects.id', '=', 'lessons.subject_id')
//
//                                    ->join('student_lessons', function ($join) {
//                                        $join->on('lessons.id', '=', 'student_lessons.lesson_id');
//                                    })
//
//                                    ->where('student_lessons.user_id', $student_iid)
//
//                                   ->join('users', 'users.id', '=', 'homework.teacher_id')
//
//                                    ->orderBy('homework.id', 'DESC')
//                                    ->select(
//                                        'subjects.name as subname',
//                                        'subjects.id as subject_iid',
//                                        'homework.id as homeWorkId',
//                                        'homework.title as homeworkTitle',
//                                        'homework.discription as homeworkdes',
//                                        'homework.date as homeDate',
//                                        'homework.document as homeworkDocument',
//                                        'lessons.id as lesson_id',
//                                        'lessons.title as Tilte_Lessons',
//                                        'lessons.Description as Lesson_des',
//                                        'lessons.date as LesonDate',
//                                        'users.fname'
//                                    )
//                                     ->where('subjects.id', $request->subject_id)
//                                     ->where('lessons.id', $request->date_id)
//                                    ->get();
    }

    public static function getDataSearchStudent()
    {
    	return \DB::table('subjects')->get();
    }

    public static function getHomeWork()
    {
        // return Subject::with('homework','lessons'.'student_lessons')
    	return \DB::table('subjects')
                               ->join('homework', 'subjects.id', '=', 'homework.Sub_id')
                                ->join('lessons', 'subjects.id', '=', 'lessons.subject_id')
                                ->join('student_lessons', function ($join) {
                                    $join->on('lessons.id', '=', 'student_lessons.lesson_id');
                                })
                               ->join('users', 'users.id', '=', 'homework.teacher_id')
                                ->orderBy('homework.id', 'DESC')
                                ->where('subjects.id', $id)
                                ->select(
                                    'subjects.name as subname',
                                    'subjects.id as subject_iid',
                                    'student_lessons.techer_id as student_lessonsTeacherId',
                                    'homework.id as homeWorkId',
                                    'homework.title as homeworkTitle',
                                    'homework.document as h_docuent',
                                    'homework.discription as homeworkdes',
                                    'homework.date as homeDate',
                                    'homework.document as homeworkDocument',
                                    'lessons.id as lesson_id',
                                    'lessons.title as Tilte_Lessons',
                                    'lessons.Description as Lesson_des',
                                    'lessons.*',
                                    'lessons.thumbnail',
                                    'lessons.date as LesonDate',
                                    'users.fname',
                                    'users.id as UserId',
                                    'homework.teacher_id as teacher_ids'
                                )
                                ->limit(10)
                                ->first();
    }
}
