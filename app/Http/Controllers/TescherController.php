<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Lesson;
use App\Models\levels;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Homework;
use App\Models\Messages;
use App\Models\Experience;
use App\Models\Achivnments;
use Illuminate\Http\Request;
use App\Models\SubjectLevelDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TescherController extends Controller
{
    private $lesson;

    public function __construct(Lesson $lesson)
    {
        $this->lesson=$lesson;
    }

    public function teacherSubjects(Request $request)
    {
        // dd($request->all());
        $user_id     = $request->user_id;
        $allSubjects = Subject::all();

        foreach ($request->subject as $subject) {
            if (!$subject) {
                continue;
            }
            $subLevelArr='subject_' . $subject . '_level';
            // dump($subLevelArr);
            foreach ($request->$subLevelArr as $SL) {
                $createSubjects = SubjectLevelDetail::create([
                    'user_id'    => $user_id,
                    'subject_id' => $subject,
                    'field'      => 0,
                    'level_id'   => $SL,
                ]);
            }
        }
        // die();
        if ($request->others) {
            foreach ($request->others as $key => $subject) {
                $n              = $key + 1;
                $createSubjects = SubjectLevelDetail::create([
                    'user_id'    => $user_id,
                    'subject_id' => 0,
                    'field'      => $subject,
                    'level_id'   => $request->subject_level_other_ . $n,
                ]);
            }
        }

        return view('auth.teachers.teacher-profile', compact('user_id', 'allSubjects'));
    }

    public function getteacherProfile(Request $request)
    {
        $imageDbPath=null;
        if ($request->hasFile('thumbnail')) {
            $image     = $request->file('thumbnail');
            $imageName = time() . '.' . $image->extension();
            $imagePath = public_path() . '/storage/images';
            $image->move($imagePath, $imageName);
            $imageDbPath = $imageName;
        }

        $Data=User::where('id', $request['user_id'])->update([
            'description'      => $request['description'],
            'country'          => $request['country'],
            'fof_session'      => $request['fof_session'],
            'educational_level'=> $request['educational_level'],
            'profession'       => $request['profession'],
            'experience'       => $request['experience'],
            'thumbnail'        => $imageDbPath,
        ]);
        return redirect()->route('teacherHome');
    }

    public function teacherAddLesson()
    {
        $user = Auth::user();
        if (count($user->subject_level_details) <= 0) {
            session()->flash('alert-danger', 'Please complete your profile first!');
            return redirect()->back();
        }
        $levels  =DB::table('subject_level_details')->where('subject_level_details.user_id', $user->id)->select('level_id')->get();

        $ll=$levels[0]->level_id;

        $subject=Subject::all() ;
        $level  = levels::all();
        return view('frontend.pages.teachers.add-lesson')->with(['subject'=>$subject, 'levels'=>$ll]);
    }

    public function teacherHome()
    {
        $auth                 =Auth::User()->id;
        $teacherhomeworkdetail=DB::table('homework')
                               ->join('subjects', 'subjects.id', '=', 'homework.Sub_id')
                               ->join('lessons', function ($join) {
                                   $join->on('subjects.id', '=', 'lessons.subject_id');
                               })
                               ->join('users', 'users.id', '=', 'homework.teacher_id')
                                ->where('homework.teacher_id', $auth)
                                ->OrderBy('homework.id', 'DESC')
                                ->select(
                                    'subjects.id as subject_id',
                                    'subjects.name as subjectname',
                                    'lessons.id as lessons_id',
                                    'lessons.title as lessons_title',
                                    'lessons.description as lessons_des',
                                    'homework.*',
                                    'users.fname',
                                    'homework.date as Duedate',
                                    'lessons.thumbnail as lesson_thum',
                                    'lessons.document as lessonsDoc'
                                )
                                ->limit(10)
                                ->get();

        $usersimgg=           DB::table('users')
                                  ->where('users.id', $auth)
                                  ->select('users.*')
                                  ->get();

        $favsubject=          DB::table('subject_level_details')
                              ->where('subject_level_details.user_id', $auth)
                              ->join('users', 'users.id', 'subject_level_details.user_id')
                              ->join('levels', 'levels.id', 'subject_level_details.level_id')
                              ->join('subjects', 'subjects.id', 'subject_level_details.subject_id')
                              ->select('subject_level_details.field', 'subjects.name as subject_name', 'levels.name as level_name')
                              ->get();

        $Book=               DB::table('lessons')
                                ->join('levels', 'levels.id', '=', 'lessons.level_id')
                                ->join('subjects', 'subjects.id', 'lessons.subject_id', 'lessons.id ')
                                ->join('users', 'users.id', 'lessons.user_id')
                                ->where('users.id', $auth)
                                ->select('users.*', 'lessons.id as lessonsid', 'lessons.*', 'users.thumbnail as USerthumbnail', 'subjects.id as subjects_id', 'subjects.name as sub_name', 'levels.id as levelid', 'levels.name as level_name')
                                ->get();

        $sepbooking=          DB::table('lessons')
                                  ->join('subjects', 'subjects.id', 'lessons.subject_id', 'lessons.id ')

                                  ->where('lessons.user_id', $auth)
                                  ->select('lessons.id as lessonsid', 'lessons.*', 'subjects.id as subjects_id', 'subjects.name as sub_name')

                                  ->get();

        $experices=           DB::table('experiences')
                                  ->where('experiences.teacher_id', $auth)
                                  ->select('experiences.*')
                                  ->limit(5)
                                  ->get();

        $uid    =Auth::user()->id;
        $teacher=Teacher::where('user_id', Auth::id())->get();

        $teacher_id=$teacher->pluck('id');
        return view('frontend.pages.teachers.teacher-homepage')->with(
            [
                'Book'                   => $Book,
                'teacherhomeworkdetail'  => $teacherhomeworkdetail,
                'usersimgg'              => $usersimgg,
                'sepbooking'             => $sepbooking,
                'experices'              => $experices,
                'favsubject'             => $favsubject,
            ]
        );
    }

    public function teacher_edit_profile()
    {
        $getmyid  =Auth::User()->id;
        $getrecord=DB::table('users')->select('users.*')->where('users.id', $getmyid)->get();

        return view('frontend.pages.editTeacherProfile')->with('getrecord', $getrecord);
    }

    public function editteacherprofile(Request $request)
    {
        $imageDbPath=null;
        if ($request->hasFile('thumbnail')) {
            $image     = $request->file('thumbnail');
            $imageName = time() . '.' . $image->extension();
            $imagePath = public_path() . '/storage/images';
            $image->move($imagePath, $imageName);
            $imageDbPath = $imageName;
        }

        $update=User::where('id', auth::user()->id)->update([
            'description'       => $request->description,
            'educational_level' => $request->educational_level,
            'country'           => $request->country,
            'profession'        => $request->profession,
            'experience'        => $request->experience,
            'fof_session'       => $request->fof_session,
            'thumbnail'         => $imageDbPath,
        ]);
        if ($update) {
            return redirect()->route('teacherHome');
        }
    }

    public function teacherHomeWork()
    {
        $auth=Auth::User()->id;
        // $Lessens=DB::table('lessons')->where('lessons.user_id', $auth)
        // ->join('subjects', 'subjects.id', 'lessons.subject_id')
        // ->join('levels', 'levels.id', 'lessons.level_id')
        // ->select('lessons.*', 'subjects.id as sub_id' , 'subjects.name as sub_name' , 'subjects.id as idd','levels.name as levelname', 'levels.id as Level_id')
        // ->OrderBy('lessons.id', 'DESC')
        // ->get();

        // $level=DB::table('lessons')->where('lessons.user_id', $auth)
        // ->join('subjects', 'subjects.id', 'lessons.subject_id')
        // ->join('levels', 'levels.id', 'lessons.level_id')
        // ->select('lessons.*', 'subjects.id as sub_id' , 'subjects.name as sub_name' , 'subjects.id as idd','levels.name as levelname', 'levels.id as Level_id')
        // ->OrderBy('lessons.id', 'DESC')
        // ->get();
        // $date=DB::table('lessons')->where('lessons.user_id', $auth)
        // ->join('subjects', 'subjects.id', 'lessons.subject_id')
        // ->join('levels', 'levels.id', 'lessons.level_id')
        // ->select('lessons.*', 'subjects.id as sub_id' , 'subjects.name as sub_name' , 'subjects.id as idd','levels.name as levelname', 'levels.id as Level_id')
        // ->OrderBy('lessons.id', 'DESC')
        // ->get();
        $Lessonss=DB::table('lessons')->where('lessons.user_id', $auth)
->join('subjects', 'subjects.id', 'lessons.subject_id')
->join('levels', 'levels.id', 'lessons.level_id')
->select('lessons.*', 'subjects.id as sub_id', 'lessons.id as lesson_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
->OrderBy('lessons.id', 'DESC')
->get();

        $Title=DB::table('lessons')->where('lessons.user_id', $auth)->select('lessons.title', 'lessons.id')
->get();

        $Date=DB::table('lessons')->where('lessons.user_id', $auth)->select('lessons.date', 'lessons.id')
->get();

        $subjects=DB::table('subjects')
->join('lessons', 'lessons.subject_id', 'subjects.id')
->select('subjects.*')
->where('lessons.user_id', $auth)
->get();

        return view('frontend.pages.teachers.teacher-homeWork')->with(['Title'=>$Title, 'Date'=>$Date,  'subjects'=>$subjects, 'Lessonss'=>$Lessonss]);
    }

    public function SearchHomeworks(Request $request)
    {
        $auth=Auth::User()->id;

        $Lessonss=DB::table('lessons')->where('lessons.user_id', $auth)
  ->join('subjects', 'subjects.id', 'lessons.subject_id')
  ->join('levels', 'levels.id', 'lessons.level_id')
  ->select('lessons.*', 'subjects.id as sub_id', 'lessons.id as lesson_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
  ->OrderBy('lessons.id', 'DESC');

        if (!empty($request->subject_id)) {
            $Lessonss= $Lessonss->where('subject_id', $request->subject_id);
        }
        if (!empty($request->title_id)) {
            $Lessonss= $Lessonss->where('title', $request->title_id);
        }
        if (!empty($request->date_id)) {
            $Lessonss= $Lessonss->where('date', $request->date_id);
        }

        $Lessonss= $Lessonss->get();

        $Title=DB::table('lessons')->where('lessons.user_id', $auth)->select('lessons.title', 'lessons.id')
  ->get();

        $Date=DB::table('lessons')->where('lessons.user_id', $auth)->select('lessons.date', 'lessons.id')
  ->get();

        $subjects=DB::table('subjects')
->join('lessons', 'lessons.subject_id', 'subjects.id')
->select('subjects.*')
->where('lessons.user_id', $auth)
->get();

        $countserchresut=count($Lessonss);
        // dd($Lessonss);
        return view('frontend.pages.teachers.teacher-homeWork')->with(['Title'=>$Title, 'Date'=>$Date,  'subjects'=>$subjects, 'Lessonss'=>$Lessonss]);

        // else{
//   $Lessonss=DB::table('lessons')->where('lessons.user_id', $auth)
//   ->join('subjects', 'subjects.id', 'lessons.subject_id')
//   ->join('levels', 'levels.id', 'lessons.level_id')
//   ->select('lessons.*', 'subjects.id as sub_id', 'lessons.id as lesson_id', 'subjects.name as sub_name' , 'subjects.id as idd','levels.name as levelname', 'levels.id as Level_id')
//   ->OrderBy('lessons.id', 'DESC')
//   ->get();

//   $Title=DB::table('lessons')->where('lessons.user_id', $auth)->select('lessons.title', 'lessons.id')
//   ->get();

//   $Date=DB::table('lessons')->where('lessons.user_id', $auth)->select('lessons.date', 'lessons.id')
//   ->get();

//   $subjects=DB::table('subjects')
//   ->join('lessons', 'lessons.subject_id', 'subjects.id')
//   ->select('subjects.*')
//   ->where('lessons.user_id', $auth)
//   ->get();

//   return view('frontend.pages.teachers.teacher-homeWork')->with(['Title'=>$Title, 'Date'=>$Date,  'subjects'=>$subjects,'Lessonss'=>$Lessonss]);
// }
    }

    public function addsubjecthomework($id)
    {
        $sub_id                    =$id;
        $getfurthwerdetailsdteacher=DB::table('lessons')
->join('subjects', 'subjects.id', 'lessons.subject_id')
->select('lessons.*', 'subjects.name as sub_name', 'subjects.id as subjectid')
->where('subjects.id', $sub_id)
->get();

        return view('frontend.pages.teachers.AddHomeWorks')->with('getfurthwerdetailsdteacher', $getfurthwerdetailsdteacher);
    }

    public function teacheraddHomework(Request $request)
    {
        // $this->validate(request(),[
        //              'descriptions' => 'required|string|min:4',
        //              'file' =>   'required',
        //      ]);

        $Teacher_id=Auth::User()->id;

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
        $homeWork->date       =$request->date;
        $homeWork->teacher_id =$Teacher_id;
        $homeWork->document   =$imageDbPath;
        $homeWork->save();

        if ($homeWork) {
            $request->session()->flash('message.level', 'Success');
            $request->session()->flash('message.content', 'One record Add Successfully..');
            $auth=Auth::User()->id;

            $Lessens=DB::table('lessons')->where('lessons.user_id', $auth)
->join('subjects', 'subjects.id', 'lessons.subject_id')
->join('levels', 'levels.id', 'lessons.level_id')
->select('lessons.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
->OrderBy('lessons.id', 'DESC')
->get();

            $level=DB::table('lessons')->where('lessons.user_id', $auth)
->join('subjects', 'subjects.id', 'lessons.subject_id')
->join('levels', 'levels.id', 'lessons.level_id')
->select('lessons.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
->OrderBy('lessons.id', 'DESC')
->get();
            $date=DB::table('lessons')->where('lessons.user_id', $auth)
->join('subjects', 'subjects.id', 'lessons.subject_id')
->join('levels', 'levels.id', 'lessons.level_id')
->select('lessons.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
->OrderBy('lessons.id', 'DESC')
->get();
            $Lessonss=DB::table('lessons')->where('lessons.user_id', $auth)
->join('subjects', 'subjects.id', 'lessons.subject_id')
->join('levels', 'levels.id', 'lessons.level_id')
->select('lessons.*', 'subjects.id as sub_id', 'lessons.id as lesson_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
->OrderBy('lessons.id', 'DESC')
->get();
            $subjects=DB::table('subjects')
->join('lessons', 'lessons.subject_id', 'subjects.id')
->select('subjects.*')
->where('lessons.user_id', $auth)
->get();

            $Title=DB::table('lessons')->where('lessons.user_id', $auth)->select('lessons.title', 'lessons.id')
->get();

            return view('frontend.pages.teachers.teacher-homeWork')->with(['Lessens'=>$Lessens, 'Title' => $Title, 'subjects' => $subjects, 'level'=>$level, 'Date'=>$date, 'Lessonss'=>$Lessonss]);
        }
    }

    public function search_subjects_level(Request $request)
    {
        $auth=Auth::User()->id;
        if (isset($request->level_id) && isset($request->sub_id) && isset($request->date_id)) {
            $Lessens=DB::table('lessons')->join('subjects', 'subjects.id', 'lessons.subject_id')
                                    ->join('levels', 'levels.id', 'lessons.level_id')
                                    ->where('subjects.id', $request->sub_id)
                                    ->where('levels.id', $request->level_id)
                                    ->where('lessons.date', $request->date_id)
                                  ->select('lessons.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
                                     ->OrderBy('lessons.id', 'DESC')
                                     ->get();
        }

        $dbdata=count($Lessens);

        if ($dbdata >= 1) {
            $level=DB::table('lessons')->where('lessons.user_id', $auth)

            ->join('subjects', 'subjects.id', 'lessons.subject_id')
            ->join('levels', 'levels.id', 'lessons.level_id')
            ->select('lessons.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
            ->OrderBy('lessons.id', 'DESC')
            ->get();
            $date=DB::table('lessons')->where('lessons.user_id', $auth)
            ->join('subjects', 'subjects.id', 'lessons.subject_id')
            ->join('levels', 'levels.id', 'lessons.level_id')
            ->select('lessons.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
            ->OrderBy('lessons.id', 'DESC')
            ->get();
            $Lessonss=DB::table('lessons')->where('lessons.user_id', $auth)
            ->join('subjects', 'subjects.id', 'lessons.subject_id')
            ->join('levels', 'levels.id', 'lessons.level_id')
            ->select('lessons.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
            ->OrderBy('lessons.id', 'DESC')
            ->get();

            return view('frontend.pages.teachers.teacher-homeWork')->with(['Lessens'=>$Lessens, 'level'=>$level, 'date'=>$date, 'Lessonss'=>$Lessonss]);
        } else {
            return redirect()->back();
        }
    }

    public function MyAchevemnt()
    {
        $auth=Auth::User()->id;

        $Lessens=DB::table('lessons')->where('lessons.user_id', $auth)
->join('subjects', 'subjects.id', 'lessons.subject_id')
->join('levels', 'levels.id', 'lessons.level_id')
->select('lessons.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
->OrderBy('lessons.id', 'DESC')
->get();

        $level=DB::table('lessons')->where('lessons.user_id', $auth)
->join('subjects', 'subjects.id', 'lessons.subject_id')
->join('levels', 'levels.id', 'lessons.level_id')
->select('lessons.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
->OrderBy('lessons.id', 'DESC')
->get();
        $date=DB::table('lessons')->where('lessons.user_id', $auth)
->join('subjects', 'subjects.id', 'lessons.subject_id')
->join('levels', 'levels.id', 'lessons.level_id')
->select('lessons.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
->OrderBy('lessons.id', 'DESC')
->get();
        $Lessonss=DB::table('lessons')->where('lessons.user_id', $auth)
->join('subjects', 'subjects.id', 'lessons.subject_id')
->join('levels', 'levels.id', 'lessons.level_id')
->select('lessons.*', 'subjects.id as sub_id', 'lessons.id as lesson_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
->OrderBy('lessons.id', 'DESC')
->get();

        return view('frontend.pages.teachers.teacher-Achievemtn')->with(['Lessens'=>$Lessens, 'level'=>$level, 'date'=>$date, 'Lessonss'=>$Lessonss]);
    }

    public function createLesson(Request $request)
    {
        dd($request->all());
        $addLesson=$this->lesson->saveLesson($request);
        if ($addLesson) {
            return redirect()->back()->with('message', 'Lesson Added Successfully');
        }
    }

    public function teacherSchedule()
    {
        $auth=Auth::User()->id;

        $levels=DB::table('levels')
      ->get();

        $Date=DB::table('lessons')->where('lessons.user_id', $auth)->select('lessons.date', 'lessons.id')
      ->get();

        $subjects=DB::table('subjects')
    ->join('lessons', 'lessons.subject_id', 'subjects.id')
    ->select('subjects.*')
    ->where('lessons.user_id', $auth)
    ->get();

        $Book=DB::table('lessons')->join('levels', 'levels.id', '=', 'lessons.level_id')
->join('subjects', 'subjects.id', 'lessons.subject_id')
->join('users', 'users.id', 'lessons.user_id')
  // ->join('lessons', function($join){
  //                    $join->on('subjects', '=', 'lessons.subject_id' , 'subjects.id');
  //                    })

->where('users.id', $auth)
->select('users.*', 'lessons.id as lessonsid', 'lessons.*', 'lessons.date as Lesson_date', 'lessons.time as Lesson_time', 'users.thumbnail as USerthumbnail', 'subjects.id as subjects_id', 'subjects.name as sub_name', 'levels.id as levelid', 'levels.name as level_name')

->get();
        $uid    =Auth::user()->id;
        $teacher=Teacher::where('user_id', Auth::id())->get();

        $teacher_id=$teacher->pluck('id');

        // $exp=Experience::where('teacher_id',$teacher_id)->get();
        // $schedules= Lesson::where('user_id' ,Auth::id())->get();
//         foreach ($schedules as $key=>$schedule){
//             $schedules[$key]['teacher_fname']=User::where('id',$schedule['user_id'])->pluck("fname")->first();
//             $schedules[$key]['teacher_lname']=User::where('id',$schedule['user_id'])->pluck("lname")->first();
//             $schedules[$key]['teacher_thumbnail']=User::where('id',$schedule['user_id'])->pluck("thumbnail")->first();

        return view('frontend.pages.teachers.teacher-schedule')->with(['Book'=>$Book, 'levels'=>$levels, 'Date'=>$Date,  'subjects'=>$subjects]);
    }

    public function SearchSchedule(Request $request)
    {
        $auth=Auth::User()->id;

        $Book=DB::table('lessons')->join('levels', 'levels.id', '=', 'lessons.level_id')
      ->join('subjects', 'subjects.id', 'lessons.subject_id')
      ->join('users', 'users.id', 'lessons.user_id');

        $Book = $Book->where('users.id', $auth);

        if (!empty($request->subject_id)) {
            $Book = $Book->where('subjects.id', $request->subject_id);
        }
        if (!empty($request->level_id)) {
            $Book = $Book->where('level_id', $request->level_id);
        }
        if (!empty($request->date_id)) {
            $Book = $Book->where('date', $request->date_id);
        }

        $Book = $Book->select(
            'users.*',
            'lessons.id as lessonsid',
            'lessons.*',
            'lessons.date as Lesson_date',
            'lessons.time as Lesson_time',
            'users.thumbnail as USerthumbnail',
            'subjects.id as subjects_id',
            'subjects.name as sub_name',
            'levels.id as levelid',
            'levels.name as level_name'
        )

      ->get();
        $levels=DB::table('levels')
      ->get();

        $Date=DB::table('lessons')->where('lessons.user_id', $auth)->select('lessons.date', 'lessons.id')
      ->get();

        $subjects=DB::table('subjects')
    ->join('lessons', 'lessons.subject_id', 'subjects.id')
    ->select('subjects.*')
    ->where('lessons.user_id', $auth)
    ->get();

        $countschedle=count($Book);

        if ($countschedle >= 1) {
            // dd($levels);
            return view('frontend.pages.teachers.teacher-schedule')->with(['Book'=>$Book, 'levels'=>$levels, 'Date'=>$Date,  'subjects'=>$subjects]);
        } else {
            // return redirect()->back();
            return view('frontend.pages.teachers.teacher-schedule')->with(['Book'=>$Book, 'levels'=>$levels, 'Date'=>$Date,  'subjects'=>$subjects]);
        }
    }

    public function EditLesson($id)
    {
        $auth=Auth::User()->id;

        $Book=DB::table('lessons')->join('levels', 'levels.id', '=', 'lessons.level_id')
->join('subjects', 'subjects.id', 'lessons.subject_id')
->join('users', 'users.id', 'lessons.user_id')
  // ->join('lessons', function($join){
  //                    $join->on('subjects', '=', 'lessons.subject_id' , 'subjects.id');
  //                    })

->where('users.id', $auth)
->select('users.*', 'lessons.id as lessonsid', 'lessons.*', 'lessons.date as Lesson_date', 'lessons.time as Lesson_time', 'users.thumbnail as USerthumbnail', 'subjects.id as subjects_id', 'subjects.name as sub_name', 'levels.id as levelid', 'levels.name as level_name')

->where('lessons.id', $id)

->get();
        $uid    =Auth::user()->id;
        $teacher=Teacher::where('user_id', Auth::id())->get();

        $teacher_id=$teacher->pluck('id');

        $subject=Subject::all() ;

        return view('frontend.pages.teachers.editLessons')->with(['subject'=>$subject, 'Book'=>$Book]);
    }

    public function EditLessons(Request $request)
    {
        // dd($request['frequency']);
        $currentlesson = Lesson::where('id', $request->Lesson_id)->first();
        $documentDbPath='';
        $imageDbPath   ='';
        if ($request->hasFile('photo')) {
            $image     = $request->file('photo');
            $imageName = time() . '.' . $image->extension();
            $imagePath = public_path() . '/storage/images';
            $image->move($imagePath, $imageName);
            $imageDbPath = $imageName;
        } else {
            $imageDbPath=$currentlesson->thumbnail;
        }

        if ($request->hasFile('document')) {
            $document     = $request->file('document');
            $documentName = time() . '.' . $document->extension();
            $documentPath = public_path() . '/storage/documents';
            $document->move($documentPath, $documentName);
            $documentDbPath = $documentName;
        } else {
            $documentDbPath=$currentlesson->document;
        }

        $addlesson = Lesson::where('id', $request->Lesson_id)->update([
            'subject_id'  => $request['subject'],
            'user_id'     => Auth::id(),
            'title'       => $request['title'],
            'description' => $request['description'],
            'type'        => $request['inlineRadioOptions'],
            'date'        => $request['registration_date'],
            'time'        => $request['registration_time'],
            'frequency'   => $request['frequency'],
            'link'        => $request['video'],
            'level_id'    => $request['level_id'],
            'document'    => $documentDbPath,
            'thumbnail'   => $imageDbPath,
        ]);
        if ($addlesson) {
            return redirect('teacher-schedule');
        }
    }

    public function viewTeacherProfile()
    {
        return view('auth.teachers.teacher-profile');
    }

    public function teachersubject()
    {
        $user_id=Auth::user()->id;

        $subjects=Subject::all();

        return view('auth.teachers.teacher-subjects', compact('subjects', 'user_id'));
    }

    public function MySubStudents()
    {
        $teacher_id=Auth::User()->id;

        $getmystydentrecord=DB::table('student_lessons')
                                     ->join('users', 'student_lessons.user_id', '=', 'users.id')
                                     ->join('lessons', 'student_lessons.lesson_id', '=', 'lessons.id')
                                     ->join('levels', function ($join) {
                                         $join->on('lessons.level_id', '=', 'levels.id');
                                     })
                                     ->join('subjects', function ($join) {
                                         $join->on('lessons.subject_id', '=', 'subjects.id');
                                     })
                                     ->where('student_lessons.techer_id', $teacher_id)

                                     ->select(
                                         'users.*',
                                         'student_lessons.id as student_lessons_id',
                                         'lessons.id as lesson_id',
                                         'levels.name as level_name',
                                         'users.id as user_id',
                                         'subjects.name as Subject_name'
                                     )
                                     ->OrderBy('users.id', 'DESC')
                                     ->get();

        $Students=DB::table('student_lessons')
                                     ->join('users', 'student_lessons.user_id', '=', 'users.id')
                                     ->join('lessons', 'student_lessons.lesson_id', '=', 'lessons.id')
                                     ->join('levels', function ($join) {
                                         $join->on('lessons.level_id', '=', 'levels.id');
                                     })
                                     ->join('subjects', function ($join) {
                                         $join->on('lessons.subject_id', '=', 'subjects.id');
                                     })
                                     ->where('student_lessons.techer_id', $teacher_id)

                                     ->select('users.*')
                                     ->OrderBy('users.id', 'DESC')
                                     ->get();

        $Subjects=DB::table('student_lessons')
                                     ->join('users', 'student_lessons.user_id', '=', 'users.id')
                                     ->join('lessons', 'student_lessons.lesson_id', '=', 'lessons.id')
                                     ->join('levels', function ($join) {
                                         $join->on('lessons.level_id', '=', 'levels.id');
                                     })
                                     ->join('subjects', function ($join) {
                                         $join->on('lessons.subject_id', '=', 'subjects.id');
                                     })
                                     ->where('student_lessons.techer_id', $teacher_id)

                                     ->select('subjects.name', 'subjects.id')
                                     ->OrderBy('users.id', 'DESC')
                                     ->get();

        $Level=DB::table('levels')->get();

        return view('frontend.pages.teachers.mystudents')->with(['getmystydentrecord'=>$getmystydentrecord, 'Level'=>$Level, 'Students'=>$Students, 'Subjects'=>$Subjects]);
    }

    public function searchstudetns(Request $request)
    {
        $teacher_id=Auth::User()->id;

        $getmystydentrecord=DB::table('student_lessons')
                                   ->join('users', 'student_lessons.user_id', '=', 'users.id')
                                   ->join('lessons', 'student_lessons.lesson_id', '=', 'lessons.id')
                                   ->join('levels', function ($join) {
                                       $join->on('lessons.level_id', '=', 'levels.id');
                                   })
                                   ->join('subjects', function ($join) {
                                       $join->on('lessons.subject_id', '=', 'subjects.id');
                                   })
                                    ->where('users.id', $request->studetn_id)
                                    ->where('subjects.id', $request->subjects_id)
                                   ->where('student_lessons.techer_id', $teacher_id)

                                   ->select(
                                       'users.*',
                                       'student_lessons.id as student_lessons_id',
                                       'lessons.id as lesson_id',
                                       'levels.name as level_name',
                                       'users.id as user_id',
                                       'subjects.name as Subject_name'
                                   )
                                   ->OrderBy('users.id', 'DESC')
                                   ->get();

        $Students=DB::table('student_lessons')
                                   ->join('users', 'student_lessons.user_id', '=', 'users.id')
                                   ->join('lessons', 'student_lessons.lesson_id', '=', 'lessons.id')
                                   ->join('levels', function ($join) {
                                       $join->on('lessons.level_id', '=', 'levels.id');
                                   })
                                   ->join('subjects', function ($join) {
                                       $join->on('lessons.subject_id', '=', 'subjects.id');
                                   })
                                   ->where('student_lessons.techer_id', $teacher_id)

                                   ->select('users.*')
                                   ->OrderBy('users.id', 'DESC')
                                   ->get();

        $Subjects=DB::table('student_lessons')
                                   ->join('users', 'student_lessons.user_id', '=', 'users.id')
                                   ->join('lessons', 'student_lessons.lesson_id', '=', 'lessons.id')
                                   ->join('levels', function ($join) {
                                       $join->on('lessons.level_id', '=', 'levels.id');
                                   })
                                   ->join('subjects', function ($join) {
                                       $join->on('lessons.subject_id', '=', 'subjects.id');
                                   })
                                   ->where('student_lessons.techer_id', $teacher_id)

                                   ->select('subjects.name as Subject_name')
                                   ->OrderBy('users.id', 'DESC')
                                   ->get();

        $studetncount=count($getmystydentrecord);
        if ($studetncount >= 1) {
            return view('frontend.pages.teachers.mystudents')->with(['getmystydentrecord'=>$getmystydentrecord, 'Students'=>$Students, 'Subjects'=>$Subjects]);
        } else {
            return back();
        }
    }

    public function MYSubjects()
    {
        $teacher_id=Auth::User()->id;

        $getmySyb=DB::table('student_lessons')
                                     ->join('lessons', 'student_lessons.lesson_id', '=', 'lessons.id')
                                     ->join('levels', function ($join) {
                                         $join->on('lessons.level_id', '=', 'levels.id');
                                     })
                                     ->join('subjects', function ($join) {
                                         $join->on('lessons.subject_id', '=', 'subjects.id');
                                     })
                                     ->where('student_lessons.techer_id', $teacher_id)

                                     ->select(
                                         'student_lessons.id as student_lessons_id',
                                         'lessons.id as lesson_id',
                                         'levels.name as level_name',
                                         'users.id as user_id',
                                         'subjects.name as Subject_name'
                                     )
                                     ->OrderBy('users.id', 'DESC')
                                     ->get();

        return view('frontend.pages.teachers.MySubjects')->with('getmySyb', $getmySyb);
    }

    public function getdataofstudent()
    {
    }

    public function mystudents()
    {
        $teacher_id        = Auth::user()->id;
        $getmystydentrecord=DB::table('student_lessons')
                                     ->join('users', 'student_lessons.user_id', '=', 'users.id')
                                     ->join('lessons', 'student_lessons.lesson_id', '=', 'lessons.id')
                                     ->join('levels', function ($join) {
                                         $join->on('lessons.level_id', '=', 'levels.id');
                                     })
                                     ->join('subjects', function ($join) {
                                         $join->on('lessons.subject_id', '=', 'subjects.id');
                                     })
                                     ->where('student_lessons.techer_id', $teacher_id)

                                     ->select(
                                         'users.*',
                                         'student_lessons.id as student_lessons_id',
                                         'lessons.id as lesson_id',
                                         'levels.name as level_name',
                                         'users.id as user_id',
                                         'subjects.name as Subject_name'
                                     )
                                     ->OrderBy('users.id', 'DESC')
                                     ->get();

        return view('frontend.pages.teachers.mystudents')->with('getmystydentrecord', $getmystydentrecord);
    }

    public function View_student_profile($id)
    {
        $getrecordindividulStuRecord=DB::table('users')
                                     ->join('student_lessons', 'student_lessons.user_id', '=', 'users.id')
                                     ->join('lessons', function ($join) {
                                         $join->on('student_lessons.lesson_id', '=', 'lessons.id');
                                     })
                                     ->join('levels', function ($join) {
                                         $join->on('lessons.level_id', '=', 'levels.id');
                                     })
                                     ->join('subjects', function ($join) {
                                         $join->on('lessons.subject_id', '=', 'subjects.id');
                                     })

                                     ->where('users.id', $id)

                                     ->select(
                                         'student_lessons.id as student_lessons_id',
                                         'levels.name as level_name',
                                         'users.id as user_id',
                                         'subjects.name as Subject_name',
                                         'lessons.description',
                                         'lessons.title',
                                         'lessons.date',
                                         'users.*'
                                     )
                                     ->OrderBy('users.id', 'DESC')
                                     ->get();

        return view('frontend.pages.teachers.individualrecord')->with('getrecordindividulStuRecord', $getrecordindividulStuRecord);
    }

    public function messageStudent($id)
    {
        $student_id=$id;
        $teacher_id=Auth::user()->id;

        // Session::put('student_id', $id);
        $messges    =DB::table('messages')->where('messages.teacherId', $teacher_id)->select('messages')->get();
        $messgesstud=DB::table('messages')->where('messages.student_id', $student_id)->select('messages')->get();

        return view('frontend.pages.teachers.MessagesStudent')
                                    ->with(['teacherMSg'=> $messges,
                                        'studentMsg'    => $messgesstud,
                                        'teacherid'     => $teacher_id,
                                        'STU_ID'        => $student_id, ]);
    }

    public function teacherSideMesages(Request $request)
    {
        // $teacher_id=Auth::user()->id;
        $role             =0;
        $saves            =new Messages();
        $saves->teacherId =$request->teacherid;
        $saves->student_id=$request->STU_ID;
        $saves->messages  =$request->msg;
        $saves->role      =$role;

        $saves->save();

        if ($saves) {
            $messges=DB::table('messages')->where('messages.teacherId', $request->teacherid)
                    ->where('messages.role', 0)
                    ->select('messages')->get();
            $messgesstud=DB::table('messages')->where('messages.student_id', $request->STU_ID)->where('messages.role', 1)->select('messages')->get();

            return view('frontend.pages.teachers.MessagesStudent')
                                    ->with(['teacherMSg'=> $messges,
                                        'studentMsg'    => $messgesstud,
                                        'teacherid'     => $request->teacherid,
                                        'STU_ID'        => $request->STU_ID, ]);
        }
    }

    public function viewSeperateStu($id)
    {
        $db=DB::table('subject_level_details')->where('subject_level_details.user_id', $id)
        ->join('levels', 'levels.id', 'subject_level_details.level_id')
        ->join('subjects', 'subjects.id', 'subject_level_details.subject_id')
        ->join('users', 'users.id', 'subject_level_details.user_id')

        ->select('levels.name', 'subjects.name as subjectname', 'users.*')
        ->get();
        return view('frontend.pages.teachers.viewSep_stu')->with('db', $db);
    }

    public function messages($id)
    {
        return view('frontend.pages.teachers.overallcon');
    }

    // public function ViewStudentHomeWork($id){

    // }

    public function ViewStudentsHomeWork()
    {
        $myid=Auth::User()->id;

        $homework=DB::table('homework')
                              ->join('subjects', 'subjects.id', 'homeWork.Sub_id')
                              ->where('homework.teacher_id', $myid)
                              ->join('users', 'users.id', 'homework.user_id')
                              ->select('users.fname', 'users.id as User_id', 'homework.*', 'subjects.name as  subjectname', 'subjects.id as sub_id', 'homework.id as homeworkid')
                              ->get();
        return view('frontend.pages.teachers.viewHomeworkEachStud')->with('homework', $homework);
    }

    public function MyAchevemntss()
    {
        $auth=Auth::User()->id;

        $Lessens=DB::table('lessons')->where('lessons.user_id', $auth)
->join('subjects', 'subjects.id', 'lessons.subject_id')
->join('levels', 'levels.id', 'lessons.level_id')
->select('lessons.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
->OrderBy('lessons.id', 'DESC')
->get();

        $level=DB::table('lessons')->where('lessons.user_id', $auth)
->join('subjects', 'subjects.id', 'lessons.subject_id')
->join('levels', 'levels.id', 'lessons.level_id')
->select('lessons.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
->OrderBy('lessons.id', 'DESC')
->get();
        $date=DB::table('lessons')->where('lessons.user_id', $auth)
->join('subjects', 'subjects.id', 'lessons.subject_id')
->join('levels', 'levels.id', 'lessons.level_id')
->select('lessons.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
->OrderBy('lessons.id', 'DESC')
->get();
        $Lessonss=DB::table('lessons')->where('lessons.user_id', $auth)
->join('subjects', 'subjects.id', 'lessons.subject_id')
->join('levels', 'levels.id', 'lessons.level_id')
->select('lessons.*', 'subjects.id as sub_id', 'lessons.id as lesson_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
->OrderBy('lessons.id', 'DESC')
->get();

        return view('frontend.pages.teachers.ViewteacherAchevments')->with(['Lessens'=>$Lessens, 'level'=>$level, 'date'=>$date, 'Lessonss'=>$Lessonss]);
    }

    public function AssignStudentAchevemnt()
    {
        $myid=Auth::User()->id;

        $homework=DB::table('homework')
                              ->join('subjects', 'subjects.id', 'homeWork.Sub_id')
                              ->where('homework.teacher_id', $myid)
                              ->join('users', 'users.id', 'homework.user_id')
                              ->select('users.fname', 'users.id as User_id', 'homework.*', 'subjects.name as  subjectname', 'subjects.id as sub_id', 'homework.id as homeworkid')
                              ->get();

        return view('frontend.pages.teachers.ViewSepStudents')->with('homework', $homework);
    }

    public function assingachevment($sub_id, $User_id, $homeworkid)
    {
        $teacherId   =Auth::User()->id;
        $viewHomeWork=DB::table('homework')
                                  ->where('homework.id', $homeworkid)
                                  ->where('users.id', $User_id)
                                  ->where('subjects.id', $sub_id)
                                  ->join('subjects', 'subjects.id', '=', 'homeWork.Sub_id')
                                  ->join('users', 'users.id', 'homework.user_id')
                                  ->where('homework.teacher_id', $teacherId)
                                  ->select('homework.*', 'homework.id as homeworkid', 'users.thumbnail', 'users.id as usrersid', 'users.fname', 'subjects.name as subjectsName', 'subjects.id as subjectsId')
                                  ->first();

        return view('frontend.pages.teachers.ViewStudentrHomeWork')
                            ->with(['teacherhomeworkdetaild'=> $viewHomeWork, 'sub_id'=>$sub_id, 'User_id'=>$User_id, 'homeworkid'=>$homeworkid]);
    }

    public function Assign_Acivement(Request $request)
    {
        $TeacherId=Auth::User()->id;

        if ($request->hasFile('photo')) {
            $image     = $request->file('photo');
            $imageName = time() . '.' . $image->extension();
            $imagePath = public_path() . '/storage/images';
            $image->move($imagePath, $imageName);
            $imageDbPath = $imageName;
        }

        $MyAchevemntss             = new Achivnments();
        $MyAchevemntss->sub_id     =$request->sub_id;
        $MyAchevemntss->teacher_id =$TeacherId;
        $MyAchevemntss->Student_id =$request->usrersid;
        $MyAchevemntss->homework_id=$request->homeworkid;
        $MyAchevemntss->grade      =$request->grade;
        $MyAchevemntss->img        =$imageDbPath;

        $MyAchevemntss->save();
        if ($MyAchevemntss) {
            return redirect()->back();
        }
    }

    public function Add_experience(Request $request)
    {
        $authid=Auth::User()->id;

        $experinces            = new Experience();
        $experinces->teacher_id=$authid;
        $experinces->year      =$request->date;
        $experinces->title     =$request->exp;
        $experinces->save();
        if ($experinces) {
            return redirect()->route('teacherHome');
        }
    }

    public function MYaccount()
    {
        $teacherdata=User::with('subject_level_details')->where('id', auth::user()->id)->first();

        return view('frontend.pages.teachers.account', compact('teacherdata'));
    }

    public function teacher_dashboard_editprofile($id)
    {
        $editteacherprofile=DB::table('users')
  ->where('users.id', $id)
  ->get();
        return view('frontend.pages.teachers.teacherProfileEdit')->with('editteacherProfile', $editteacherprofile);
    }

    public function edit_teacher_dashboard(Request $request)
    {
        $id=Auth::User()->id;

        $editform=DB::table('users')->where('users.id', $id)->select('users.*')
  ->update(['users.fname'=> $request->fanmeedit,
      'lname'            => $request->lnameedit,
      'country'          => $request->counteyedit, ]);

        $teacherid    =Auth::User()->id;
        $editprofileid=DB::table('users')->where('users.id', $teacherid)
  ->join('subjects', 'subjects.id', 'users.favorite_subject')
  ->join('experiences', 'experiences.teacher_id', 'users.id')

  ->select('users.*', 'subjects.name as saname', 'users.thumbnail', 'experiences.year', 'experiences.title')->get();

        return view('frontend.pages.teachers.account')->with('editprofileid', $editprofileid);
    }

    public function _EditTeacherProfile()
    {
        $teacherdata=User::where('id', auth::user()->id)->first();

        return view('frontend.pages.teachers.edit-teacher-profile', compact('teacherdata'));
    }
}
