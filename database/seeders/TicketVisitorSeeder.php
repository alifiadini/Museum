<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\TicketVisitor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketVisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TicketVisitor::create([
            'name' => 'Anak-anak',
            'price' => '2000',
            'id_ticket' => Ticket::inRandomOrder()->value('id')
        ]);
        TicketVisitor::create([
            'name' => 'Dewasa',
            'price' => '8000',
            'id_ticket' => Ticket::inRandomOrder()->value('id')
        ]);
        TicketVisitor::create([
            'name' => 'Pelajar',
            'price' => '5000',
            'id_ticket' => Ticket::inRandomOrder()->value('id')
        ]);
        TicketVisitor::create([
            'name' => 'Pendamping',
            'price' => '6000',
            'id_ticket' => Ticket::inRandomOrder()->value('id')
        ]);
    }
}
