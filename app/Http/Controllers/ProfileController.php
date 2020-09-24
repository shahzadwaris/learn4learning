<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use DB;
class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        
        $edit=DB::table('users')->select('users.*')->where('type', 'admin')->get();

        return view('profile.edit')->with('edit',$edit);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(Request $request)
    {
        

     if($request->password == $request->con_password){
                $updatePassword=DB::table('users')->where('users.type', 'admin')->update(['password' => Hash::make($request->get('password'))]);


         $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'You have Upated password Successfully');

        
        return back();
     }
     else{
          $request->session()->flash('message.level', 'danger');
        $request->session()->flash('message.content', 'Confirmation password is not match');
    return back();

     }


    }
    public function userManagement(){
        $user_data=DB::table('users')->select('users.*')->where('users.type', 'teacher')->get();
                  $student_data=DB::table('users')->select('users.*')->where('users.type', 'student')->get();

        return view('Admin.user.userManagement')->with(['user_data'=>$user_data, 'student_data'=>$student_data]);
    }





    public function admin_Block($id){
     $user_data=DB::table('users')->select('users.*')->where('users.id', $id)->update(['users.role'=>1]);


     if($user_data){
                $user_data=DB::table('users')->select('users.*')->where('users.type', 'teacher')->get();
                  $student_data=DB::table('users')->select('users.*')->where('users.type', 'student')->get();
   return view('Admin.user.userManagement')->with(['user_data'=>$user_data, 'student_data'=>$student_data]);

     }


    }
    public function admin_Active($id){
     $user_data=DB::table('users')->select('users.*')->where('users.id', $id)->update(['users.role'=>0]);


     if($user_data){
                $user_data=DB::table('users')->select('users.*')->where('users.type', 'teacher')->get();
                  $student_data=DB::table('users')->select('users.*')->where('users.type', 'student')->get();
   return view('Admin.user.userManagement')->with(['user_data'=>$user_data, 'student_data'=>$student_data]);

     }


    }










}
