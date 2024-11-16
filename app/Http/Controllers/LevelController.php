<?php

namespace App\Http\Controllers;


use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        $pageTitle = 'Levels';
        $breadcrumbs = [
            // ['title' => 'Home', 'url' => url('/')],
            ['title' => 'Levels', 'url' => null]
        ];
        $levels = Level::all();
        return view('admin.levels.index', compact('levels','pageTitle', 'breadcrumbs'));
    }

    public function create()
    {
        return view('admin.levels.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'level_name' => 'required|string|max:255|unique:levels,level_name'
        ]);
    
        try {
            Level::create($request->all());
            return redirect()->route('admin.levels.index')->with('success', 'Level created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('admin.levels.index')->with('error', 'Failed to create level.');
        }
    }

    public function show(Level $level)
    {
        return view('admin.levels.show', compact('level'));
    }

    public function edit(Level $level)
    {
        $pageTitle = 'Edit Level';
        $breadcrumbs = [
            ['title' => 'Levels', 'url' => route('admin.levels.index')],
            ['title' => 'Edit Level', 'url' => null]
        ];
        
        return view('admin.levels.edit', compact('level', 'pageTitle', 'breadcrumbs'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'level_name' => 'required|string|max:30',
        ]);
    
        // Find the level by ID
        $level = Level::findOrFail($id);
    
        // Update the level name
        $level->level_name = $request->input('level_name');
        $level->save();
    
        // Redirect back with a success message
        return redirect()->route('admin.levels.index')->with('success', 'Level updated successfully.');
    }

    public function destroy(Level $level)
    {
        $level->delete();

        return redirect()->route('admin.levels.index')->with('success', 'Level deleted successfully.');
    }
}