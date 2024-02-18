    {{-- <div class="container">
        <div class="card">
            <h1><a href="{{ url('/') }}">Museum Lampung</a></h1>
            <div class="card-body">
                <h5 class="card-title">Transaction</h5>

                @if ($transaction->barcode)
                    <img src="data:image/png;base64,{{ $transaction->barcode }}" alt="Barcode" class="img-fluid">
                @else
                    <p>No barcode available</p>
                @endif
            
                @if ($transaction->quantity_anak_anak > 0 || $transaction->quantity_mahasiswa > 0 || $transaction->quantity_dewasa > 0)
                    <p class="card-text">
                        <strong>User:</strong> {{ $transaction->user->name }}
                        <br>
                        <strong>Ticket:</strong> {{ $transaction->ticket->name }}
                        <br>
                        <strong>Booking Date:</strong> {{ \Carbon\Carbon::parse($transaction->booking_date)->format('l, d F Y') }}
                        <br>
                        <strong>Event Date:</strong> {{ \Carbon\Carbon::parse($transaction->ticket->event_date)->format('l, d F Y') }}

                        @if ($transaction->quantity_anak_anak > 0)
                            <br>
                            <strong>Quantity (Anak-Anak):</strong> {{ $transaction->quantity_anak_anak }}
                        @endif

                        @if ($transaction->quantity_mahasiswa > 0)
                            <br>
                            <strong>Quantity (Mahasiswa):</strong> {{ $transaction->quantity_mahasiswa }}
                        @endif

                        @if ($transaction->quantity_dewasa > 0)
                            <br>
                            <strong>Quantity (Dewasa):</strong> {{ $transaction->quantity_dewasa }}
                        @endif

                        <br>
                        <strong>Total Amount:</strong> Rp.{{ number_format($transaction->total_amount, 2) }}
                        <br>

                        <strong>Transaction Date:</strong> {{ \Carbon\Carbon::parse($transaction->transaction_date)->format(' H:i l, d F Y') }}
                    </p>
                @else
                    <p>No tickets purchased</p>
                @endif
            </div>
        </div>
    </div> --}}