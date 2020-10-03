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
}
