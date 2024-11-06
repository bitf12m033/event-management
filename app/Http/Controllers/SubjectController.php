<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Classes;
use App\Models\File;
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

        $classes = Classes::whereNull('deleted_at')
            ->whereHas('level', function ($query) {
                $query->whereNull('deleted_at');
            })
            ->get(); // Fetch only active classes with active levels

        return view('admin.subjects.create', compact('classes', 'pageTitle', 'breadcrumbs'));
    }

    public function store(Request $request)
    {
        // 
        // // Validate the form data
        // print($request->validate([
        //     'subject_name' => 'required',
        //     'class_id' => 'required',
        //     'main_image' => 'required|image|mimes:jpeg,png,jpg',
        //     'secondary_images.*' => 'image|mimes:jpeg,png,jpg',
        //     'book_file' => 'required|mimes:pdf,epub',
        // ]))

        
        
        // Create the subject record
        $subject = Subject::create($request->all());
        
        // Check if the main image is available
        if ($request->hasFile('main_image')) {
            // dd($request->all());
            // Store the main image
            $mainImagePath = $request->file('main_image')->store('images');
            $mainImageFile = File::create([
                'file_name' => $request->file('main_image')->getClientOriginalName(),
                'file_path' => $mainImagePath,
                'file_type' => 'main_image',
                'subject_id' => $subject->id, // Associate the subject ID
            ]);
        }


    // Store the secondary images
    $secondaryImagesPaths = [];
    if ($request->hasFile('secondary_images')) {
        foreach ($request->file('secondary_images') as $image) {
            $secondaryImagesPaths[] = $image->store('images');
            $secondaryImageFile = File::create([
                'file_name' => $image->getClientOriginalName(),
                'file_path' => $secondaryImagesPaths[count($secondaryImagesPaths) - 1],
                'file_type' => 'image',
                'subject_id' => $subject->id, // Associate the subject ID
            ]);
        }
    }

    // Store the book file
    if ($request->hasFile('book_file')) {
        $bookFilePath = $request->file('book_file')->store('books');
        $bookFile = File::create([
            'file_name' => $request->file('book_file')->getClientOriginalName(),
            'file_path' => $bookFilePath,
            'file_type' => 'book',
            'subject_id' => $subject->id, // Associate the subject ID
        ]);
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

        $classes = Classes::whereNull('deleted_at')
            ->whereHas('level', function ($query) {
                $query->whereNull('deleted_at');
            })
            ->get(); // Fetch only active classes with active levels
        
        // Eager load the related files for the subject
        $subject->load(['files' => function ($query) {
            $query->whereIn('file_type', ['main_image','image', 'book']);
        }]);
        return view('admin.subjects.edit', compact('subject', 'classes', 'pageTitle', 'breadcrumbs'));
    }

    public function update(Request $request, Subject $subject)
    {
       // Validate the form data
        $request->validate([
            'subject_name' => 'required',
            'class_id' => 'required',
            'main_image' => 'required|image|mimes:jpeg,png,jpg',
            'secondary_images.*' => 'image|mimes:jpeg,png,jpg',
            'book_file' => 'required|mimes:pdf|max:5000',
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
                $bookFilePath = $request->file('book_file')->store('books','public');
                $bookFile = File::create([
                    'file_name' => $request->file('book_file')->getClientOriginalName(),
                    'file_path' => $bookFilePath,
                    'file_type' => 'book',
                    'subject_id' => $subject->id,
                ]);
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
}