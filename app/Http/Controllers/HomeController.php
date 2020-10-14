<?php

namespace App\Http\Controllers;
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
