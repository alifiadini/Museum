<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Transaction extends Model
{

    protected $fillable = [
        'user_id',
        'tickets_id',
        'quantity_anak_anak',
        'quantity_mahasiswa',
        'quantity_dewasa',
        'total_amount',
        'transaction_date',
        'barcode',
        'booking_date',
    ];

    public static $rules = [
        'user_id' => 'required',
        'tickets_id' => 'required',
        'quantity_anak_anak' => 'required|integer|min:0',
        'quantity_mahasiswa' => 'required|integer|min:0',
        'quantity_dewasa' => 'required|integer|min:0',
        'total_amount' => 'required|numeric|min:0',
        'transaction_date' => 'required|date',
        'booking_date' => 'required|date',
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'tickets_id');
    }
}
