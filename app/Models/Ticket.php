<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price_anak_anak',
        'price_mahasiswa',
        'price_dewasa',
        'total_quota',
        'remaining_quota',
        'event_date',
        'expiry_date',
    ];
}
