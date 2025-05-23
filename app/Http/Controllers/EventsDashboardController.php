<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsDashboardController extends Controller
{
    public function index()
    {
        $events = Event::all(); 

        // Hitung total tiket terjual
        $events = $events->map(function ($event) {
            $event->totalSold = $event->total_quota - $event->remaining_quota;
            return $event;
        });

        // Urutkan dari yang paling banyak terjual
        $events = $events->sortByDesc('totalSold');
        
        return view('admin.events', ['events' => $events]);
    }

    public function events()
    {
        $events = Event::all();

        return view('admin.events', ['events' => $events]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'location' => 'required|string',
            'event_date' => 'required|date',
            'expired_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        // Simpan gambar
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/events'), $imageName);

        // Simpan data event
        Event::create([
            'title' => $request->title,
            'image' => $imageName,
            'description' => $request->description,
            'location' => $request->location,
            'event_date' => $request->event_date,
            'expired_date' => $request->expired_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->route('admin.events')->with('success', 'Event successfully uploaded.');
    }

    public function edit($id)
    {
        $event = events::find($id);
        $event = events::all();

        if (!$event) {
            abort(404);
        }

        return view('admin.edit_event', compact('event', 'events'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'location' => 'required|string',
            'remaining_quota' => 'required|integer',
            'event_date' => 'required|date',
            'expired_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        $data = $request->only([
            'title', 'image', 'description', 'location',
            'event_date', 'expired_date', 'start_time', 'end_time'
        ]);

        // Jika ada gambar baru, simpan dan update
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/events'), $imageName);
            $data['image'] = $imageName;
        }

        $event->update($data);

        return redirect()->route('admin.events')->with('success', 'Event successfully updated.');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.ticketboard')->with('success', 'Event successfully deleted.');
    }
}