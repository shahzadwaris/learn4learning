<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;
use App\Models\Homework;
use App\User;

class Achivnments extends Model
{
      protected $table = 'achivnments';

      public $timestamps=false;

     public function subject()
      {
        return $this->hasMany(Subject::class, 'id','sub_id');
      }
     public function user()
      {
        return $this->hasMany(User::class, 'id','Student_id');
      }

      public function homework()
      {
      	return $this->hasOne(Homework::class,'id','homework_id');
      }
      public static function getAchivement($id)
      {
      	// dd($id);
      	return self::with(['user','subject','homework' => function($q) use ($id) {
            $q->where('user_id',$id);
        }])->whereHas('homework', function($q) use ($id) {
            $q->where('user_id',$id);
        })->get();
      }
}
