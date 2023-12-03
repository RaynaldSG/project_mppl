<?php

namespace App\Http\Controllers;

use App\Models\PurchaseLog;
use Illuminate\Http\Request;

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
        PurchaseLog::where('id', request('id'))->update([
            'payment' => 'completed'
        ]);

        return redirect('/dashboard/logAdmin');
    }
}
