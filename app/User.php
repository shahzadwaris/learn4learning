<?php

namespace App;

use App\Models\Lesson;
use App\Models\SubjectLevelDetail;
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

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->with('subject');
    }

    public function roles()
    {
    }
}
