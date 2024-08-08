<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Level;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $pageTitle = 'Classes';
        $breadcrumbs = [
            ['title' => 'Classes', 'url' => null]
        ];
        $classes = Classes::whereHas('level')->get();
        $levels = Level::whereNull('deleted_at')->get(); // Fetch active levels

        return view('admin.classes.index', compact('classes', 'levels', 'pageTitle', 'breadcrumbs'));
    }

    public function create()
    {
        $levels = Level::all();
        return view('admin.classes.create', compact('levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
            'level_id' => 'required|exists:levels,id',
        ]);

        Classes::create($request->all());

        return redirect()->route('admin.classes.index')->with('success', 'Class created successfully.');
    }

    public function show(Classes $class)
    {
        return view('admin.classes.show', compact('class'));
    }

    public function edit(Classes $class)
    {
        $pageTitle = 'Edit Class';
        $breadcrumbs = [
            ['title' => 'Classes', 'url' => route('admin.classes.index')],
            ['title' => 'Edit Class', 'url' => null]
        ];
        $levels = Level::whereNull('deleted_at')->get(); // Fetch active levels
        return view('admin.classes.edit', compact('class', 'levels', 'pageTitle', 'breadcrumbs'));
    }

    public function update(Request $request, Classes $class)
    {
        $request->validate([
            'class_name' => 'required|string|max:255',
            'level_id' => 'required|exists:levels,id',
        ]);

        $class->update($request->all());

        return redirect()->route('admin.classes.index')->with('success', 'Class updated successfully.');
    }

    public function destroy(Classes $class)
    {
        $class->delete();

        return redirect()->route('admin.classes.index')->with('success', 'Class deleted successfully.');
    }
}