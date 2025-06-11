<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::create([
            'name' => 'Paket Umum',
            'price_anak_anak' => 3000,
            'price_mahasiswa' => 5000,
            'price_dewasa' => 15000,
            'total_quota' => 200,
            'remaining_quota' => 200,
            'event_date' => now()->addDays(7),
            'expiry_date' => now()->addDays(7),
        ]);

        Ticket::create([
            'name' => 'Paket Pelajar',
            'price_anak_anak' => 5000,
            'price_mahasiswa' => 3000,
            'price_dewasa' => 20000,
            'total_quota' => 100,
            'remaining_quota' => 100,
            'event_date' => now()->addDays(7),
            'expiry_date' => now()->addDays(7),
        ]);

    }
}
