<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
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
        // $ticket = Ticket::create([
        //     'price'=> request('price'),
        //     'user_id'=> request('user_id'),
        //     'event_id' => request('event_id')
        // ]);
        // dd(1);
        $ticket = Ticket::store($request);
        return response()->json(['success'=> true, 'data'=>$ticket], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
