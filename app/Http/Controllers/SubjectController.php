<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Classes;
use App\Models\File;
use App\Models\Level;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $pageTitle = 'Subjects';
        $breadcrumbs = [
            ['title' => 'Home', 'url' => url('/')],
            ['title' => 'Subjects', 'url' => null]
        ];

        $subjects = Subject::with('class')->get();
        return view('admin.subjects.index', compact('subjects', 'pageTitle', 'breadcrumbs'));
    }

    public function create()
    {
        $pageTitle = 'Create Subject';
        $breadcrumbs = [
            ['title' => 'Home', 'url' => url('/')],
            ['title' => 'Subjects', 'url' => route('admin.subjects.index')],
            ['title' => 'Create', 'url' => null]
        ];

        $levels = Level::whereNull('deleted_at')->get();

        return view('admin.subjects.create', compact('levels', 'pageTitle', 'breadcrumbs'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'subject_name' => 'required|min:3',
            'class_id' => 'required',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120', // 5MB max
            'secondary_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:5120', // 5MB max
            'book_file' => 'nullable|mimes:pdf,epub|max:10240', // 10MB max
            'price' => 'required|numeric|min:0',
            'short_desc' => 'nullable|string|max:255',
            'long_desc' => 'nullable|string',
        ]);
        
        // Create the subject record
        $subject = Subject::create($request->all());
        
        // Handle file uploads
        if ($request->hasFile('main_image') || $request->hasFile('secondary_images') || $request->hasFile('book_file')) {
            // Handle main image
            if ($request->hasFile('main_image')) {
                $mainImagePath = $request->file('main_image')->store('images', 'public');
                File::create([
                    'file_name' => $request->file('main_image')->getClientOriginalName(),
                    'file_path' => $mainImagePath,
                    'file_type' => 'main_image',
                    'subject_id' => $subject->id,
                ]);
            }
    
            // Handle secondary images
            if ($request->hasFile('secondary_images')) {
                foreach ($request->file('secondary_images') as $image) {
                    $secondaryImagePath = $image->store('images', 'public');
                    File::create([
                        'file_name' => $image->getClientOriginalName(),
                        'file_path' => $secondaryImagePath,
                        'file_type' => 'image',
                        'subject_id' => $subject->id,
                    ]);
                }
            }
    
            // Handle book file
            if ($request->hasFile('book_file')) {
                try {
                    $bookFile = $request->file('book_file');
                    $bookFilePath = $bookFile->store('books', 'public');
                    File::create([
                        'file_name' => $bookFile->getClientOriginalName(),
                        'file_path' => $bookFilePath,
                        'file_type' => 'book',
                        'subject_id' => $subject->id,
                    ]);
                } catch (\Exception $e) {
                    \Log::error('Error uploading book file: ' . $e->getMessage());
                    return redirect()->back()->with('error', 'Error uploading book file: ' . $e->getMessage());
                }
            }
        }
    
        return redirect()->route('admin.subjects.index')->with('success', 'Subject created successfully.');
    }
    public function edit(Subject $subject)
    {
        $pageTitle = 'Edit Subject';
        $breadcrumbs = [
            ['title' => 'Home', 'url' => url('/')],
            ['title' => 'Subjects', 'url' => route('admin.subjects.index')],
            ['title' => 'Edit', 'url' => null]
        ];
    
        $levels = Level::whereNull('deleted_at')->get(); // Fetch active levels
    
        $classes = Classes::whereNull('deleted_at')
            ->whereHas('level', function ($query) {
                $query->whereNull('deleted_at');
            })
            ->get(); // Fetch only active classes with active levels
        
        // Eager load the related files for the subject
        $subject->load(['files' => function ($query) {
            $query->whereIn('file_type', ['main_image', 'image', 'book']);
        }]);
    
        // Load the class and its associated level
        $subject->load('class.level');
    
        // Set the level_id based on the subject's class
        $subject->level_id = $subject->class->level_id ?? null;
    
        return view('admin.subjects.edit', compact('subject', 'classes', 'levels', 'pageTitle', 'breadcrumbs'));
    }
    public function update(Request $request, Subject $subject)
    {   
       
      
       // Validate the form data
        $request->validate([
            'subject_name' => 'required|min:3',
            'class_id' => 'required',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120', // 5MB max
            'secondary_images.*' => 'nullable|image|mimes:jpeg,png,jpg|max:5120', // 5MB max
            'book_file' => 'nullable|mimes:pdf,epub|max:10240', // 10MB max
            'price' => 'required|numeric|min:0',
            'short_desc' => 'nullable|string|max:255',
            'long_desc' => 'nullable|string',
        ]);


    
        $subject->update($request->all());
    
        // Retrieve existing files associated with the subject
        $existingFiles = $subject->files;
    
        // Handle file uploads
        if ($request->hasFile('main_image') || $request->hasFile('secondary_images') || $request->hasFile('book_file')) {
            // Create new records for new files and associate them with the subject
            if ($request->hasFile('main_image')) {
                $mainImagePath = $request->file('main_image')->store('images','public');
                
                $mainImageFile = File::create([
                    'file_name' => $request->file('main_image')->getClientOriginalName(),
                    'file_path' => $mainImagePath,
                    'file_type' => 'main_image',
                    'subject_id' => $subject->id,
                ]);
            }
    
            if ($request->hasFile('secondary_images')) {
                foreach ($request->file('secondary_images') as $image) {
                    $secondaryImagePath = $image->store('images','public');
                    $secondaryImageFile = File::create([
                        'file_name' => $image->getClientOriginalName(),
                        'file_path' => $secondaryImagePath,
                        'file_type' => 'image',
                        'subject_id' => $subject->id,
                    ]);
                }
            }
    
            if ($request->hasFile('book_file')) {
                try {
                    $bookFile = $request->file('book_file');
                    $bookFilePath = $bookFile->store('books', 'public');
                    File::create([
                        'file_name' => $bookFile->getClientOriginalName(),
                        'file_path' => $bookFilePath,
                        'file_type' => 'book',
                        'subject_id' => $subject->id,
                    ]);
                } catch (\Exception $e) {
                    var_dump($e);die();
                    \Log::error('Error uploading book file: ' . $e->getMessage());
                    return redirect()->back()->with('error', 'Error uploading book file: ' . $e->getMessage());
                }
            }
    
            // Remove existing files that are not present in the form data
            $existingFileIds = $existingFiles->pluck('id');
            $newFileIds = collect();

            File::whereIn('id', $existingFileIds)->delete();
        }
    
        return redirect()->route('admin.subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('admin.subjects.index')->with('success', 'Subject deleted successfully.');
    }

    
    public function toggleLock(Subject $subject)
    {
        $subject->update(['is_locked' => !$subject->is_locked]);
        return response()->json(['success' => true, 'is_locked' => $subject->is_locked]);
    }
}