<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\levels;
use App\Models\Subject;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // dd($request->all());
        $results = Lesson::with('teacher', 'subject');
        if (!empty($request->subject)) {
            $results->where('subject_id', $request->subject);
        }
        if (!empty($request->level)) {
            $results->where('level_id', $request->level);
        }
        if (!empty($request->date)) {
            $results->whereDate('date', '>=', $request->date);
        }

        $lessons           = $results->get();
        // dump($lessons);
        $allSubjects       = Subject::all();
        $levels            = levels::all();

        return view('frontend.pages.students.student-schedule-search-results', compact('lessons', 'allSubjects', 'levels'));
    }
}
