<?php

namespace App;

use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;

class StudentLesson extends Model
{
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
}
