<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function ticketIndex(){
        $ticket = Ticket::where('event_id', request('event'))->get()->first();

        return view('Ticket.ticketPurchase', [
            'title' => 'Ticket',
            'ticket' => $ticket,
        ]);
    }
}
