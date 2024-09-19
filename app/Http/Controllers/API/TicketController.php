<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        return response()->json([
            'msg' => 'all tickets retrived',
            'status' => 'sucsses',
            'data' => $tickets,

        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ticket = [
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'dead_line' => $request->dead_line,
            'creator_id' => $request->creator_id,
            'assigned_user_id' => $request->assigned_user_id
        ];
        Ticket::create($ticket);
        return response()->json([
            'msg' => 'created',
            'status' => 'sucsses',
            'data' =>$ticket

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::with('creator', 'assignedUser')->findOrFail($id);
        return response()->json([
            'msg' => 'info  retrived',
            'status' => 'sucsses',
            'data' => $ticket,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        
        $data = $request->all();
        $ticket = Ticket::find($id);
        $ticket->update($data);
        return response()->json([
            'msg' => 'updated',
            'status' => 'sucsses',
            'data' => $ticket,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return response()->json([
            'msg' => 'deleted',
            'status' => 'sucsses',
            'data' => $ticket,

        ]);
    }
}
