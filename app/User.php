<?php

namespace App;

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

    public function roles()
    {
    }
}
