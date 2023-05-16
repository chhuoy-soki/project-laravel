<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Resources\ShowTickettResource;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Ticket::all());
        $tickets = Ticket::all();
        $ticket = TicketResource::collection($tickets);
        return response()->json(['success'=> true, 'data'=>$ticket], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = Ticket::store($request);
        return response()->json(['success'=> true, 'data'=>$ticket], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ticket = Ticket::find($id);
        $ticket = new TicketResource($ticket);
        return response()->json(['success'=> true, 'data'=>$ticket], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::store($request,$id);
        return response()->json(['success'=> true, 'data'=>$ticket], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return response()->json(['success'=> true, 'message'=>'delete successful'], 200);

    }
}
