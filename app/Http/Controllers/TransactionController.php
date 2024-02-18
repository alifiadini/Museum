<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Transaction;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Milon\Barcode\DNS1D;

class TransactionController extends Controller
{
    public function show($transactionId)
    {
        $transaction = Transaction::with(['user', 'ticket'])->findOrFail($transactionId);
       
        return view('receipt', compact('transaction'));
    }

    public function purchaseTicket(Request $request)
    {

        $request->validate([
            'ticket_id' => 'required',
            'quantity_anak_anak' => 'required|integer|min:0',
            'quantity_mahasiswa' => 'required|integer|min:0',
            'quantity_dewasa' => 'required|integer|min:0',
            'booking_date' => 'required|date', 
        ]);

        $ticketId = $request->input('ticket_id');
        $quantityAnakAnak = $request->input('quantity_anak_anak', 0);
        $quantityMahasiswa = $request->input('quantity_mahasiswa', 0);
        $quantityDewasa = $request->input('quantity_dewasa', 0);
        $bookingDate = $request->input('booking_date');
        

        $ticket = Ticket::findOrFail($ticketId);

        $totalPurchased = $quantityAnakAnak + $quantityMahasiswa + $quantityDewasa;
        
        if ($ticket->remaining_quota < $quantityAnakAnak + $quantityMahasiswa + $quantityDewasa) {
            return redirect()->back()->with('error', 'Not enough tickets available.');
        }

        // Update remaining_quota
        $ticket->remaining_quota -= $totalPurchased;
        $ticket->save();
        
        $totalAmount = $this->calculateTotalAmount($ticket, $quantityAnakAnak, $quantityMahasiswa, $quantityDewasa);

        $newTransaction = Transaction::create([
            'user_id' => auth()->id(),
            'tickets_id' => $ticket->id,
            'quantity_anak_anak' => $quantityAnakAnak,
            'quantity_mahasiswa' => $quantityMahasiswa,
            'quantity_dewasa' => $quantityDewasa,
            'total_amount' => $totalAmount,
            'transaction_date' => now(),
            'booking_date' => $bookingDate,
        ]);

        $ticket->decrement('remaining_quota', $quantityAnakAnak + $quantityMahasiswa + $quantityDewasa);

        $barcodeValue = implode('', [
            $newTransaction->user_id,
            $newTransaction->ticket_id,
            $newTransaction->quantity_anak_anak,
            $newTransaction->quantity_mahasiswa,
            $newTransaction->quantity_dewasa,
            $newTransaction->total_amount,
            $newTransaction->transaction_date->timestamp,
            $newTransaction->booking_date,
        ]);

        $barcode = new DNS1D();
        $barcode->setStorPath(storage_path('app/public/bar'));
    
        $barcodePath = $barcode->getBarcodePNGPath($barcodeValue, 'C128', 2, 60);
        $barcodeBase64 = base64_encode(file_get_contents($barcodePath));

        $newTransaction->barcode = substr($barcodeBase64, 0, 255);
        $newTransaction->save();

        return redirect()->route('receipt.show', ['transactionId' => $newTransaction->id]);
    }

    private function calculateTotalAmount(Ticket $ticket, $quantityAnakAnak, $quantityMahasiswa, $quantityDewasa)
    {
        $totalAmount = ($quantityAnakAnak * $ticket->price_anak_anak) +
                       ($quantityMahasiswa * $ticket->price_mahasiswa) +
                       ($quantityDewasa * $ticket->price_dewasa);

        return $totalAmount;
    }

    private function generatePDF($transaction)
    {
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // Load the view file
        $html = view('receipt', compact('transaction'))->render();

        // Load HTML content to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (first pass to get total pages)
        $dompdf->render();

        // Save the generated PDF
        $dompdf->stream();

        return $dompdf;
    }

    public function downloadPDF($transactionId)
    {
        // Cek status download dari session storage
        $statusKey = 'pdf_download_' . $transactionId;
        if (session($statusKey, true)) {
            // Generate PDF
            $transaction = Transaction::findOrFail($transactionId);
            $pdf = $this->generatePDF($transaction);

            // Set status download ke false agar tidak dapat di-download lagi
            session([$statusKey => false]);

            // Set the content type of the response
            $headers = [
                'Content-Type' => 'application/pdf',
            ];

            // Return the response with the PDF file
            return Response::download($pdf->output(), 'receipt.pdf', $headers);
        } else {
            // Redirect jika PDF sudah didownload sebelumnya
            return redirect()->route('receipt.show', ['transactionId' => $transactionId]);
        }
    }

}
