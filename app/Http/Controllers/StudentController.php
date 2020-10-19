<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Lesson;
use App\Models\levels;
use App\Models\Subject;
use App\Models\Homework;
use App\Models\Achivnments;
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
        if(is_null($request->subjects)) {
            return back()->with('error_message_sec','please select subject');
        }
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
        // dd(123);

        // $Book=      DB::table('lessons')
        //                 ->join('subjects', 'subjects.id', 'lessons.subject_id')
        //                 ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
        //                 ->select('lessons.*', 'subjects.name as sub_name', 'student_lessons.id as student_lessons_id')
        //                 ->where('student_lessons.user_id', $user->id)
        //                 ->get();
        // $sepbooking=DB::table('lessons')
        //                 ->join('levels', 'levels.id', '=', 'lessons.level_id')
        //                 ->join('subjects', 'subjects.id', 'lessons.subject_id', 'lessons.id ')
        //                 ->join('student_lessons', 'lessons.id', 'student_lessons.lesson_id')
        //                 ->where('student_lessons.user_id', $user->id)
        //                 ->select('lessons.id as lessonsid', 'lessons.*', 'subjects.id as subjects_id', 'subjects.name as sub_name', 'levels.id as levelid', 'levels.name as level_name')
        //                 ->get();
        // $getdata = DB::table('users')
        //                 ->join('student_lessons', 'users.id', 'student_lessons.techer_id')
        //                 ->select('student_lessons.*', 'users.*')
        //                 ->where('student_lessons.user_id', $user->id)
        //                 ->get();
        // $MyAchivment=DB::table('achivnments')
        //                 ->join('subjects', 'subjects.id', '=', 'achivnments.sub_id')
        //                 ->join('homework', 'homework.id', '=', 'achivnments.homework_id')
        //                 ->join('users', 'users.id', 'achivnments.Student_id')
        //                 ->where('homework.user_id', $user->id)
        //                 ->select('subjects.name as Subject_name', 'homework.title as H_title', 'homework.discription as homeworkDescriptions', 'users.fname as username', 'achivnments.*')
        //                 ->orderBy('achivnments.id', 'DESC', 'achivnments.img')
        //                 ->get();
        $user = Auth::user();
        $id = $user->id;
        $Book = Lesson::getBooks($id);
        $sepbooking = Lesson::getSepBooking($id);
        $getdata = User::getDataUser($id);
        $MyAchivment = Achivnments::getAchivement($id);
        $getuserimg = User::getUser();
        $studentLessons           = StudentLesson::where('user_id', $user->id)->get()->pluck('subjects_id')->toArray();
        $studentHomeWork          = Homework::whereIn('Sub_id', $studentLessons)->get();
        $studentHomeWorkSubmitted = $studentHomeWork
            ->where('user_id', '!=', null)
            ->pluck('user_id')
            ->toArray();
        $studentHomeWork          = $studentHomeWork->pluck('Sub_id')->toArray();
        $studentHomeWorkSubjects  = Lesson::with('teacher', 'subject')
            ->whereIn('subject_id', $studentHomeWork)
            ->get();
        $countlessons             = count($studentLessons);
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
        $subject=StudentLesson::getSubject();
        $Mysub=StudentLesson::getLesson();
        $Teacher=StudentLesson::getTeacher();
        $level=Levels::getLevel();

        return view('frontend.pages.students.Mysubjects')->with(['subjects1'=>$subject, 'subjects'=>$Mysub, 'Teacher'=>$Teacher, 'level'=>$level]);
    }

    public function viewteacherdashboard(Request $request)
    {
        $studetns=StudentLesson::getStudent();
        return view('frontend.pages.students.viewTeacherProfile')->with('db', $studetns);
    }

    public function studetnsHomeWorks()
    {
        $student_iid=Auth::user()->id;
        $teacherhomeworkdetail=Subject::getSubject($student_iid);
        $Title=StudentLesson::getTitle($student_iid);
        $Date=StudentLesson::getData($student_iid);
        $subjects=Subject::getSubjectData($student_iid);
        return view('frontend.pages.students.student-homework')
            ->with(['teacherhomeworkdetail'=> $teacherhomeworkdetail,
                'Title'                    => $Title, 'Date'=>$Date,  'subjects'=>$subjects, ]);
    }

    public function SearchStudentHomeworks(Request $request)
    {
        $id          =Auth::user()->id;
        $teacherhomeworkdetail=Subject::getSearchStudent($id,$request);
        $Title=StudentLesson::getTitleStudent($id);
        $Date=StudentLesson::getDataSearch($id);
        $subjects    =Subject::getDataSearchStudent($id);
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

        $teacherhomeworkdetaild=Subject::getHomeWork();
        dd($teacherhomeworkdetaild);
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
        $db=SubjectLevelDetail::getSubjectLevel();
        return view('frontend.pages.students.viewTeacherProfile')->with('db', $db);
    }

    public function viewOurMessages()
    {
        $student_id        =Auth::user()->id;
        $Students          =StudentLesson::getStudentLesson($student_id);
        $Subjects=StudentLesson::getLessonData($student_id);
        $Level= levels::all();
        $data = Messages::where('to_user_id', '=', $student_id)->with('from_user')
            ->orderBy('id', 'DESC')->limit(5)->get();
        return view('frontend.pages.students.myMessages')->with(
            ['Level'=>$Level, 'Students'=>$Students, 'Subjects'=>$Subjects, 'data'=>$data]
        );
    }

    public function viewMessages($id)
    {
        $student_id= Auth::user()->id;
        $role      = Messages::getMessages();
        $DBB       = Messages::getMessagesData();
        $teacher  = Messages::getMessagesTeacher();
        return view('frontend.pages.students.Messages')
            ->with(['teacher_id'=> $id,
                'student_id'    => $student_id,
                'DBB'           => $DBB,
                'role'          => $role,
                'teacher'       => $teacher,
            ]);
    }

    public function getStudentMessages()
    {
        $data = Messages::where('from_user_id', '=', \Auth::user()->id)->orwhere('to_user_id', '=', \Auth::user()->id)->get();
        return collect([
            'status' => true,
            'data'   => $data,
        ]);
    }

    public function OurMessages(Request $request)
    {
        $saves                =new Messages();
        $role                 =1;
        $saves->teacherId     =$request->to_user_id;
        $saves->student_id    =$request->from_user_id;
        $saves->messages      =$request->message;
        $saves->to_user_id    =$request->to_user_id;
        $saves->from_user_id  =$request->from_user_id;
        $saves->role          =$role;
        $saves->save();
        $data = Messages::where('from_user_id', '=', \Auth::user()->id)->orwhere('to_user_id', '=', \Auth::user()->id)->get();
        return collect([
            'status' => true,
            'data'   => $data,
        ]);
    }
}
