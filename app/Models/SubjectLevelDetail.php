<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectLevelDetail extends Model
{
    protected $fillable=['subject', 'level', 'user_id', 'subject_id', 'level_id', 'field'];

    public function Getsubject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function level()
    {
        return $this->belongsTo(levels::class, 'level_id');
    }

    public function Getlevel()
    {
        return $this->belongsTo(levels::class, 'level_id');
    }

    public static function getSubjectLevel()
    {
        return \DB::table('subject_level_details')->where('subject_level_details.user_id', $id)
        ->join('levels', 'levels.id', 'subject_level_details.level_id')
        ->join('subjects', 'subjects.id', 'subject_level_details.subject_id')
        ->join('users', 'users.id', 'subject_level_details.user_id')
        ->select('levels.name as Level_naem', 'subjects.name as subjectname', 'users.*')
        ->get();
    }
}
