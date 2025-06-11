@extends('layouts.app')

@section('content')
    @include('navbar')
    <link rel="stylesheet" href="{{ asset('/assets/css/ticket.css') }}">

<div class="body">
    <h2 style="opacity: 0">Pricing</h2>
    <section class="pricing">
        <div class="Ccontainer">
        <h2>Ticket List</h2>
          <div class="pricing__grid">
            @foreach($tickets as $ticket)
                <div class="card">
                    <h3 class="card__title">{{ $ticket->name }}</h3>
                    <p class="card__price">Rp.{{ $ticket->price_mahasiswa }}<span>/Anak-anak</span></p>
                    <p class="card__price">Rp.{{ $ticket->price_dewasa }}<span>/Dewasa</span></p>
                    <div class="card__body">
                        <p><strong>Total Quota </strong>{{ $ticket->total_quota }}</p>
                        <p><strong>Remaining Quota </strong>{{ $ticket->remaining_quota }}</p>
                        <p>Expired Ticket in <strong>{{ \Carbon\Carbon::parse($ticket->expiry_date)->format('l, d F Y') }}</strong></p>
                    </div>
                    <a href="{{ route('ticket.show', $ticket->id) }}" class="button button--card" role="button">Buy Now</a>
                </div>
            @endforeach
          </div>
        </div>
      </section>
</div>
@endsection

