<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $table   = 'homework';
    public $timestamps = false;

    protected $guarded = [];

    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'Sub_id');
    }

    public function teacher()
    {
        return $this->hasOne(User::class, 'id', 'teacher_id');
    }
}
