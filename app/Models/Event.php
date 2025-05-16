<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'quota', 
    ];

    /**
     * Relasi: Event memiliki banyak tiket.
     */
    public function events()
    {
        return $this->hasMany(event::class);
    }
}