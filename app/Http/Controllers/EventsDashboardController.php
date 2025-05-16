<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Http\Request;

class EventsDashboardController extends Controller
{
    public function index()
    {
        $events = Event::all(); 
        $event = $events->map(function ($events) {
            $events->totalSold = $events->total_quota - $events->remaining_quota;
            return $events;
        });
    
        $event = $events->sortByDesc('totalSold');   
        
        return view('admin.dashitems.events', compact('event'));
    }

    public function events()
    {
        $tickets = Ticket::all();

        return view('admin.dashitems.events', compact('tickets'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'price_anak_anak' => 'required|numeric',
            'price_mahasiswa' => 'required|numeric',
            'price_dewasa' => 'required|numeric',
            'total_quota' => 'required|integer',
            'remaining_quota' => 'required|integer',
            'event_date' => 'required|date',
            'expiry_date' => 'required|date',
        ]);

        // Simpan tiket ke dalam database
        Ticket::create($request->all());

        return redirect()->route('admin.ticketboard')->with('success', 'Ticket added successfully.');
    }

    public function edit($id)
    {
        $homeData = $this->home();
        $ticket = Ticket::find($id);
        $tickets = Ticket::all();

        if (!$ticket) {
            abort(404);
        }
    
        return view('admin.dashitems.edit_ticket', compact('ticket','homeData','tickets'));
    }
    
    public function update(Request $request, Ticket $ticket)
    {

        $request->validate([
            'name' => 'required|string',
            'price_anak_anak' => 'required|numeric',
            'price_mahasiswa' => 'required|numeric',
            'price_dewasa' => 'required|numeric',
            'total_quota' => 'required|integer',
            'remaining_quota' => 'required|integer',
            'event_date' => 'required|date',
            'expiry_date' => 'required|date',
        ]);
        
        $ticket->update([
            'name' => $request->name,
            'price_anak_anak' => $request->price_anak_anak,
            'price_mahasiswa' => $request->price_mahasiswa,
            'price_dewasa' => $request->price_dewasa,
            'total_quota' => $request->total_quota,
            'remaining_quota' => $request->remaining_quota,
            'event_date' => $request->event_date,
            'expiry_date' => $request->expiry_date,
        ]);
    
        return redirect()->route('admin.ticketboard')->with('success', 'Ticket updated successfully');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('admin.ticketboard')->with('success', 'Ticket deleted successfully');
    }
    
}
