<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Resources\EventTeamResource;
use App\Http\Resources\ShowEventResource;
use App\Models\Event;
// use App\Models\EventTeam;
use Illuminate\Http\Request;

class EventTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(1);
        $eventTeams = Event::all();
        $eventTeams = EventTeamResource::collection($eventTeams);
        return response()->json(['success'=> true, 'data'=>$eventTeams], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //     $eventTeam = EventTeam::create([
    //         'team_id'=> request('team_id'),
    //         'event_id'=> request('event_id'),
    //     ]);
        $eventTeam =Event::store($request);
        return response()->json(['success'=> true, 'data'=>$eventTeam], 200);
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
    public function update(Request $request,  $id)
    {
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $eventTeam)
    {
        //
    }
}
