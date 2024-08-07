<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\EventResource;
use App\Http\Traits\CanLoadRelationships;

class EventController extends Controller
{
    use CanLoadRelationships;

    private array  $relations = ['user' , 'attendees' ,'attendees.user'];

    public function __construct(){
        $this->middleware('auth:sanctum')->except(['index','show']);

        // Rate Limit
        // $this->middleware('throttle:60,1')->only(['store','destroy' ,'update']);
        // $this->middleware('throttle:60,1')
        $this->middleware('throttle:api')->only(['store','destroy' ,'update']);
        
        //Policy 
        $this->authorizeResource(Event::class , 'event');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Event::all();
        $query = Event::query();

        $query = $this->loadRelationships(Event::query() , $this->relations);

        return EventResource::collection($query->latest()->paginate());
        // $this->shouldIncludeRelation('user');
        // return EventResource::collection(Event::with('user')->paginate());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = Event::create([
            ...$request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'start_time' =>'required|date',
                'end_time' =>'required|date|after:start_time',
            ]),
            'user_id' => $request->user()->id //1
        ]);

        return new EventResource($this->loadRelationships($event));
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        // $event->load('user','attendees');
        return new EventResource($this->loadRelationships($event));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Event $event)
    {
        // if(Gate::denies('update-event',$event)) {
        //     abort(403,"You are not authorized to do it");
        // }
         
        // Same as above lines
        // $this->authorize('update-event',$event);

        $event->update($request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'start_time' =>'required|date',
            'end_time' =>'required|date|after:start_time',
        ]));
        
        return new EventResource($this->loadRelationships($event));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response(status:204) ;
    }
}
