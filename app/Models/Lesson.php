<?php

namespace App\Models;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guard = [];

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
        $addlesson = Lesson::create([
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
            return $addlesson;
        }
    }
}
