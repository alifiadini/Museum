<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $homeData = $this->home();
        $tickets = Ticket::all(); 
        $tickets = $tickets->map(function ($ticket) {
            $ticket->totalSold = $ticket->total_quota - $ticket->remaining_quota;
            return $ticket;
        });
    
        $tickets = $tickets->sortByDesc('totalSold');    

        if (is_array($homeData)) {
            return view('admin.dashboard', compact('homeData','tickets'));
        } else {
            return view('admin.dashboard', [
                'totalTickets' => 0,
                'totalUsers' => 0,
                'totalAdmins' => 0,
                'totalTransactions' => 0,
                'users' => $homeData['users'],
            ], compact('homeData'));
        }
    }

    public function home()
    {
        $totalTickets = Ticket::count();
        $totalUsers = User::where('role', 'user')->count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalTransactions = Transaction::count();
        $users = User::withCount('transactions')->get();

        return [
            'totalTickets' => $totalTickets,
            'totalUsers' => $totalUsers,
            'totalAdmins' => $totalAdmins,
            'totalTransactions' => $totalTransactions,
            'users' => $users,
        ];
    }

    public function ticketboard()
    {
        $homeData = $this->home(); 
        $tickets = Ticket::all();

        return view('admin.ticketboard', compact('tickets', 'homeData'));
    }

    public function events()
    {
        $homeData = $this->home(); 
        $tickets = Ticket::all();

        return view('admin.events', compact('tickets', 'homeData'));
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
    
        return view('admin.edit_ticket', compact('ticket','homeData','tickets'));
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
