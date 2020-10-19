<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Lesson;
use App\Models\levels;
use App\Models\Subject;
use App\Models\Homework;
use App\Models\Messages;
use App\Models\Experience;
use App\Models\Achivnments;
use Illuminate\Http\Request;
use App\Models\SubjectLevelDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateLessonRequest;

class TeacherController extends Controller
{
    private $lesson;

    public function __construct(Lesson $lesson)
    {
        $this->lesson=$lesson;
    }

    public function teacherSubjects(Request $request)
    {
        $user_id     = $request->user_id;
        $allSubjects = Subject::all();
        $subjects    = $allSubjects->pluck('name')->toArray();
        if (isset($request->others) && count($request->others) > 1) {
            foreach ($request->others as $key => $subject) {
                if (!in_array($subject, $subjects)) {
                    $s = Subject::create([
                        'name' => $subject,
                    ]);
                    $createSubjects = SubjectLevelDetail::create([
                        'user_id'    => $user_id,
                        'subject_id' => $s->id,
                        'field'      => 0,
                        'level_id'   => $request->subject_level_other_ . $key,
                    ]);
                }
            }
        }
        if(is_null($request->subject)) {
            return back()->with('error_message','please first select subject');
        }
        foreach ($request->subject as $subject) {
            if (!$subject) {
                continue;
            }
            $subLevelArr='subject_' . $subject . '_level';
            foreach ($request->$subLevelArr as $SL) {
                $createSubjects = SubjectLevelDetail::create([
                    'user_id'    => $user_id,
                    'subject_id' => $subject,
                    'field'      => 0,
                    'level_id'   => $SL,
                ]);
            }
        }
        return view('auth.teachers.teacher-profile', compact('user_id', 'allSubjects'));
    }

    public function getteacherProfile(Request $request)
    {
        $imageDbPath=null;
        if ($request->hasFile('thumbnail')) {
            $imageDbPath = $this->saveDocs($request->file('thumbnail'), 2);
        }
        User::where('id', $request['user_id'])->update([
            'description'      => $request->description,
            'country'          => $request->country,
            'fof_session'      => $request->fof_session,
            'educational_level'=> $request->educational_level,
            'profession'       => $request->profession,
            'experience'       => $request->experience,
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
        $subjects = $user->getSubjects;
        return view('frontend.pages.teachers.add-lesson')->with('subjects', $subjects);
    }

    public function teacherHome()
    {
        $auth                 =Auth::user()->id;
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

        $usersimgg=DB::table('users')
            ->where('users.id', $auth)
            ->select('users.*')
            ->get();

        $favsubject=DB::table('subject_level_details')
            ->where('subject_level_details.user_id', $auth)
            ->join('users', 'users.id', 'subject_level_details.user_id')
            ->join('levels', 'levels.id', 'subject_level_details.level_id')
            ->join('subjects', 'subjects.id', 'subject_level_details.subject_id')
            ->select('subject_level_details.field', 'subjects.name as subject_name', 'levels.name as level_name')
            ->get();

        $Book=DB::table('lessons')
            ->join('levels', 'levels.id', '=', 'lessons.level_id')
            ->join('subjects', 'subjects.id', 'lessons.subject_id', 'lessons.id ')
            ->join('users', 'users.id', 'lessons.user_id')
            ->where('users.id', $auth)
            ->select('users.*', 'lessons.id as lessonsid', 'lessons.*', 'users.thumbnail as USerthumbnail', 'subjects.id as subjects_id', 'subjects.name as sub_name', 'levels.id as levelid', 'levels.name as level_name')
            ->get();

        $sepbooking=DB::table('lessons')
            ->join('subjects', 'subjects.id', 'lessons.subject_id', 'lessons.id ')

            ->where('lessons.user_id', $auth)
            ->select('lessons.id as lessonsid', 'lessons.*', 'subjects.id as subjects_id', 'subjects.name as sub_name')
            ->orderBy('lessons.date')
            ->orderBy('lessons.time')

            ->get();

        $experices=DB::table('experiences')
            ->where('experiences.teacher_id', $auth)
            ->select('experiences.*')
            ->limit(5)
            ->get();
        return view('frontend.pages.teachers.teacher-homepage')->with([
                'Book'                   => $Book,
                'teacherhomeworkdetail'  => $teacherhomeworkdetail,
                'usersimgg'              => $usersimgg,
                'schedules'              => $sepbooking,
                'experices'              => $experices,
                'favsubject'             => $favsubject,
        ]);
    }

    public function teacher_edit_profile()
    {
        $getmyid  =Auth::user()->id;
        $getrecord=DB::table('users')->select('users.*')->where('users.id', $getmyid)->get();
        return view('frontend.pages.editTeacherProfile')->with('getrecord', $getrecord);
    }

    public function editteacherprofile(Request $request)
    {
        $imageDbPath=null;
        if ($request->hasFile('thumbnail')) {
            $imageDbPath = $this->saveDocs($request->file('thumbnail'), 2);
        }
        Auth::user()->update([
            'description'       => isset($request->description) ? $request->description : Auth::user()->description ,
            'educational_level' => isset($request->educational_level) ? $request->educational_level : Auth::user()->educational_level,
            'country'           => isset($request->country) ? $request->country : Auth::user()->country ,
            'profession'        => isset($request->profession) ? $request->profession : Auth::user()->profession,
            'experience'        => isset($request->experience) ? $request->experience : Auth::user()->experience,
            'fof_session'       => isset($request->fof_session) ? $request->fof_session : Auth::user()->fof_session,
            'thumbnail'         => isset($imageDbPath) ? $imageDbPath : Auth::user()->thumbnail,
        ]);
        return redirect()->route('teacherHome');
    }

    public function teacherHomeWork()
    {
        // dd(123);
        $auth    =Auth::user()->id;
        $Lessonss=DB::table('lessons')->where('lessons.user_id', $auth)
            ->join('subjects', 'subjects.id', 'lessons.subject_id')
            ->join('levels', 'levels.id', 'lessons.level_id')
            ->select('lessons.*', 'subjects.id as sub_id', 'lessons.id as lesson_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
            ->OrderBy('lessons.id', 'DESC')
            ->get();
        $Title   =DB::table('lessons')->where('lessons.user_id', $auth)->select('lessons.title', 'lessons.id')->get();
        $Date    =DB::table('lessons')->where('lessons.user_id', $auth)->select('lessons.date', 'lessons.id')->get();
        $subjects=DB::table('subjects')
            ->join('lessons', 'lessons.subject_id', 'subjects.id')
            ->select('subjects.*')
            ->where('lessons.user_id', $auth)
            ->get();
        return view('frontend.pages.teachers.teacher-homeWork')->with(['Title'=>$Title, 'Date'=>$Date,  'subjects'=>$subjects, 'Lessonss'=>$Lessonss]);
    }

    public function SearchHomeworks(Request $request)
    {
        $auth    =Auth::user()->id;
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
        $Title   =DB::table('lessons')->where('lessons.user_id', $auth)->select('lessons.title', 'lessons.id')->get();
        $Date    =DB::table('lessons')->where('lessons.user_id', $auth)->select('lessons.date', 'lessons.id')->get();
        $subjects=DB::table('subjects')
            ->join('lessons', 'lessons.subject_id', 'subjects.id')
            ->select('subjects.*')
            ->where('lessons.user_id', $auth)
            ->get();
        return view('frontend.pages.teachers.teacher-homeWork')->with(['Title'=>$Title, 'Date'=>$Date,  'subjects'=>$subjects, 'Lessonss'=>$Lessonss]);
    }

    public function addsubjecthomework($lesson, $subject)
    {
        $sub_id                    =$subject;
        $getfurthwerdetailsdteacher=DB::table('lessons')
                                        ->join('subjects', 'subjects.id', 'lessons.subject_id')
                                        ->select('lessons.*', 'subjects.name as sub_name', 'subjects.id as subjectid')
                                        ->where('subjects.id', $sub_id)
                                        ->get();
        return view('frontend.pages.teachers.AddHomeWorks')->with(['getfurthwerdetailsdteacher' => $getfurthwerdetailsdteacher, 'lesson' => $lesson]);
    }

    public function teacheraddHomework(Request $request)
    {
        $auth        =Auth::user()->id;
        $imageDbPath = '';
        if ($request->hasFile('img')) {
            $imageDbPath = $this->saveDocs($request->file('img'), 1);
        }
        Homework::create(
            [
                'discription'=> $request->descriptions,
                'Sub_id'     => $request->Sub_id,
                'date'       => $request->date,
                'teacher_id' => $auth,
                'document'   => $imageDbPath,
                'lesson_id'  => $request->lesson,
            ]
        );
        $request->session()->flash('message.level', 'Success');
        $request->session()->flash('message.content', 'One record Add Successfully..');
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
        $Title=DB::table('lessons')->where('lessons.user_id', $auth)->select('lessons.title', 'lessons.id')->get();
        return view('frontend.pages.teachers.teacher-homeWork')->with(['Lessens'=>$Lessens, 'Title' => $Title, 'subjects' => $subjects, 'level'=>$level, 'Date'=>$date, 'Lessonss'=>$Lessonss]);
    }

    public function search_subjects_level(Request $request)
    {
        $auth=Auth::user()->id;
        if (isset($request->level_id) && isset($request->sub_id) && isset($request->date_id)) {
            $Lessens=DB::table('lessons')->join('subjects', 'subjects.id', 'lessons.subject_id')
                ->join('levels', 'levels.id', 'lessons.level_id')
                ->where('subjects.id', $request->sub_id)
                ->where('levels.id', $request->level_id)
                ->where('lessons.date', $request->date_id)
                ->select('lessons.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'subjects.  id as idd', 'levels.name as levelname', 'levels.id as Level_id')
                ->OrderBy('lessons.id', 'DESC')
                ->get();
        }

        $dbdata=count($Lessens);

        if ($dbdata < 1) {
            return redirect()->back();
        }
        $level=DB::table('lessons')
            ->where('lessons.user_id', $auth)
            ->join('subjects', 'subjects.id', 'lessons.subject_id')
            ->join('levels', 'levels.id', 'lessons.level_id')
            ->select('lessons.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
            ->OrderBy('lessons.id', 'DESC')
            ->get();
        $date= DB::table('lessons')
            ->where('lessons.user_id', $auth)
            ->join('subjects', 'subjects.id', 'lessons.subject_id')
            ->join('levels', 'levels.id', 'lessons.level_id')
            ->select('lessons.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
            ->OrderBy('lessons.id', 'DESC')
            ->get();
        $Lessonss=DB::table('lessons')
            ->where('lessons.user_id', $auth)
            ->join('subjects', 'subjects.id', 'lessons.subject_id')
            ->join('levels', 'levels.id', 'lessons.level_id')
            ->select('lessons.*', 'subjects.id as sub_id', 'subjects.name as sub_name', 'subjects.id as idd', 'levels.name as levelname', 'levels.id as Level_id')
            ->OrderBy('lessons.id', 'DESC')
            ->get();

        return view('frontend.pages.teachers.teacher-homeWork')->with(['Lessens'=>$Lessens, 'level'=>$level, 'date'=>$date, 'Lessonss'=>$Lessonss]);
    }

    public function MyAchevemnt()
    {
        $auth   =Auth::user()->id;
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

        return view('frontend.pages.teachers.teacher-Achievemtn')->with([
            'Lessens'=> $Lessens, 'level'=>$level, 'date'=>$date, 'Lessonss'=>$Lessonss,
        ]);
    }

    public function createLesson(CreateLessonRequest $request)
    {
        $addLesson=$this->lesson->saveLesson($request);
        if ($addLesson) {
            return redirect()->back()->with('message', 'Lesson Added Successfully');
        }
    }

    public function teacherSchedule()
    {
        // dd(123);
        $levels  = levels::all();
        return view('frontend.pages.teachers.teacher-schedule', compact('levels'));
    }

    public function SearchSchedule(Request $request)
    {
        // dd($request->all());
        $teacher = $request->user();
        if (!$this->checkTeacherHasSchedule($teacher)) {
            return redirect()->back();
        }
        $results = $teacher->lessons();
        if (!empty($request->subject_id)) {
            $results->where('subject_id', $request->subject_id);
        }
        if (!empty($request->level_id)) {
            $results->where('level_id', $request->level_id);
        }
        if (!empty($request->date_id)) {
            $results->whereDate('date', $request->date_id);
        }
        $results = $results->get();
        $levels  = levels::all();
        return view('frontend.pages.teachers.teacher-schedule', compact('levels', 'results'));
    }

    public function checkTeacherHasSchedule($teacher)
    {
        return count($teacher->lessons) > 0 ? $teacher->lessons : false;
    }

    public function EditLesson($id)
    {
        $auth=Auth::user()->id;
        $Book=DB::table('lessons')->join('levels', 'levels.id', '=', 'lessons.level_id')
            ->join('subjects', 'subjects.id', 'lessons.subject_id')
            ->join('users', 'users.id', 'lessons.user_id')
            ->where('users.id', $auth)
            ->select('users.*', 'lessons.id as lessonsid', 'lessons.*', 'lessons.date as Lesson_date', 'lessons.time as Lesson_time', 'users.thumbnail as USerthumbnail', 'subjects.id as subjects_id', 'subjects.name as sub_name', 'levels.id as levelid', 'levels.name as level_name')
            ->where('lessons.id', $id)
            ->get();
        $subject=Subject::all() ;
        return view('frontend.pages.teachers.editLessons')->with(['subject'=>$subject, 'Book'=>$Book]);
    }

    public function saveDocs($document, $type)
    {
        $path         = $type == 1 ? '/storage/documents' : '/storage/images';
        $documentName = time() . '.' . $document->extension();
        $documentPath = public_path() . $path;
        $document->move($documentPath, $documentName);
        return $documentName;
    }

    public function EditLessons(Request $request)
    {
        $currentlesson = Lesson::where('id', $request->Lesson_id)->first();
        $documentDbPath=$currentlesson->document;
        $imageDbPath   =$currentlesson->thumbnail;

        if ($request->hasFile('photo')) {
            $imageDbPath = $this->saveDocs($request->file('photo'), 2);
        }
        if ($request->hasFile('document')) {
            $documentDbPath = $this->saveDocs($request->file('document'), 1);
        }
        $addlesson = Lesson::where('id', $request->Lesson_id)->update([
            'subject_id'  => $request['subject'],
            'user_id'     => Auth::id(),
            'title'       => $request->title,
            'description' => $request->description,
            'type'        => $request->inlineRadioOptions,
            'date'        => $request->registration_date,
            'time'        => $request->registration_time,
            'frequency'   => $request->frequency,
            'link'        => $request->video,
            'level_id'    => $request->level_id,
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
        $user_id =Auth::user()->id;
        $subjects=Subject::all();
        return view('auth.teachers.teacher-subjects', compact('subjects', 'user_id'));
    }

    public function MySubStudents()
    {
        // dd('teacher');
        $teacher_id        =Auth::user()->id;
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
            ->orderBy('users.id', 'DESC')
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
            ->orderBy('users.id', 'DESC')
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
            ->orderBy('users.id', 'DESC')
            ->get();

        $Level=DB::table('levels')->get();
        return view('frontend.pages.teachers.mystudents')->with(['getmystydentrecord'=>$getmystydentrecord, 'Level'=>$Level, 'Students'=>$Students, 'Subjects'=>$Subjects]);
    }

    public function searchstudents(Request $request)
    {
        // dd($request->all());
        $teacher_id        =Auth::user()->id;
        $getmystydentrecord=DB::table('student_lessons')
            ->join('users', 'student_lessons.user_id', '=', 'users.id')
            ->join('lessons', 'student_lessons.lesson_id', '=', 'lessons.id')
            ->join('levels', function ($join) {
                $join->on('lessons.level_id', '=', 'levels.id');
            })
            ->join('subjects', function ($join) {
                $join->on('lessons.subject_id', '=', 'subjects.id');
            })
            ->where('users.id', $request->student)
            ->where('subjects.id', $request->subject)
            ->where('student_lessons.techer_id', $teacher_id)
            ->select(
                'users.*',
                'student_lessons.id as student_lessons_id',
                'lessons.id as lesson_id',
                'levels.name as level_name',
                'users.id as user_id',
                'subjects.name as Subject_name'
            )
            ->orderBy('users.id', 'DESC')
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
            ->orderBy('users.id', 'DESC')
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
            ->orderBy('users.id', 'DESC')
            ->get();
        $studetncount=count($getmystydentrecord);
        if ($studetncount > 1) {
            return redirect()->back();
        }
        return view('frontend.pages.teachers.mystudents')->with(['getmystydentrecord'=>$getmystydentrecord, 'Students'=>$Students, 'Subjects'=>$Subjects]);
    }

    public function MYSubjects()
    {
        $teacher_id=Auth::user()->id;
        $getmySyb  =DB::table('student_lessons')
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
            ->orderBy('users.id', 'DESC')
            ->get();
        return view('frontend.pages.teachers.MySubjects')->with('getmySyb', $getmySyb);
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
            ->orderBy('users.id', 'DESC')
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

    public function getMessages($s_id){
        $id = \Auth::user()->id;
        $data = Messages::where('from_user_id','=',$id)->orwhere('to_user_id','=',$id)->get();
        return collect([
           'status' => true,
           'data' => $data
        ]);
    }

    public function messageStudent($id)
    {
        // dd(123);
        $student_id =$id;
        $teacher_id =Auth::user()->id;
        $messges    =DB::table('messages')->where('messages.teacherId', $teacher_id)->select('messages')->get();
        $messgesstud=DB::table('messages')->where('messages.student_id', $student_id)->select('messages')->get();

        return view('frontend.pages.teachers.MessagesStudent')
            ->with([
                'teacherMSg'    => $messges,
                'studentMsg'    => $messgesstud,
                'teacherid'     => $teacher_id,
                'STU_ID'        => $student_id,
            ]);
    }

    public function teacherSideMesages(Request $request)
    {
        $role             =0;
        $saves            =new Messages();
        $saves->teacherId =$request->to_user_id;
        $saves->student_id=$request->from_user_id;
        $saves->messages  =$request->message;
        $saves->to_user_id  =$request->to_user_id;
        $saves->from_user_id  =$request->from_user_id;
        $saves->role      =$role;
        $saves->save();
        $id = \Auth::user()->id;
        $data = Messages::where('from_user_id','=',$id)->orwhere('to_user_id','=',$id)->get();
        return collect([
           'status' => true,
           'data' => $data
        ]);
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

    public function ViewStudentsHomeWork()
    {
        $myid    =Auth::user()->id;
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
        // dd(123);
        $auth   =Auth::user()->id;
        $Lessens=DB::table('lessons')->where('lessons.user_id', $auth)
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

        return view('frontend.pages.teachers.ViewteacherAchevments')->with(['Lessens'=>$Lessens, 'level'=>$Lessens, 'date'=>$Lessens, 'Lessonss'=>$Lessonss]);
    }

    public function AssignStudentAchevemnt()
    {
        $myid    =Auth::user()->id;
        $homework=DB::table('homework')
            ->join('subjects', 'subjects.id', 'homework.id')
            ->where('homework.teacher_id', $myid)
            ->join('users', 'users.id', 'homework.user_id')
            ->select('users.fname', 'users.id as User_id', 'homework.*', 'subjects.name as  subjectname', 'subjects.id as sub_id', 'homework.id as homework.id')
            ->get();
        return view('frontend.pages.teachers.ViewSepStudents')->with('homework', $homework);
    }

    public function assingachevment($sub_id, $User_id, $homeworkid)
    {
        $teacherId   =Auth::user()->id;
        $viewHomeWork=DB::table('homework')
            ->where('homework.id', $homeworkid)
            ->where('users.id', $User_id)
            ->where('subjects.id', $sub_id)
            ->join('subjects', 'subjects.id', '=', 'homeWork.Sub_id')
            ->join('users', 'users.id', 'homework.user_id')
            ->where('homework.teacher_id', $teacherId)
            ->select('homework.*', 'homework.id as homeworkid', 'users.thumbnail', 'users.id as usrersid', 'users.fname', 'subjects.name as subjectsName', 'subjects.id as subjectsId')
            ->first();
        $grade  = Achivnments::where(['sub_id' => $sub_id, 'Student_id' => $User_id, 'homework_id' => $homeworkid])->first();
        return view('frontend.pages.teachers.ViewStudentrHomeWork')
            ->with([
                'teacherhomeworkdetaild'=> $viewHomeWork,
                'sub_id'                => $sub_id,
                'User_id'               => $User_id,
                'homeworkid'            => $homeworkid,
                'grade'                 => $grade,
            ]);
    }

    public function Assign_Acivement(Request $request)
    {
        // dd($request->all());
        $TeacherId    =Auth::user()->id;
        $imageDbPath  = '';
        if ($request->hasFile('photo')) {
            $image     = $request->file('photo');
            $imageName = time() . '.' . $image->extension();
            $imagePath = public_path() . '/storage/images';
            $image->move($imagePath, $imageName);
            $imageDbPath = $imageName;
        }
        $check  = Achivnments::where(['sub_id' => $request->sub_id, 'Student_id' => $request->usrersid, 'homework_id' => $request->homeworkid])->first();
        if ($check) {
            $check->sub_id        = $request->sub_id;
            $check->teacher_id    = $TeacherId;
            $check->Student_id    = $request->usrersid;
            $check->homework_id   = $request->homeworkid;
            $check->grade         = $request->grade;
            $check->img           = $imageDbPath;

            $check->save();
            session()->flash('alert-success', 'Student grade updated successfully!');

            return redirect()->back();
        }

        $MyAchevemntss             = new Achivnments();
        $MyAchevemntss->sub_id     = $request->sub_id;
        $MyAchevemntss->teacher_id = $TeacherId;
        $MyAchevemntss->Student_id = $request->usrersid;
        $MyAchevemntss->homework_id= $request->homeworkid;
        $MyAchevemntss->grade      = $request->grade;
        $MyAchevemntss->img        = $imageDbPath;

        $MyAchevemntss->save();
        session()->flash('alert-success', 'Student graded successfully!');
        return redirect()->back();
    }

    public function Add_experience(Request $request)
    {
        $authid=Auth::user()->id;

        $experinces              = new Experience();
        $experinces->teacher_id  = $authid;
        $experinces->year        = $request->date;
        $experinces->title       = $request->exp;
        $experinces->save();
        if ($experinces) {
            return redirect()->route('teacherHome');
        }
    }

    public function MYaccount()
    {
        // dd(123);
        $teacherdata=User::with('subject_level_details')->where('id', Auth::user()->id)->first();

        return view('frontend.pages.teachers.account', compact('teacherdata'));
    }

    public function teacher_dashboard_editprofile($id)
    {
        $editteacherprofile=DB::table('users')->where('users.id', $id)->get();
        return view('frontend.pages.teachers.teacherProfileEdit')->with('editteacherProfile', $editteacherprofile);
    }

    public function edit_teacher_dashboard(Request $request)
    {
        $id=Auth::user()->id;

        DB::table('users')->where('users.id', $id)->select('users.*')->update(
            [
                'users.fname'         => $request->fanmeedit,
                'lname'               => $request->lnameedit,
                'country'             => $request->counteyedit,
            ]
        );

        $teacherid    =Auth::user()->id;
        $editprofileid=DB::table('users')->where('users.id', $teacherid)
            ->join('subjects', 'subjects.id', 'users.favorite_subject')
            ->join('experiences', 'experiences.teacher_id', 'users.id')
            ->select('users.*', 'subjects.name as saname', 'users.thumbnail', 'experiences.year', 'experiences.title')
            ->get();

        return view('frontend.pages.teachers.account')->with('editprofileid', $editprofileid);
    }

    public function _EditTeacherProfile()
    {
        $teacherdata=User::where('id', auth::user()->id)->first();
        return view('frontend.pages.teachers.edit-teacher-profile', compact('teacherdata'));
    }
}
