<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'messages';
    public $timestamps=false;

    public function from_user(){
        return $this->hasOne(User::class,'id','from_user_id');
    }

    public static function getMessages()
    {
    	return \DB::table('messages')->select('role')->where('messages.student_id', $student_id)->get();
    }

    public static function getMessagesData()
    {
    	return \DB::table('messages')->select('messages.*')
                        ->where('messages.student_id', $student_id)
                        ->where('messages.teacherId', $id)
                        ->where('messages.role', 1)
                        ->get();
    }

    public static function getMessagesTeacher()
    {
    	return \DB::table('messages')->select('messages.*')
                    ->where('messages.student_id', $student_id)
                    ->where('messages.teacherId', $id)
                    ->where('messages.role', 0)
                    ->get();
    }

}
