<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class levels extends Model
{
    protected $guarded = ['id'];


    public function getLevel()
    {
    	return \DB::table('levels')->get();
    }
}
