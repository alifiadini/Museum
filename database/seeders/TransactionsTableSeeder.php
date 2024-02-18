<?php
namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil tiket dengan ID tertentu (sesuaikan ID dengan data tiket yang tersedia)
        $ticket = Ticket::find(1);

        // Pastikan tiket dengan ID tersebut ditemukan
        if ($ticket) {
            // Buat transaksi dummy
            $transaction = Transaction::create([
                'user_id' => 1,
                'ticket_id' => $ticket->id,
                'quantity_anak_anak' => 2,
                'quantity_mahasiswa' => 1,
                'quantity_dewasa' => 3,
                'total_amount' => $this->calculateTotalAmount($ticket, 2, 1, 3),
                'transaction_date' => now(),
                'booking_date',
            ]);

            // Generate and set barcode value
            $barcodeValue = $this->generateBarcodeValue($transaction);
            $transaction->update(['barcode' => $barcodeValue]);
        } else {
            $this->command->error('Tiket dengan ID 1 tidak ditemukan.'); 
        }
    }

    private function generateBarcodeValue(Transaction $transaction)
    {
        return $transaction->user_id . '-' . $transaction->ticket_id . '-' . 
               $transaction->quantity_anak_anak . '-' . $transaction->quantity_mahasiswa . '-' . 
               $transaction->quantity_dewasa . '-' . $transaction->total_amount . '-' . 
               $transaction->transaction_date;
    }

    private function calculateTotalAmount(Ticket $ticket, $quantityAnakAnak, $quantityMahasiswa, $quantityDewasa)
    {
        return ($quantityAnakAnak * $ticket->price_anak_anak) +
               ($quantityMahasiswa * $ticket->price_mahasiswa) +
               ($quantityDewasa * $ticket->price_dewasa);
    }
}

