<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function showHome(){
        $events = Event::all();
        return view('guest.home',[
            'title' => 'Home',
            'events' => $events
        ]);
    }

    public function showEvent(){
        if(request()->has('detail')){
            $event = Event::where('id', request('detail'))->get()->first();
            return view('EventArticle.eventDetail',[
                'title' => 'Event',
                'event' => $event
            ]);
        }
        $events = Event::all();
        return view('EventArticle.eventIndex',[
            'title' => 'Event',
            'events' => $events
        ]);
    }
}
