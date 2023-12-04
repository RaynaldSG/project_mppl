<?php

namespace App\Http\Controllers;

use App\Mail\MailPayment;
use App\Models\PurchaseLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailCOntroller extends Controller
{
    public function sendEmail(PurchaseLog $log){
        $data = [];
        $data['name'] = $log->user->name;
        $data['event'] = $log->title;
        $data['price'] = $log->price;
        $data['amount'] = $log->amount;
        $data['total'] = $log->total;

        $email = new MailPayment($data);
        Mail::to($log->user->email)->send($email);
    }
}
