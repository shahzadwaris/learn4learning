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

}
