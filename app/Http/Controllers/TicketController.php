<?php

namespace App\Http\Controllers;

use App\Models\PurchaseLog;
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

    public function ticketBuy(Request $request){
        $ticket = Ticket::where('event_id', request('event'))->get()->first();

        $validatedData = $request->validate([
            'amount' => 'required|gte:1'
        ]);
        $validatedData['ticket_id'] = $ticket->id;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['title'] = $ticket->event->title;
        $validatedData['price'] = $ticket->price;
        $validatedData['total'] = $ticket->price * $validatedData['amount'];

        PurchaseLog::create($validatedData);

        $ticket->update([
            'slot' => $ticket->slot - $validatedData['amount'],
            'purchased' => $ticket->purchased + $validatedData['amount'],
        ]);

        return back()->with('success', "Purchase Success");
    }
}
