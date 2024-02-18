<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $transactions = Transaction::where('user_id', $user->id)->orderBy('transaction_date', 'desc')->get();
        return view('profile', compact('user', 'transactions'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {   
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'current_password' => 'required_with:name,email|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
    
        if (($request->filled('name') || $request->filled('email')) && !Hash::check($request->current_password, $user->password)) {
            
            if ($request->missing('current_password')) {
                return redirect()->route('profile.show')->with('error', 'Current password is required.');
            } else {
                return redirect()->route('profile.show')->with('error', 'Current password is incorrect.');
            }
        }
    
        $user->name = $request->name;
        $user->email = $request->email;
    
        // Update password only if a new one is provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }

    public function cancelTransaction($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);

        // Pastikan bahwa pengguna hanya dapat membatalkan transaksi mereka sendiri
        if (Auth::user()->id != $transaction->user_id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $totalCancelled = $transaction->quantity_anak_anak + $transaction->quantity_mahasiswa + $transaction->quantity_dewasa;

        // Kembalikan remaining_quota
        $ticket = $transaction->ticket;
        $ticket->remaining_quota += $totalCancelled;
        $ticket->save();

        // Hapus transaksi
        $transaction->delete();

        return redirect()->back()->with('success', 'Transaction cancelled successfully.');
    }

}
