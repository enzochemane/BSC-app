<?php

namespace App\Http\Controllers;
use App\Models\ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class ticketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

   $user = Auth::user();

    if ($user->role === 'admin' || $user->role === 'agent') {
        //admin and agents see all tickets
        $tickets = Ticket::with(['creator', 'agent'])->get();
    } else {
        // users see their own tickets
        $tickets = Ticket::with(['creator', 'agent'])
            ->where('user_id', $user->id)
            ->get();
    }

    return Inertia::render('tickets', [
        'tickets' => $tickets,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('createTickets');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'problem' => 'required',
            'description' => 'required',
            
        ]);

    Ticket::create([
        'subject' => $request->subject,
        'problem' => $request->problem,
        'description' => $request->description,
        'status' => $request->status ?? 'open', 
        'user_id' => Auth::user()->id, 
        'agent_id' => null, 
    ]);

        return redirect()->route('tickets');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $user = Auth::user();

    $ticket = Ticket::findOrFail($id);

       

    if ($user->role === 'agent') {
        // agent only see his name
        $agents = User::where('id', $user->id)->get();
    } else {
        
        $agents = User::where('role', 'agent')->get();
    }

    return Inertia::render('editTicket', [
        'ticket' => $ticket,
        'agents' => $agents,
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     $validated = $request->validate([
        'subject' => 'required',
        'problem' => 'required',
        'description' => 'required',
        'agent_id' => 'nullable|exists:users,id',
        'status' => 'required'
    ]);

    $ticket = Ticket::findOrFail($id);
    $ticket->update($validated);

    return redirect()->route('tickets');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();

        return redirect()->route('tickets');
    }
}
