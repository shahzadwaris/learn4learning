<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class levels extends Model
{
    protected $guarded = ['id'];


    public static function getLevel()
    {
    	return \DB::table('levels')->get();
    }

    public static function getStudentLevel()
    {
    	return \DB::table('levels')->get();
    }
}
