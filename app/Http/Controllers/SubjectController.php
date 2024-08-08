<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Classes;
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
        $request->validate([
            'subject_name' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
        ]);

        Subject::create($request->all());

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

        return view('admin.subjects.edit', compact('subject', 'classes', 'pageTitle', 'breadcrumbs'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'subject_name' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
        ]);

        $subject->update($request->all());

        return redirect()->route('admin.subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('admin.subjects.index')->with('success', 'Subject deleted successfully.');
    }
}