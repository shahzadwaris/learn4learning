<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = [];

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    protected $dates = [
        'date',
        'time',
    ];

    public function saveLesson($request)
    {
        if ($request->hasFile('photo')) {
            $image     = $request->file('photo');
            $imageName = time() . '.' . $image->extension();
            $imagePath = public_path() . '/storage/images';
            $image->move($imagePath, $imageName);
            $imageDbPath = $imageName;
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
