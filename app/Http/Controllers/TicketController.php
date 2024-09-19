<?php

namespace App\Http\Controllers;

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
        
        // Fetch all tickets
        $tickets = Ticket::all();
        
        // Return view with tickets
        return view('index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('create',compact('users') );
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
        $tickets = Ticket::all();
        return view('index', compact('tickets'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ticket = Ticket::with('creator', 'assignedUser')->findOrFail($id);
        return view('show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //dd($id);
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect()->route('tickets.index');
    }
}
