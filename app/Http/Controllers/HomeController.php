<?php

namespace App\Http\Controllers;
use App\Models\levels;
use App\Models\Subject;
use Request;
use sum;
use DB;
class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth','verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */

    public function verifyEmailAddress(){
        $subjects    = Subject::all();
        $no_of_chunk = $subjects->count() / 2;
        $subjects    = $subjects->chunk($no_of_chunk);
        $level      = levels::all();
        $user_id = \Auth::user()->id;
        if (\Auth::user()->type == 'teacher') {
            session()->flash('success-alert-message-teac', "Please verify your email We've sent you a link.");
            return view('auth.teachers.teacher-subjects', compact('subjects', 'user_id'));
        } else {
            session()->flash('success-alert-message-teac', "Please verify your email We've sent you a link.");
            return view('auth.students.student-level', compact('level', 'user_id'));
        }
    }

    public function index()
    {
        // dd(123);
        $totalteacher=DB::table('users')->select('type')->where('type', 'teacher')->get();
        $teacher=count($totalteacher);

       $totalteacher=DB::table('users')->select('type')->where('type', 'student')->get();
        $student=count($totalteacher);


           $lessons=DB::table('lessons')->select('id')->get();
        $lessons=count($lessons);


        return view('dashboard')->with(['teacher'=>$teacher, 'student'=>$student, 'lessons'=>$lessons]);
    }


}
