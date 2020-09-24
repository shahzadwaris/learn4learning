<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\Lesson;
use App\Models\levels;
use App\Models\Student;
use App\Models\Subject;
use DB;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $user_data=User::all() ;
       return view('users.index',compact('user_data'), ['users' => $model->paginate(15)]);
    }


    public function registerview()                        
    {
        return view('auth.register');
    }

    public function editUser( $id)
    {

           return view('');
    }

    protected function add_user(CreateUserRequest $request){
     $this->validate(request(),[
           'email' => 'required|email|unique:users',
           'password'=> 'required|string|min:6'
     ]);


        $response=$this->user->addUser($request);
        $user_id=$response['id'];
        $level=levels::all();
        

            if($response['type']=='teacher'){

                 $subjects=Subject::all();
                 $no_of_chunk= $subjects->count()/2;
                 $subjects = $subjects->chunk($no_of_chunk);
                 
               return view('auth.teachers.teacher-subjects',compact('subjects','user_id'));
            }else{
                return view('auth.students.student-level',compact('level','user_id'));

            }

    }

    public function test()
    {

        return view('auth.test');
    }




    public function homePage(){
        $lesson=Lesson::all();
        
        foreach ($lesson as $key=>$leson){
            $lesson[$key]['Subject_name']=Subject::where('id',$leson['subject_id'])->pluck("name")->first();
            $lesson[$key]['teacher_fname']=User::where('id',$leson['user_id'])->pluck("fname")->first();
            $lesson[$key]['teacher_lname']=User::where('id',$leson['user_id'])->pluck("lname")->first();
            $lesson[$key]['teacher_thumbnail']=User::where('id',$leson['user_id'])->pluck("thumbnail")->first();
        }
//        dd($lesson);
          $getuserimg=DB::table('users')
              ->join('lessons', 'users.id', 'lessons.user_id')
              ->join('subjects', function($join){
                $join->on('lessons.subject_id', 'subjects.id');
              })
              ->select('users.thumbnail as userthamnail', 'lessons.title', 
                'lessons.description', 'lessons.date',  'lessons.thumbnail','subjects.name as subjectname', 'subjects.id as subjects_id', 'lessons.time', 'lessons.id as lessonsId' ,'lessons.user_id as teacher_id')->get();
              
                $level=DB::table('levels')->get();
                $subjects=DB::table('subjects')
                ->join('lessons', 'lessons.subject_id', 'subjects.id')
                ->select('subjects.*')
                ->get();
                $Date=DB::table('lessons')->get();


                
        return view('welcome')->with(['getuserimg'=>$getuserimg, 'lesson'=>$lesson, 'level'=>$level, 'subjects'=>$subjects, 'Date'=>$Date]);
    }

    public function searchSubForSubjectHome(Request $request){
     
        $getuserimg=DB::table('users')
        ->join('lessons', 'users.id', 'lessons.user_id')
        ->join('subjects', function($join){
          $join->on('lessons.subject_id', 'subjects.id');
        })
        ->where('subjects.id', $request->subject_id)
        ->where('lessons.id', $request->date_id)

        ->select('users.thumbnail as userthamnail', 'lessons.title', 
          'lessons.description', 'lessons.date',  'lessons.thumbnail','subjects.name as subjectname', 'subjects.id as subjects_id', 'lessons.time', 'lessons.id as lessonsId' ,'lessons.user_id as teacher_id')->get();
        
          $level=DB::table('levels')->get();
          $subjects=DB::table('subjects')
          ->join('lessons', 'lessons.subject_id', 'subjects.id')
          ->select('subjects.*')
          ->get();
          $Date=DB::table('lessons')->get();

          return view('welcome')->with(['getuserimg'=>$getuserimg, 'level'=>$level, 'subjects'=>$subjects, 'Date'=>$Date]);
    $countserchresut=count($getuserimg);

    
    if($countserchresut >=1){
        return view('welcome')->with(['getuserimg'=>$getuserimg, 'level'=>$level, 'subjects'=>$subjects, 'Date'=>$Date]);
    }
    
    else{
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'You have Upated password Successfully');
        return back();
    }
}



}

