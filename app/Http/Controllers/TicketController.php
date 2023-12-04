<?php

namespace App\Http\Controllers;

use App\Models\PurchaseLog;
use App\Models\Ticket;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Mail\MailPayment;
use Exception;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    public function ticketIndex(){
        if(request('event') == null){
            return redirect('/event');
        }
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

        $log = PurchaseLog::create($validatedData);

        $ticket->update([
            'slot' => $ticket->slot - $validatedData['amount'],
            'purchased' => $ticket->purchased + $validatedData['amount'],
        ]);

        try {
            TicketController::sendEmail($log);
            return back()->with('success', "Purchase Success, please check your email");
        } catch (Exception $th) {
            dd($th);
            return back()->with('fail', "Something went wrong");
        }
    }

    public function sendEmail(PurchaseLog $log){
        $data = [];
        $data['name'] = $log->user->name;
        $data['event'] = $log->title;
        $data['price'] = $log->price;
        $data['amount'] = $log->amount;
        $data['total'] = $log->total;
        $data['id'] = $log->id;

        $email = new MailPayment($data);
        Mail::to($log->user->email)->send($email);
    }
}
