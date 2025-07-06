<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;

    public function __construct($ticket)
    {
        $this->ticket = $ticket;

    }

    public function build()
{
    return $this->subject('Novo Ticket Criado')
                ->view('emails.ticket')
                ->with([
                    'name' => $this->ticket->user->name,
                    'subject' => $this->ticket->subject,
                    'problem' => $this->ticket->problem,
                    'description' => $this->ticket->description,
                    'status' => $this->ticket->status,
                    'agent_id' => $this->ticket->agent->name ?? 'Not assigned'
                ]);
}



    /**
     * Get the message envelope.
     */
   
}
