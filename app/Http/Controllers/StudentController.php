<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Lesson;
use App\Models\levels;
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
        $user    =Auth::user()->update(['educational_level' => $request->level]);
        $user_id = $request->user_id;
        $subjects=Subject::all();

        return view('auth.students.student-subject', compact('subjects', 'user_id'));
    }

    public function saveNewSubject(Request $request)
    {
        $user_id=$request['user_id'];
        $count  = Subject::where('name', $request->subject)->where('level_id', $request->level_id)->count();
        if ($count == 0) {
            Subject::create([
                'name'    => $request->subject,
                'level_id'=> $request->level_id,
            ]);
            return response()->json('true');
        } else {
            return response()->json('false');
        }
    }

    public function createStudentSubject($student, $subject)
    {
        SubjectLevelDetail::create([
            'user_id'    => $student,
            'subject_id' => 0,
            'field'      => $subject,
            'level_id'   => 0,
        ]);
    }

    public function getSubjects(Request $request)
    {
        $user_id     = $request->user_id;
        foreach ($request->subjects as $subject) {
            if ($subject == '00_other_id') {
                foreach ($request->field as $s) {
                    if ($s != '' || $s != null) {
                        $newSubject     = Subject::create(['name' => $s]);
                        $this->createStudentSubject($user_id, $subject['id']);
                    }
                }
                continue;
            }
            $this->createStudentSubject($user_id, $subject);
        }
        $allSubjects = Subject::all();

        return view('auth.students.student-profile', compact('user_id', 'allSubjects'));
    }

    public function updateProfile(Request $request)
    {
        // dd($request->all());
        $user = User::where('id', $request['user_id'])->first();
        if ($request->hasFile('thumbnail')) {
            $image     = $request->file('thumbnail');
            $imageName = time() . '.' . $image->extension();
            $imagePath = public_path() . '/storage/images';
            $image->move($imagePath, $imageName);
            $imageDbPath = $imageName;
        } else {
            $imageDbPath = $user->thumbnail;
        }

        $user->update([
            'Description'       => $request['Description'],
            'country'           => $request['country'],
            'fof_session'       => $request['fof_session'],
            'thumbnail'         => $imageDbPath,
            'educational_level' => $request->educational_level,
        ]);

        return redirect()->route('studentHome');
    }

    public function myAccount()
    {
        $levels = levels::all();
        return view('frontend.pages.students.account', compact('levels'));
    }

    public function getProfile(Request $request)
    {
        // dd($request->all());
        if ($request->hasFile('thumbnail')) {
            $image     = $request->file('thumbnail');
            $imageName = time() . '.' . $image->extension();
            $imagePath = public_path() . '/storage/images';
            $image->move($imagePath, $imageName);
            $imageDbPath = $imageName;
        }

        User::where('id', $request['user_id'])->update([
            'Description'       => $request['Description'],
            'country'           => $request['country'],
            'favorite_subject'  => implode(',', $request->favorite_subject),
            'fof_session'       => $request['fof_session'],
            'thumbnail'         => $imageDbPath,
            'helpSubjects'      => implode(',', $request->subjects),
        ]);

        return redirect()->route('studentHome');
    }

    public function studentLessson()
    {
        return view('frontend.pages.students.student-lesson-page');
    }

    public function student_edit_profile()
    {
        $user   =Auth::user();
        return view('frontend.pages.editstudetnsProfile')->with('getrecord', $user);
    }

    public function editstudenterprofile(Request $request)
    {
        $this->validate(request(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
        ]);
        Auth::user()->update(['users.fname'=>$request->fname, 'lname'=>$request->lname]);
        return redirect()->route('studentHome');
    }

    public function studentHome()
    {
        $user = Auth::user();

        $Book=      DB::table('lessons')
                        ->join('subjects', 'subjects.id', 'lessons.subject_id')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        ->select('lessons.*', 'subjects.name as sub_name', 'student_lessons.id as student_lessons_id')
                        ->where('student_lessons.user_id', $user->id)
                        ->get();
        $sepbooking=DB::table('lessons')
                        ->join('levels', 'levels.id', '=', 'lessons.level_id')
                        ->join('subjects', 'subjects.id', 'lessons.subject_id', 'lessons.id ')
                        ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
                        ->where('student_lessons.user_id', $user->id)
                        ->select('lessons.id as lessonsid', 'lessons.*', 'subjects.id as subjects_id', 'subjects.name as sub_name', 'levels.id as levelid', 'levels.name as level_name')
                        ->get();
        $getdata=   DB::table('users')
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
        $studentLessons           = StudentLesson::where('user_id', $user->id)->get()->pluck('subjects_id')->toArray();
        $studentHomeWork          = Homework::whereIn('Sub_id', $studentLessons)->get();
        // dd($studentHomeWork);
        $studentHomeWorkSubmitted = $studentHomeWork
                                    ->filter(fn ($value) => $value->user_id != null)
                                    ->pluck('user_id')
                                    ->toArray();

        $studentHomeWork          = $studentHomeWork->pluck('Sub_id')->toArray();
        $studentHomeWorkSubjects  = Lesson::with('teacher', 'subject')
                                            ->whereIn('subject_id', $studentHomeWork)
                                            ->get();
        $countlessons             = count($studentLessons);
        ;
        return view('frontend.pages.students.student-home')->with(
            [
                'getuserimg'               => $getuserimg,
                'Book'                     => $Book,
                'getdata'                  => $getdata,
                'MyAchivment'              => $MyAchivment,
                'sepbooking'               => $sepbooking,
                'studentHomeworks'         => $studentHomeWorkSubjects,
                'countlessons'             => $countlessons,
                'studentHomeWorkSubmitted' => $studentHomeWorkSubmitted,
            ]
        );
    }

    public function addToCalender(Lesson $lesson)
    {
        $student = Auth::user();
        $check   = StudentLesson::where(['lesson_id' => $lesson->id, 'user_id' => $student->id])->first();
        if (!$check) {
            StudentLesson::create([
                'user_id'      => $student->id,
                'techer_id'    => $lesson->user_id,
                'lesson_id'    => $lesson->id,
                'subjects_id'  => $lesson->subject_id,
            ]);
            session()->flash('alert-success', 'Lesson added to list successfully!');
            return redirect()->back();
        }
        session()->flash('alert-warning', 'Sorry! You have already added this Lesson to your calendar!');

        return redirect()->back();
    }

    public function student_schedule()
    {
        $student     = Auth::user();
        $subjects    = $student->helpSubjects;
        $subjects    = explode(',', $subjects);
        $myLessons   = StudentLesson::with('lesson.subject')->where('user_id', $student->id)
                                    ->whereHas('lesson', function ($q) {
                                        $q->where('date', '>=', date('Y-d-m'));
                                    })
                                    ->get();
        $allSubjects = Subject::all();
        $levels      = levels::all();
        $subjects    = Subject::whereIn('name', $subjects)->get()->pluck('id')->toArray();
        $lessons     = Lesson::with('teacher')->whereIn('subject_id', $subjects)->whereDate('date', '>=', now()->format('Y-m-d'))->whereTime('time', '>=', now()->format('H:i:s a'))->get();
        return view('frontend.pages.students.student-schedule', compact('student', 'subjects', 'lessons', 'myLessons', 'allSubjects', 'levels'));
    }

    public function My_subjects()
    {
        $auth   =Auth::user()->id;
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
        $auth    =Auth::user()->id;
        $studetns=DB::table('student_lessons')->where('student_lessons.techer_id', $request->teacher_id)->where('student_lessons.user_id', $auth)
                    ->join('users', 'users.id', 'student_lessons.techer_id')
                    ->join('subjects', 'student_lessons.subjects_id', 'subjects.id')
                    ->select('subjects.name as subName', 'users.*')
                    ->get();
        return view('frontend.pages.students.viewTeacherProfile')->with('db', $studetns);
    }

    public function studetnsHomeWorks()
    {
        $student_iid=Auth::user()->id;

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
        $student_iid          =Auth::user()->id;
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
        $subjects    =DB::table('subjects')->get();
        $countschedle=count($teacherhomeworkdetail);
        if ($countschedle < 1) {
            return redirect()->back();
        }
        return view('frontend.pages.students.student-homework')
                ->with([
                    'teacherhomeworkdetail'    => $teacherhomeworkdetail,
                    'Title'                    => $Title,
                    'Date'                     => $Date,
                    'subjects'                 => $subjects,
                ]);
    }

    public function viewHomework($id)
    {
        $student_iid=Auth::user()->id;

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
        // dd($teacherhomeworkdetaild);
        return view('frontend.pages.students.studentSubjectWiseDocs')->with(['teacherhomeworkdetaild'=>$teacherhomeworkdetaild, 'student_iid'=>$student_iid]);
    }

    public function uploadDocs(Request $request)
    {
        $student_id  =Auth::user()->id;
        $imageDbPath = '';
        if ($request->hasFile('img')) {
            $image     = $request->file('img');
            $imageName = time() . '.' . $image->extension();
            $imagePath = public_path() . '/storage/images';
            $image->move($imagePath, $imageName);
            $imageDbPath = $imageName;
        }
        $homeWork               = new Homework();
        $homeWork->discription  = $request->descriptions;
        $homeWork->Sub_id       = $request->Sub_id;
        $homeWork->teacher_id   = $request->tea_id;
        $homeWork->user_id      = $student_id;
        $homeWork->lesson_id    = $request->lesson_id;
        $homeWork->document     = $imageDbPath;
        $homeWork->save();
        $request->session()->flash('message.level', 'Success');
        $request->session()->flash('message.content', 'One record Add Successfully..');
        return back();
    }

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
        $student_id=Auth::user()->id;
        $role      =DB::table('messages')->select('role')->where('messages.student_id', $student_id)->get();
        $DBB       =DB::table('messages')->select('messages.*')
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
               'DBB'           => $DBB,
               'role'          => $role,
               'teacher'       => $teacher,
           ]);
    }

    public function OurMessages(Request $request)
    {
        $role              = 1;
        $saves             = new Messages();
        $saves->teacherId  = $request->teacher_id;
        $saves->student_id = $request->student_id;
        $saves->messages   = $request->msg;
        $saves->role       = $role;
        $saves->save();
        $student_id=Auth::user()->id;
        $role      =DB::table('messages')->select('role')->where('messages.student_id', $student_id)->get();
        $DBB       =DB::table('messages')
                    ->select('messages.*')
                    ->where('messages.student_id', $student_id)
                    ->where('messages.role', 1)
                    ->get();
        $teacher=DB::table('messages')
                        ->select('messages.*')
                        ->where('messages.student_id', $student_id)
                        ->where('messages.teacherId', $request->teacher_id)
                        ->where('messages.role', 0)
                        ->get();
        return view('frontend.pages.students.Messages')
           ->with(['
                teacher_id' => $request->teacher_id,
               'student_id' => $request->student_id,
               'DBB'        => $DBB,
               'role'       => $role,
               'teacher'    => $teacher,
           ]);
    }
}
