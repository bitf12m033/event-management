<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Level;
use App\Models\Classes;

class BookController extends Controller
{
    public function get1Books(){
        $subjects = Subject::select('id', 'subject_name')->get()
        ->map(function ($subject) {
            return [
                'id' => $subject->id,
                'subject_name' => $subject->subject_name,
                'src' => '/book1.png'
            ];
        });;
        return response()->json($subjects);
    }
       public function getBooks(Request $request)
        {
            $query = Subject::query();

            if ($request->has('level')) {
                $level = Level::findOrFail($request->level);
                $query->whereHas('class.level', function ($q) use ($level) {
                    $q->where('id', $level->id);
                });
            }

            if ($request->has('class')) {
                $class = Classes::findOrFail($request->class);
                $query->whereHas('class', function ($q) use ($class) {
                    $q->where('id', $class->id);
                });
            }

            if ($request->has('subject')) {
                $query->where('id', $request->subject);
            }

            $books = $query->get()->map(function ($subject) {
                return [
                    'id' => $subject->id,
                    'subject_name' => $subject->subject_name,
                    'src' => '/book1.png'
                ];
            });

            return response()->json($books);
        }
}
