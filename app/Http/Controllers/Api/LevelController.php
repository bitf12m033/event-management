<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum')->except(['index','show','filters']);

        $this->middleware('throttle:api')->only(['store','destroy' ,'update']);
        
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Level::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'level_name' => 'required|string|max:255',
        ]);

        $level = Level::create($request->all());

        return response()->json($level, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $level = Level::findOrFail($id);
        return response()->json($level);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'level_name' => 'required|string|max:255',
        ]);

        $level = Level::findOrFail($id);
        $level->update($request->all());
        return response()->json($level);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Level $level)
    {

        $level->delete();

        return response()->json(null, 204);
    }

    public function filters(){
        $levels = Level::with(['classes.subjects'])->get();

        $levelsData = $levels->map(function ($level) {
            return [
                'level' => $level,
                'classes' => $level->classes->map(function ($class) {
                    return [
                        'class' => $class,
                        'subjects' => $class->subjects,
                    ];
                }),
            ];
        });

        return response()->json($levelsData);
    }
}
