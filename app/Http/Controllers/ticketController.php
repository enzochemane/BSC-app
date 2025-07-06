<?php

namespace App\Http\Controllers;
use App\Models\ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Mail\ticketMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        $tickets = Ticket::with(['user', 'agent'])->get();
    } else {
        // users see their own tickets
        $tickets = Ticket::with(['user', 'agent'])
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
            'agent_id' => 'nullable|exists:users,id',
            
        ]);

   $ticket = Ticket::create([
        'subject' => $request->subject,
        'problem' => $request->problem,
        'description' => $request->description,
        'status' => $request->status ?? 'open', 
        'user_id' => Auth::user()->id, 
        'agent_id' => $request->agent_id, 
    ]);

       // send email to user
        if ($ticket->user && $ticket->user->email) {
        Mail::to($ticket->user->email)->send(new TicketMail($ticket));
    }

        // send email to agent
        if ($ticket->agent_id && $ticket->agent) {
        Mail::to($ticket->agent->email)->send(new TicketMail($ticket));
    }

        return redirect()->route('tickets')->with('success', 'Ticket criado com sucesso. Um email foi enviado.');

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
        'status' => 'nullable'
    ]);

    $ticket = Ticket::findOrFail($id);
    $ticket->update($validated);
    
if ($ticket->agent_id && $ticket->agent) {
        Mail::to($ticket->agent->email)->send(new TicketMail($ticket));
    }
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

    public function dashboard()
{
    $user = Auth::user();

    if ($user->role !== 'admin') {
        abort(403, 'Acesso negado');
    }

    return Inertia::render('Dashboard', [
        'totalTickets' => Ticket::count(),
        'openTickets' => Ticket::where('status', 'open')->count(),
        'unassignedTickets' => Ticket::whereNull('agent_id')->count(),
        'totalUsers' => User::count(),
        'totalAgents' => User::where('role', 'agent')->count(),
    ]);
}
}
