<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Level;
use App\Models\Classes;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only('unlockBook');
    }
    public function get1Books()
    {
        $subjects = Subject::with(['files' => function ($query) {
            $query->whereIn('file_type', ['main_image', 'image', 'book']);
        }])->get()->map(function ($subject) {
            $mainImage = $subject->files->where('file_type', 'main_image')->first();
            $secondaryImages = $subject->files->where('file_type', 'image');
            $book = $subject->files->where('file_type', 'book')->first();

            return [
                'id' => $subject->id,
                'subject_name' => $subject->subject_name,
                'src' => $mainImage ? asset('storage/' . $mainImage->file_path) : null,
                'images' => $secondaryImages->map(function ($image) {
                    return asset('storage/' . $image->file_path);
                })->toArray(),
                'book' => $book ? asset('storage/' . $book->file_path) : null,
            ];
        });

        return response()->json($subjects);
    }
      public function getBooks(Request $request)
{
    $query = Subject::with(['files' => function ($query) {
        $query->whereIn('file_type', ['main_image', 'image', 'book']);
    }]);

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
        $mainImage = $subject->files->where('file_type', 'main_image')->first();
        $secondaryImages = $subject->files->where('file_type', 'image');
        $book = $subject->files->where('file_type', 'book')->first();

        return [
            'id' => $subject->id,
            'subject_name' => $subject->subject_name,
            'src' => $mainImage ? asset('storage/' . $mainImage->file_path) : null,
            'images' => $secondaryImages->map(function ($image) {
                return asset('storage/' . $image->file_path);
            })->toArray(),
            'book' => $book ? asset('storage/' . $book->file_path) : null,
        ];
    });

    return response()->json($books);
}


    public function getBookDetails($subjectId)
    {
        $subject = Subject::with(['files' => function ($query) {
            $query->whereIn('file_type', ['main_image', 'image', 'book']);
        }])->find($subjectId);

        if (!$subject) {
            return response()->json(['error' => 'Subject not found'], 404);
        }

        $mainImage = $subject->files->where('file_type', 'main_image')->first();
        $secondaryImages = $subject->files->where('file_type', 'image');
        $book = $subject->files->where('file_type', 'book')->first();

        $bookDetails = [
            'id' => $subject->id,
            'subject_name' => $subject->subject_name,
            'main_image' => $mainImage ? asset('storage/' . $mainImage->file_path) : null,
            'secondary_images' => $secondaryImages->map(function ($image) {
                return asset('storage/' . $image->file_path);
            })->toArray(),
            'book_file' => $book ? asset('storage/' . $book->file_path) : null,
        ];

        return response()->json($bookDetails);
    }


    public function unlockBook(Request $request)
    {
        $request->validate([
            'subject_id' => 'required|exists:subjects,id',
        ]);
    
        $user = $request->user();
        $subjectId = $request->subject_id;
    
        // Check if the book is already unlocked for the user
        $alreadyUnlocked = $user->files()
            ->whereHas('subject', function ($query) use ($subjectId) {
                $query->where('id', $subjectId);
            })
            ->where('file_type', 'book')
            ->exists();
    
        if ($alreadyUnlocked) {
            return response()->json([
                'message' => 'Book is already unlocked for this user.',
            ], 200);
        }
    
        // Find the book file for the subject
        $bookFile = File::where('subject_id', $subjectId)
            ->where('file_type', 'book')
            ->first();
    
        if (!$bookFile) {
            return response()->json([
                'message' => 'No book file found for this subject.',
            ], 404);
        }
    
        // Unlock the book for the user
        $user->files()->attach($bookFile->id, ['unlocked_at' => now()]);
    
        return response()->json([
            'message' => 'Book unlocked successfully.',
            'unlocked_at' => now(),
        ], 200);
    }
}