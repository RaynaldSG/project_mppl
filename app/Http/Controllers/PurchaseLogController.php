<?php

namespace App\Http\Controllers;

use App\Mail\MailConfirmation;
use App\Models\PurchaseLog;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PurchaseLogController extends Controller
{
    public function logIndexUser(){
        $logs = PurchaseLog::where('user_id', auth()->user()->id)->latest()->paginate(10);

        return view('dashboard.purchase_log.purchaseLog', [
            'title' => "Purchase Log",
            'logs' => $logs,
        ]);
    }

    public function logIndexAdmin(){
        $logs = PurchaseLog::latest()->paginate(10);

        return view('dashboard.purchase_log.purchaseLog', [
            'title' => "Purchase Log",
            'logs' => $logs,
        ]);
    }

    public function logUpdate(){
        $log = PurchaseLog::where('id', request('id'));
        $log->update([
            'payment' => 'completed'
        ]);
        $log = $log->get()->first();

        try {
            PurchaseLogController::confirmationEmailSend($log);
            return back()->with('success', "Purchase Success, please check your email");
        } catch (Exception $th) {
            dd($th);
            return back()->with('fail', "Something went wrong");
        }

        return redirect('/dashboard/logAdmin');
    }

    public function confirmationEmailSend(PurchaseLog $log){
        $data = [];
        $data['name'] = $log->user->name;
        $data['event'] = $log->title;
        $data['id'] = $log->id;

        $email = new MailConfirmation($data);
        Mail::to($log->user->email)->send($email);
    }
}
