<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectLevelDetail extends Model
{
    protected $fillable=['subject','level','user_id','subject_id','level_id' , 'field'];

    function Getsubject(){
        return $this->belongsTo(\App\Models\Subject::class,'subject_id');
    }
    function Getlevel(){
        return $this->belongsTo(\App\Models\levels::class,'level_id');
    }
}
