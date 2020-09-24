<?php

namespace App;

use App\Notifications\NewUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class   User extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['id'];

    function subject_level_details(){
        return $this->hasMany(\App\Models\SubjectLevelDetail::class,'user_id')->with('Getsubject','Getlevel');
    }

    public function addUser($request){

        if($request['type']=='teacher'){
            $user = $this::create([
                'fname' => $request['fname'],
                'lname' => $request['lname'],
                'email' => $request['email'],
                'type' => 'teacher',
                'password' => Hash::make($request['password']),
            ]);
        }elseif($request['type']=='student'){
            $user = $this::create([
                'fname' => $request['fname'],
                'lname' => $request['lname'],
                'email' => $request['email'],
                'type' => 'student',
                'password' => Hash::make($request['password']),
            ]);


        }

        $data =["msg"=>" please verify your self" ,"userId"=>$user->id];
        $this->email=$request['email'];
        Mail::send(['html'=>'email'], $data, function($msg) {
            $msg->to($this->email);
//            $msg->attach(route('adminUsersApprove',$user['id']));
            $msg->subject('User Register Request');
        });
        return $user;


    }


}
