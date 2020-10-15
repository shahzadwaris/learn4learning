<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded = ['_token'];

    public static function getSubject()
    {
    	return \DB::table('subjects')
                               ->join('homework', 'subjects.id', '=', 'homework.Sub_id')

                               ->join('lessons', 'subjects.id', '=', 'lessons.subject_id')

                                ->join('student_lessons', function ($join) {
                                    $join->on('lessons.id', '=', 'student_lessons.lesson_id');
                                })

                                ->where('student_lessons.user_id', $student_iid)

                               ->join('users', 'users.id', '=', 'homework.teacher_id')

                                ->orderBy('homework.id', 'DESC')
                                ->select(
                                    'subjects.name as subname',
                                    'subjects.id as subject_iid',
                                    'homework.id as homeWorkId',
                                    'homework.title as homeworkTitle',
                                    'homework.discription as homeworkdes',
                                    'homework.date as homeDate',
                                    'homework.document as homeworkDocument',
                                    'lessons.id as lesson_id',
                                    'lessons.title as Tilte_Lessons',
                                    'lessons.Description as Lesson_des',
                                    'lessons.date as LesonDate',
                                    'users.fname'
                                )
                                ->limit(10)
                                ->get();
    }
}
