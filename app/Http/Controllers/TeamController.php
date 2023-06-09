<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Resources\ShowTeamResource;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        $team = TeamResource::collection($teams);
        return response()->json(['success'=> true, 'data'=>$team], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        $team = Team::store($request);
        return response()->json(['success'=> true, 'data'=>$team], 200);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $team = Team::find($id);
        $team = new ShowTeamResource($team);
        return response()->json(['success'=> true, 'data'=>$team], 200);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $team = Team::store($request,$id);
        return response()->json(['success'=> true, 'data'=>$team], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();
        return response()->json(['success'=> true, 'data'=>'delete successful'], 200);

    }
}
