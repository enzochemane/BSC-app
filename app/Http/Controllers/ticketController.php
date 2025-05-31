<?php

namespace App\Http\Controllers;
use App\Models\ticket;
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
        return Inertia::render('tickets');
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
        'status' => $request->status ?? 'open', // status padrão se não for enviado
        'user_id' => Auth::user()->id, // usuário logado cria o ticket
        'agent_id' => null, // agente será atribuído depois
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
       $ticket = Ticket::findOrFail($id); // <-- Aqui buscas o ticket com base no ID

    return Inertia::render('editTicket', [ // <-- Certifica-te que o nome do componente está correto
        'ticket' => $ticket
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     $request->validate([
        'subject' => 'required',
        'problem' => 'required',
        'description' => 'required',
        'status' => 'required'
    ]);

    $ticket = Ticket::findOrFail($id); // <-- Aqui defines a variável corretamente

    $ticket->update($request->all());

    return redirect()->route('tickets');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
