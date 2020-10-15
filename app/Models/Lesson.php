<?php

namespace App\Models;

use App\User;
use App\Models\StudentLesson;
use App\Models\levels as Levels;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function student_lessons()
    {
        return $this->hasOne(StudentLesson::class, 'lesson_id','id');
    }

    public function levels()
    {
        return $this->hasMany(Levels::class, 'id','level_id');
    }

    public static function getBooks($id)
    {
        return self::with(['subject','student_lessons' => function($q) use ($id) {
            $q->where('user_id',$id);
        }])->whereHas('student_lessons', function($q) use ($id) {
            $q->where('user_id',$id);
        })->get();
    }

    public static function getSepBooking($id){
        return self::with(['levels','subject','student_lessons' => function($q) use ($id) {
            $q->where('user_id',$id);
        }])->whereHas('student_lessons', function($q) use ($id) {
            $q->where('user_id',$id);
        })->get();
    }



    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function getDateAttribute($value)
    // {
    //     $date  = strtotime($value);
    //     $today = strtotime(date('Y-m-d'));
    //     if ($date == $today) {
    //         return 'Due Today ' . date('m/d', strtotime($value));
    //     }
    //     if ($date > $today) {
    //         return 'Due In ' . date('m/d', strtotime($value));
    //     }

    //     return $value;
    // }

    protected $dates = [
        'date',
        'time',
    ];

    public function resizeImage($image)
    {
        $thumbnailImage     = Image::make($image);
        $imagePath          = public_path() . '/storage/images/';
        $imageName          = time() . '.' . $image->getClientOriginalName();
        $thumbnailImage->resize(250, 250);
        $thumbnailImage->save($imagePath . $imageName);
        return $imageName;
    }

    public function saveLesson($request)
    {
        if ($request->hasFile('photo')) {
            $imageDbPath = $this->resizeImage($request->file('photo'));
        }

        if ($request->hasFile('document')) {
            $document     = $request->file('document');
            $documentName = time() . '.' . $document->extension();
            $documentPath = public_path() . '/storage/documents';
            $document->move($documentPath, $documentName);
            $documentDbPath = $documentName;
        }
        $subject  = explode(' ', $request->subject);

        $addlesson = Lesson::create([
            'subject_id'  => $subject[0],
            'user_id'     => Auth::id(),
            'title'       => $request['title'],
            'description' => $request['description'],
            'type'        => $request['lessonType'],
            'date'        => $request['registration_date'],
            'time'        => $request['registration_time'],
            'frequency'   => $request['frequency'],
            'link'        => $request['video'],
            'level_id'    => $subject[1],
            'document'    => $documentDbPath,
            'thumbnail'   => $imageDbPath,
        ]);
        // dd($addlesson);
        if ($addlesson) {
            return $addlesson;
        }
    }
}
