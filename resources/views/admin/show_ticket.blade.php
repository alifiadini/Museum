@extends('layouts.admin_app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Ticket Detail</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Ticket Information
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> {{ $ticket->name }}</p>
                        <p><strong>Price (Anak-Anak):</strong> ${{ $ticket->price_anak_anak }}</p>
                        <p><strong>Price (Mahasiswa):</strong> ${{ $ticket->price_mahasiswa }}</p>
                        <p><strong>Price (Dewasa):</strong> ${{ $ticket->price_dewasa }}</p>
                        <p><strong>Total Quota:</strong> {{ $ticket->total_quota }}</p>
                        <p><strong>Remaining Quota:</strong> {{ $ticket->remaining_quota }}</p>
                        <p><strong>Event Date:</strong> {{ $ticket->event_date }}</p>
                        <p><strong>Expiry Date:</strong> {{ $ticket->expiry_date }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
