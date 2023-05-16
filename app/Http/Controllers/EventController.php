<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\EventResource;
use App\Http\Resources\ShowEventResource;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event = Event::all();
        $event = Event::where('type_sport', 'like', '%' .request('type_sport'). '%')->get();
        $events = EventResource::collection($event);
        return response()->json(['success'=> true, 'data'=>$events], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $event = Event::store($request);
        return response()->json(['success'=> true, 'data'=>$event], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::find($id);
        $event = new ShowEventResource($event);
        return response()->json(['success'=> true, 'data'=>$event], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $event = Event::store($request,$id);
        return response()->json(['success'=> true, 'data'=>$event], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return response()->json(['success'=> true, 'message'=>"Delete successful"], 200);

    }
    // public function search(Request $request)
    // {
    //    $event_type= $request->get('type_sport');
    //     $events = Event::where('type_sport', 'like', '%' .$event_type. '%')->get();
    //     return response()->json(['success' =>true, 'data' =>$events],201);
    // }
}
