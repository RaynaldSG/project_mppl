<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::all();

        return view('admin.EventView.eventViewAdmin', [
            'title' => 'Event',
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.EventView.eventCreateAdmin', [
            'title' => "Event",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->use_ticket == 'true') {
            $validateData = $request->validate([
                'title' => 'required',
                'organizer' => 'required',
                'location' => 'required',
                'start' => 'required',
                'end' => 'required',
                'desc_EN' => 'required',
                'desc_ID' => 'required',
                'image' => 'image',
            ]);
            $validateData['use_ticket'] = true;

            if ($request->file('image')) {
                $validateData['image'] = $request->file('image')->store('event-image');
            }
            $event = Event::create($validateData);

            $validateDataTicket = $request->validate([
                'slot' => 'required',
                'price' => 'required',
            ]);

            $validateDataTicket['purchased'] = 0;
            $validateDataTicket['event_id'] = $event->id;
            Ticket::create($validateDataTicket);
        } else {
            $validateData = $request->validate([
                'title' => 'required',
                'organizer' => 'required',
                'location' => 'required',
                'start' => 'required',
                'end' => 'required',
                'desc_EN' => 'required',
                'desc_ID' => 'required',
                'image' => 'image',
            ]);

            if ($request->file('image')) {
                $validateData['image'] = $request->file('image')->store('event-image');
            }
            Event::create($validateData);
        }
        return redirect('/dashboard/event')->with('success', 'Input Data Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        if (request()->has('detail')) {
            return view('EventArticle.eventDetail', [
                'title' => 'Event',
                'event' => $event
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.EventView.eventEditAdmin', [
            'title' => "Event",
            'event' => $event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        if ($request->use_ticket == 'true') {
            $validateData = $request->validate([
                'title' => 'required',
                'organizer' => 'required',
                'location' => 'required',
                'start' => 'required',
                'end' => 'required',
                'desc_EN' => 'required',
                'desc_ID' => 'required',
                'image' => 'image',
            ]);
            $validateData['use_ticket'] = true;

            if ($request->file('image')) {
                if ($event->image) {
                    Storage::delete($event->image);
                }
                $validateData['image'] = $request->file('image')->store('event-image');
            }
            Event::where('id', $event->id)->update($validateData);

            $validateDataTicket = $request->validate([
                'slot' => 'required',
                'price' => 'required',
            ]);

            $validateDataTicket['purchased'] = 0;
            $validateDataTicket['event_id'] = $event->id;
            if(Ticket::where('event_id', $event->id)->count() >= 1){
                Ticket::where('event_id', $event->id)->update($validateDataTicket);
            }
            else{
                Ticket::create($validateDataTicket);
            }
        } else {
            $validateData = $request->validate([
                'title' => 'required',
                'organizer' => 'required',
                'location' => 'required',
                'start' => 'required',
                'end' => 'required',
                'desc_EN' => 'required',
                'desc_ID' => 'required',
                'image' => 'image',
            ]);

            if ($request->file('image')) {
                if ($event->image) {
                    Storage::delete($event->image);
                }
                $validateData['image'] = $request->file('image')->store('event-image');
            }
            Event::where('id', $event->id)->update($validateData);
        }
        return redirect('/dashboard/event')->with('success', 'Edit Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::delete($event->image);
        }
        Event::destroy($event->id);
        return redirect('/dashboard/event')->with('success', 'Delete Data Berhasil');
    }
}
