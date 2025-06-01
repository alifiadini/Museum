<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('remaining_quota', '>', 0)
            ->orderBy('expiry_date')
            ->get();

        return view('ticket', compact('tickets'));
    }
    
    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        // Validasi input jika diperlukan

        Ticket::create($request->all());

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket created successfully.');
    }

    // public function show(Ticket $ticket)
    // {
    //     return view('tickets.show', compact('ticket'));
    // }

    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        // Validasi input jika diperlukan

        $ticket->update($request->all());

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket updated successfully.');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index')
            ->with('success', 'Ticket deleted successfully.');
    }


    public function show($id)
    {
        $ticket = Ticket::find($id);

        if (!$ticket) {
            abort(404);
        }

        return view('show', compact('ticket'));
    }

    public function calculateTotalAmount(Request $request)
    {
        $quantityAnakAnak = $request->input('quantity_anak_anak', 0);
        $quantityMahasiswa = $request->input('quantity_mahasiswa', 0);
        $quantityDewasa = $request->input('quantity_dewasa', 0);

        $priceAnakAnak = $request->input('price_anak_anak', 0);
        $priceMahasiswa = $request->input('price_mahasiswa', 0);
        $priceDewasa = $request->input('price_dewasa', 0);

        $totalAmount = ($quantityAnakAnak * $priceAnakAnak) + ($quantityMahasiswa * $priceMahasiswa) + ($quantityDewasa * $priceDewasa);
        $request->session()->put('totalAmount', $totalAmount);
        
        return response()->json(['totalAmount' => number_format($totalAmount, 2)]);
    }
}
