<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Homework;
use App\Models\Messages;
use Illuminate\Http\Request;
use App\Models\StudentLesson;
use App\Models\SubjectLevelDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function selectSubjects(Request $request)
    {
        $user_id = $request->user_id;
        $subjects=Subject::all();

        // $subjects=Subject::get();

        // foreach ($subjects as $key=>$sub){
        // $subjects[$key]['name']=Subject::where('id',$sub['subject_id'])->pluck('name')->first();
        // $subjects[$key]['level_id']=$request->level;;

        // };

        return view('auth.students.student-subject', compact('subjects', 'user_id'));
    }

    public function saveNewSubject(Request $request)
    {
        $user_id=$request['user_id'];
        $count  = Subject::where('name', $request->subject)->where('level_id', $request->level_id)->count();
        if ($count == 0) {
            $subject = Subject::create([
                'name'    => $request->subject,
                'level_id'=> $request->level_id,
            ]);
            return response()->json('true');
        } else {
            return response()->json('false');
        }
    }

    public function getSubjects(Request $request)
    {
        // dd($request->all());

//     $user_id= $request->user_id;
//     $allSubjects=Subject::all();
//     foreach($request->subjects as $subject) {
//         $createSubjects = SubjectLevelDetail::create([
//             'user_id' => $request->user_id,
//             'subject_id' => $subject,
//             'level_id' => $request->level_id,
//         ]);
//     }
        // //    dd($createSubjects);

        $user_id    = $request->user_id;
        $allSubjects=Subject::all();

        foreach ($request->subjects as $subject) {
            if ($subject == '00_other_id') {
                if ($request->field != '' || $request->field != null) {
                    $createSubjects = SubjectLevelDetail::create([
                        'user_id'    => $request->user_id,
                        'subject_id' => 0,
                        'field'      => $request->field[0],
                        'level_id'   => 0,
                    ]);
                }

                if (!empty($request->field_name)) {
                    foreach ($request->field_name as $fn) {
                        $createSubjects = SubjectLevelDetail::create([
                            'user_id'    => $request->user_id,
                            'subject_id' => 0,
                            'field'      => $fn,
                            'level_id'   => 0,
                        ]);
                    }
                }
            } else {
                $createSubjects = SubjectLevelDetail::create([
                    'user_id'    => $request->user_id,
                    'subject_id' => $subject,
                    'field'      => 0,
                    'level_id'   => 0,
                ]);
            }
        }

        return view('auth.students.student-profile', compact('user_id', 'allSubjects'));
    }

    public function viewSubjects()
    {
        $viewMysubject=DB::table('');
    }

    public function getProfile(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $image     = $request->file('thumbnail');
            $imageName = time() . '.' . $image->extension();
            $imagePath = public_path() . '/storage/images';
            $image->move($imagePath, $imageName);
            $imageDbPath = $imageName;
        }

        $Data=User::where('id', $request['user_id'])->update([
            'Description'     => $request['Description'],
            'country'         => $request['country'],
            'favorite_subject'=> $request['favourit_subjects'],
            'fof_session'     => $request['fof_session'],
            'thumbnail'       => $imageDbPath,
        ]);

        return redirect()->route('studentHome');
    }

    public function studentLessson()
    {
        return view('frontend.pages.students.student-lesson-page');
    }

    public function student_edit_profile()
    {
        $authid   =Auth::User()->id;
        $getrecord=DB::table('users')->select('users.*')->where('users.id', $authid)->get();

        return view('frontend.pages.editstudetnsProfile')->with('getrecord', $getrecord);
    }

    public function editstudenterprofile(Request $request)
    {
        $iid=Auth::User()->id;
        $this->validate(request(), [
            'fname' => 'required',

            'lname' => 'required',
            'email' => 'required',
            // 'img' => 'required',
        ]);

        // if ($request->hasFile('img')) {

        //     $image = $request->file('photo');
        //     $imageName = time().".".$image->extension();
        //     $imagePath = public_path().'/storage/images';
        //     $image->move($imagePath, $imageName);
        //     $imageDbPath = $imageName;
        // }

        $update=DB::table('users')->where('users.id', $iid)->select('users.*')->update(['users.fname'=>$request->fname, 'lname'=>$request->lname]);
        if ($update) {
            return redirect()->route('studentHome');
        }
    }

    public function studentHome()
    {
        $user = Auth::user();

        $Book=DB::table('lessons')
                        ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        // ->join('users', 'users.id', 'lessons.user_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        // ->where('users.id', $auth)
                        ->select('lessons.*', 'subjects.name as sub_name', 'student_lessons.id as student_lessons_id')
                        ->where('student_lessons.user_id', $user->id)

                        ->get();

        $teacherhomeworkdetail=DB::table('student_lessons')

                         ->join('lessons', 'lessons.id', 'student_lessons.lesson_id')

                         ->join('subjects', 'subjects.id', 'student_lessons.subjects_id')
                         ->join('homework', function ($join) {
                             $join->on('homework.sub_id', 'subjects.id');
                         })
                        ->where('student_lessons.user_id', $user->id)

                        ->select('homework.*', 'subjects.name as sub_name', 'lessons.title as lesson_title', 'lessons.thumbnail as lessons_thumnal', 'lessons.date as datee')
                        ->limit(10)
                        ->get();

        $sepbooking=DB::table('lessons')
                        ->join('levels', 'levels.id', '=', 'lessons.level_id')
                        ->join('subjects', 'subjects.id', 'lessons.subject_id', 'lessons.id ')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        ->where('student_lessons.user_id', $user->id)
                        ->select('lessons.id as lessonsid', 'lessons.*', 'subjects.id as subjects_id', 'subjects.name as sub_name', 'levels.id as levelid', 'levels.name as level_name')

                        ->get();

        $getdata=DB::table('users')
                    ->join('student_lessons', 'users.id', 'student_lessons.techer_id')
                    ->select('student_lessons.*', 'users.*')
                    ->where('student_lessons.user_id', $user->id)
                    ->get();
        $MyAchivment=DB::table('achivnments')
                        ->join('subjects', 'subjects.id', '=', 'achivnments.sub_id')
                        ->join('homework', 'homework.id', '=', 'achivnments.homework_id')
                        ->join('users', 'users.id', 'achivnments.Student_id')
                        ->where('homework.user_id', $user->id)
                        ->select('subjects.name as Subject_name', 'homework.title as H_title', 'homework.discription as homeworkDescriptions', 'users.fname as username', 'achivnments.*')
                        ->OrderBy('achivnments.id', 'DESC', 'achivnments.img')
                        ->get();

        $getuserimg=DB::table('users')
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
                            'lessons.time',
                            'lessons.id as lessonsId',
                            'lessons.user_id as teacher_id'
                        )->get();

        $counthomework=DB::table('homework')
                            ->join('subjects', 'subjects.id', '=', 'homework.Sub_id')
                            ->join('lessons', function ($join) {
                                $join->on('subjects.id', '=', 'lessons.subject_id');
                            })
                            ->where('homework.user_id', $user->id)
                            ->OrderBy('homework.id', 'DESC')
                            ->select(
                                'subjects.id as subject_id',
                                'subjects.name as subjectname',
                                'lessons.id as lessons_id',
                                'lessons.title as lessons_title',
                                'lessons.description as lessons_des',
                                'homework.*',
                                'homework.date as Duedate',
                                'lessons.thumbnail as lesson_thum',
                                'lessons.document as lessonsDoc'
                            )
                            ->limit(10)
                            ->get();

        $countlessons=count($counthomework);

        $teacherhomeworkdetail=DB::table('homework')
                               ->join('subjects', 'subjects.id', '=', 'homework.Sub_id')
                               ->join('lessons', function ($join) {
                                   $join->on('subjects.id', '=', 'lessons.subject_id');
                               })
                                ->where('homework.user_id', $user->id)
                                ->OrderBy('homework.id', 'DESC')
                                ->select(
                                    'subjects.id as subject_id',
                                    'subjects.name as subjectname',
                                    'lessons.id as lessons_id',
                                    'lessons.title as lessons_title',
                                    'lessons.description as lessons_des',
                                    'homework.*',
                                    'homework.date as Duedate',
                                    'lessons.thumbnail as lesson_thum',
                                    'lessons.document as lessonsDoc'
                                )
                                ->limit(10)
                                ->get();

        return view('frontend.pages.students.student-home')->with(
            [
                'getuserimg'            => $getuserimg,
                'Book'                  => $Book,
                'getdata'               => $getdata,
                'MyAchivment'           => $MyAchivment,
                'sepbooking'            => $sepbooking,
                'teacherhomeworkdetail' => $teacherhomeworkdetail,
                'countlessons'          => $countlessons,
            ]
        );
    }

    public function addToCalender($lessonsId, $user_id, $subjects_id)
    {
        $check=DB::table('student_lessons')->where('student_lessons.lesson_id', $lessonsId)->select('student_lessons.lesson_id')->get();

        $countlesson=count($check);
        if ($countlesson >= 1) {
            return back()->with('status', 'Sorry! You have already register this subject');
        } else {
            $auth=Auth::User()->id;

            $Lesson             = new StudentLesson();
            $Lesson->user_id    =$auth;
            $Lesson->techer_id  =$user_id;
            $Lesson->lesson_id  =$lessonsId;
            $Lesson->subjects_id=$subjects_id;

            $Lesson->save();

            return redirect()->back();
        }
    }

    public function student_schedule()
    {
        $auth=Auth::User()->id;

        $sepbooking=DB::table('lessons')->join('levels', 'levels.id', '=', 'lessons.level_id')
->join('subjects', 'subjects.id', 'lessons.subject_id', 'lessons.id ')
   ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
  // ->join('lessons', function($join){
  //                    $join->on('subjects', '=', 'lessons.subject_id' , 'subjects.id');
  //                    })

->where('student_lessons.user_id', $auth)
->select('lessons.id as lessonsid', 'lessons.*', 'subjects.id as subjects_id', 'subjects.name as sub_name', 'levels.id as levelid', 'levels.name as level_name')

->get();
        $Book=DB::table('lessons')
->join('subjects', 'subjects.id', 'lessons.subject_id')
// ->join('users', 'users.id', 'lessons.user_id')
->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
// ->where('users.id', $auth)
->select('lessons.*', 'subjects.name as sub_name', 'student_lessons.id as student_lessons_id')
->where('student_lessons.user_id', $auth)

->get();
        ;
        return view('frontend.pages.students.student-schedule')->with(['Book'=> $Book, 'sepbooking'=>$sepbooking]);
    }

    public function My_subjects()
    {
        $auth   =Auth::User()->id;
        $subject=DB::table('student_lessons')
    ->where('student_lessons.user_id', $auth)
    ->join('users', 'users.id', 'student_lessons.techer_id')
    ->join('subjects', 'subjects.id', 'student_lessons.subjects_id')
    ->select('users.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'users.id as U_id')
    ->get();

        $Mysub=DB::table('student_lessons')
    ->where('student_lessons.user_id', $auth)
    ->join('users', 'users.id', 'student_lessons.techer_id')
    ->join('subjects', 'subjects.id', 'student_lessons.subjects_id')
    ->select('subjects.name as sub_name', 'subjects.id as sub_id')
    ->get();

        $Teacher=DB::table('student_lessons')
    ->where('student_lessons.user_id', $auth)
    ->join('users', 'users.id', 'student_lessons.techer_id')
    ->join('subjects', 'subjects.id', 'student_lessons.subjects_id')
    ->select('users.id as U_id', 'users.fname')
    ->get();

        $level=DB::table('levels')->get();

        return view('frontend.pages.students.Mysubjects')->with(['subjects1'=>$subject, 'subjects'=>$Mysub, 'Teacher'=>$Teacher, 'level'=>$level]);
    }

    public function viewteacherdashboard(Request $request)
    {
        $auth    =Auth::User()->id;
        $studetns=DB::table('student_lessons')->where('student_lessons.techer_id', $request->teacher_id)->where('student_lessons.user_id', $auth)
    ->join('users', 'users.id', 'student_lessons.techer_id')
    ->join('subjects', 'student_lessons.subjects_id', 'subjects.id')
    ->select('subjects.name as subName', 'users.*')
    ->get();
        return view('frontend.pages.students.viewTeacherProfile')->with('db', $studetns);
    }

    public function studetnsHomeWorks()
    {
        $student_iid=Auth::User()->id;

        $teacherhomeworkdetail=DB::table('subjects')
                               ->join('homework', 'subjects.id', '=', 'homework.Sub_id')

                                ->join('lessons', 'subjects.id', '=', 'lessons.subject_id')

                                ->join('student_lessons', function ($join) {
                                    $join->on('lessons.id', '=', 'student_lessons.lesson_id');
                                })

                                ->where('student_lessons.user_id', $student_iid)

                               ->join('users', 'users.id', '=', 'homework.teacher_id')

                                ->OrderBy('homework.id', 'DESC')
                                ->select(
                                    'subjects.name as subname',
                                    'subjects.id as subject_iid',
                                    'homework.id as homeWorkId',
                                    'homework.title as homeworkTitle',
                                    'homework.discription as homeworkdes',
                                    'homework.date as homeDate',
                                    'homework.document as homeworkDocument',
                                    'lessons.id as lesson_id',
                                    'lessons.title as Tilte_Lessons',
                                    'lessons.Description as Lesson_des',
                                    'lessons.date as LesonDate',
                                    'users.fname'
                                )
                                ->limit(10)
                                ->get();

        $Title=DB::table('student_lessons')
                                ->join('lessons', 'lessons.id', 'student_lessons.lesson_id')
                                ->where('student_lessons.user_id', $student_iid)->select('lessons.title', 'lessons.id')
                                ->get();

        $Date=DB::table('student_lessons')
                                ->join('lessons', 'lessons.id', 'student_lessons.lesson_id')
                                ->where('student_lessons.user_id', $student_iid)->select('lessons.date', 'lessons.id')
                                ->get();

        $subjects=DB::table('subjects')
                              ->get();

        return view('frontend.pages.students.student-homework')
    ->with(['teacherhomeworkdetail'=> $teacherhomeworkdetail,
        'Title'                    => $Title, 'Date'=>$Date,  'subjects'=>$subjects, ]);
    }

    public function SearchStudentHomeworks(Request $request)
    {
        $student_iid=Auth::User()->id;

        $teacherhomeworkdetail=DB::table('subjects')
                                   ->join('homework', 'subjects.id', '=', 'homework.Sub_id')

                                    ->join('lessons', 'subjects.id', '=', 'lessons.subject_id')

                                    ->join('student_lessons', function ($join) {
                                        $join->on('lessons.id', '=', 'student_lessons.lesson_id');
                                    })

                                    ->where('student_lessons.user_id', $student_iid)

                                   ->join('users', 'users.id', '=', 'homework.teacher_id')

                                    ->OrderBy('homework.id', 'DESC')
                                    ->select(
                                        'subjects.name as subname',
                                        'subjects.id as subject_iid',
                                        'homework.id as homeWorkId',
                                        'homework.title as homeworkTitle',
                                        'homework.discription as homeworkdes',
                                        'homework.date as homeDate',
                                        'homework.document as homeworkDocument',
                                        'lessons.id as lesson_id',
                                        'lessons.title as Tilte_Lessons',
                                        'lessons.Description as Lesson_des',
                                        'lessons.date as LesonDate',
                                        'users.fname'
                                    )

                                     ->where('subjects.id', $request->subject_id)
                                     ->where('lessons.id', $request->date_id)

                                    ->get();

        $Title=DB::table('student_lessons')
                                    ->join('lessons', 'lessons.id', 'student_lessons.lesson_id')
                                    ->where('student_lessons.user_id', $student_iid)->select('lessons.title', 'lessons.id')
                                    ->get();

        $Date=DB::table('student_lessons')
                                    ->join('lessons', 'lessons.id', 'student_lessons.lesson_id')
                                    ->where('student_lessons.user_id', $student_iid)->select('lessons.date', 'lessons.id')
                                    ->get();

        $subjects=DB::table('subjects')
                                  ->get();

        $countschedle=count($teacherhomeworkdetail);

        if ($countschedle >= 1) {
            return view('frontend.pages.students.student-homework')
                                    ->with(['teacherhomeworkdetail'=> $teacherhomeworkdetail,
                                        'Title'                    => $Title, 'Date'=>$Date,  'subjects'=>$subjects, ]);
        } else {
            return redirect()->back();
        }
    }

    public function viewHomework($id)
    {
        $student_iid=Auth::User()->id;

        $teacherhomeworkdetaild=DB::table('subjects')
                               ->join('homework', 'subjects.id', '=', 'homework.Sub_id')

                                ->join('lessons', 'subjects.id', '=', 'lessons.subject_id')

                                ->join('student_lessons', function ($join) {
                                    $join->on('lessons.id', '=', 'student_lessons.lesson_id');
                                })

                               ->join('users', 'users.id', '=', 'homework.teacher_id')

                                ->OrderBy('homework.id', 'DESC')
                                ->where('subjects.id', $id)

                                ->select(
                                    'subjects.name as subname',
                                    'subjects.id as subject_iid',
                                    'student_lessons.techer_id as student_lessonsTeacherId',
                                    'homework.id as homeWorkId',
                                    'homework.title as homeworkTitle',
                                    'homework.document as h_docuent',
                                    'homework.discription as homeworkdes',
                                    'homework.date as homeDate',
                                    'homework.document as homeworkDocument',
                                    'lessons.id as lesson_id',
                                    'lessons.title as Tilte_Lessons',
                                    'lessons.Description as Lesson_des',
                                    'lessons.*',
                                    'lessons.thumbnail',
                                    'lessons.date as LesonDate',
                                    'users.fname',
                                    'users.id as UserId',
                                    'homework.teacher_id as teacher_ids'
                                )
                                ->limit(10)
                                ->first();

        return view('frontend.pages.students.studentSubjectWiseDocs')->with(['teacherhomeworkdetaild'=>$teacherhomeworkdetaild, 'student_iid'=>$student_iid]);
    }

    public function uploadDocs(Request $request)
    {
        $student_id=Auth::User()->id;

        if ($request->hasFile('img')) {
            $image     = $request->file('img');
            $imageName = time() . '.' . $image->extension();
            $imagePath = public_path() . '/storage/images';
            $image->move($imagePath, $imageName);
            $imageDbPath = $imageName;
        }

        $homeWork             = new Homework();
        $homeWork->discription=$request->descriptions;
        $homeWork->Sub_id     =$request->Sub_id;
        $homeWork->teacher_id =$request->tea_id;
        $homeWork->user_id    =$student_id;

        $homeWork->document=$imageDbPath;
        $homeWork->save();

        if ($homeWork) {
            $request->session()->flash('message.level', 'Success');
            $request->session()->flash('message.content', 'One record Add Successfully..');
            return back();
        }
    }

    // public function selectSubjects(Request $request){
//     $user_id=$request['user_id'];

//     $level=$request->level;
    // $subjects=SubjectLevelDetail::where('level_id',$level)->get();
    // foreach ($subjects as $key=>$sub){
    // $subjects[$key]['name']=Subject::where('id',$sub['subject_id'])->pluck('name')->first();
    // $subjects[$key]['level_id']=$request->level;;

    // };

    // return view('auth.students.student-subject',compact('subjects','user_id'));
    // }

    public function viewSeperatetea($id)
    {
        $db=DB::table('subject_level_details')->where('subject_level_details.user_id', $id)
        ->join('levels', 'levels.id', 'subject_level_details.level_id')
        ->join('subjects', 'subjects.id', 'subject_level_details.subject_id')
        ->join('users', 'users.id', 'subject_level_details.user_id')

        ->select('levels.name as Level_naem', 'subjects.name as subjectname', 'users.*')
        ->get();

        return view('frontend.pages.students.viewTeacherProfile')->with('db', $db);
    }

    public function viewMessages($id)
    {
        $student_id=Auth::User()->id;
        $role      =DB::table('messages')->select('role')->where('messages.student_id', $student_id)->get();

        $DBB=DB::table('messages')->select('messages.*')
        ->where('messages.student_id', $student_id)
        ->where('messages.teacherId', $id)
        ->where('messages.role', 1)

        ->get();

        $teacher=DB::table('messages')->select('messages.*')
             ->where('messages.student_id', $student_id)
        ->where('messages.teacherId', $id)
        ->where('messages.role', 0)

        ->get();

        return view('frontend.pages.students.Messages')
           ->with(['teacher_id'=> $id,
               'student_id'    => $student_id,
               'DBB'           => $DBB, 'role'=>$role, 'teacher'=>$teacher, ]);
    }

    public function OurMessages(Request $request)
    {
        $role             =1;
        $saves            =new Messages();
        $saves->teacherId =$request->teacher_id;
        $saves->student_id=$request->student_id;
        $saves->messages  =$request->msg;
        $saves->role      =$role;

        $saves->save();

        if ($saves) {
            $student_id=Auth::User()->id;
            $role      =DB::table('messages')->select('role')->where('messages.student_id', $student_id)->get();

            $DBB=DB::table('messages')->select('messages.*')
        ->where('messages.student_id', $student_id)->where('messages.role', 1)->get();
            $teacher=DB::table('messages')->select('messages.*')
             ->where('messages.student_id', $student_id)
        ->where('messages.teacherId', $request->teacher_id)
                ->where('messages.role', 0)

        ->get();

            return view('frontend.pages.students.Messages')
           ->with(['teacher_id'=> $request->teacher_id,
               'student_id'    => $request->student_id,
               'DBB'           => $DBB, 'role'=>$role, 'teacher'=>$teacher, ]);
        }
    }
}
