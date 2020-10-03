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
}
