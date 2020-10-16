<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Lesson;
use App\Models\levels;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Support\Facades\Mail;

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
        $user_data = User::all();

        return view('users.index', compact('user_data'), ['users' => $model->paginate(15)]);
    }

    public function registerview()
    {
        return view('auth.register');
    }

    public function editUser($id)
    {
        return view('');
    }

    public function skip()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect()->route('login');
    }

    public function checkMail(Request $request)
    {
        $check = User::where('email', $request->email)->first();
        if ($check) {
            return response()->json(['found' => 'y']);
        }
        return response()->json(['found' => 'n']);
    }

    public function resendEmailAddress(){
        $user = Auth::user()->email;
        $senderEmail = 'alimughal5566@gmail.com';
        $senderName  ='Learn4Learning';
        $userEmail = $user;

        Mail::send('mail.successRegister', array('url','url'), function ($message) use ($senderEmail, $senderName , $userEmail) {
            $message->from($senderEmail, $senderName , $userEmail);
            $message->to($userEmail)
                ->subject('Verify Email Address');
        });
        return collect([
            'status' => true,
            'message' => 'email re-send successfully'
        ]);
    }

    protected function add_user(CreateUserRequest $request)
    {
        $u = User::create([
            'fname'    => $request->fname,
            'lname'    => $request->lname,
            'email'    => $request->email,
            'type'     => $request->type,
            'password' => Hash::make($request->password),
        ]);
        Auth::login($u);
//        event(new Registered($u));
        $senderEmail = 'alimughal5566@gmail.com';
        $senderName  ='Learn4Learning';
        $userEmail = $request->email;

        Mail::send('mail.successRegister', array('url','url'), function ($message) use ($senderEmail, $senderName , $userEmail) {
            $message->from($senderEmail, $senderName , $userEmail);
            $message->to($userEmail)
                ->subject('Verify Email Address');
        });
        $data       =['msg'=>' please verify your self', 'userId'=>$u->id];
        $level      = levels::all();
        $user_id    = $u->id;
        session()->flash('success-alert-message-teac', "Please verify your email We've sent you a link.");

        if ($u->type == 'teacher') {
            $subjects    = Subject::all();
            $no_of_chunk = $subjects->count() / 2;
            $subjects    = $subjects->chunk($no_of_chunk);
            return view('auth.teachers.teacher-subjects', compact('subjects', 'user_id'));
        } else {
            return view('auth.students.student-level', compact('level', 'user_id'));
        }
    }

    public function showForm()
    {
        $user    = Auth::user();
        $user_id = $user->id;
        if ($user->type == 'teacher') {
            $subjects    = Subject::all();
            $no_of_chunk = $subjects->count() / 2;
            $subjects    = $subjects->chunk($no_of_chunk);
            return view('auth.teachers.teacher-subjects', compact('subjects', 'user_id'));
        }
    }

    public function test()
    {
        return view('auth.test');
    }

    public function homePage()
    {
        $lesson = Lesson::all();

        foreach ($lesson as $key => $leson) {
            $lesson[$key]['Subject_name']      = Subject::where('id', $leson['subject_id'])->pluck('name')->first();
            $lesson[$key]['teacher_fname']     = User::where('id', $leson['user_id'])->pluck('fname')->first();
            $lesson[$key]['teacher_lname']     = User::where('id', $leson['user_id'])->pluck('lname')->first();
            $lesson[$key]['teacher_thumbnail'] = User::where('id', $leson['user_id'])->pluck('thumbnail')->first();
        }
        //        dd($lesson);
        $getuserimg = DB::table('users')
            ->join('lessons', 'users.id', 'lessons.user_id')
            ->join('subjects', function ($join) {
                $join->on('lessons.subject_id', 'subjects.id');
            })
            ->select(
                'users.thumbnail as userthamnail',
                'lessons.title',
                'lessons.description',
                'lessons.date',
                'lessons.thumbnail',
                'subjects.name as subjectname',
                'subjects.id as subjects_id',
                'lessons.time',
                'lessons.id as lessonsId',
                'lessons.user_id as teacher_id'
            )->get();

        $level    = DB::table('levels')->get();
        $subjects = DB::table('subjects')
                        ->join('lessons', 'lessons.subject_id', 'subjects.id')
                        ->select('subjects.*')
                        ->get();
        $Date = DB::table('lessons')->get();
        return view('welcome')->with(['getuserimg' => $getuserimg, 'lesson' => $lesson, 'level' => $level, 'subjects' => $subjects, 'Date' => $Date]);
    }

    public function searchSubForSubjectHome(Request $request)
    {
        $getuserimg = DB::table('users')
            ->join('lessons', 'users.id', 'lessons.user_id')
            ->join('subjects', function ($join) {
                $join->on('lessons.subject_id', 'subjects.id');
            })
            ->where('subjects.id', $request->subject_id)
            ->where('lessons.id', $request->date_id)

            ->select(
                'users.thumbnail as userthamnail',
                'lessons.title',
                'lessons.description',
                'lessons.date',
                'lessons.thumbnail',
                'subjects.name as subjectname',
                'subjects.id as subjects_id',
                'lessons.time',
                'lessons.id as lessonsId',
                'lessons.user_id as teacher_id'
            )->get();

        $level    = DB::table('levels')->get();
        $subjects = DB::table('subjects')
            ->join('lessons', 'lessons.subject_id', 'subjects.id')
            ->select('subjects.*')
            ->get();
        $Date = DB::table('lessons')->get();

        return view('welcome')->with(['getuserimg' => $getuserimg, 'level' => $level, 'subjects' => $subjects, 'Date' => $Date]);
        $countserchresut = count($getuserimg);

        if ($countserchresut >= 1) {
            return view('welcome')->with(['getuserimg' => $getuserimg, 'level' => $level, 'subjects' => $subjects, 'Date' => $Date]);
        } else {
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'You have Upated password Successfully');

            return back();
        }
    }

    public function verifiedSuccess(){
        $user = Auth::user();
        User::where('id','=',$user->id)->update([
           'email_verified_at' => Carbon::now()
        ]);
        if($user->type == 'teacher') {
            return redirect('/teacher-home')->with('success-alert-message-teac','Email verified successfully!');
        } else {
            return redirect('/students/Home')->with('success-alert-message','Email verified successfully!');
        }
    }
}
