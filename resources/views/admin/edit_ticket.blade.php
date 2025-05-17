@extends('layouts.admin_app')

@section('content')

{{-- <section class="container-fluid px-4 py-4">
    <div class="card">
        <div class="p-5 pb-1">
            <div>
                <h3 class="fs-19 fw-bold">Edit Ticket</h3>
                <p class="fs-12"><span class="text-gray-300">Group:</span> Support</p>
            </div>
        </div>
        <form class="row g-3 card-body p-5 pt-4" action="{{ route('admin.ticketboard.update', $ticket->id) }}" method="POST">
                @csrf
                @method('PUT')
            <div class="col-12">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $ticket->name }}" required>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="price_anak_anak" class="form-label">Price (Anak-Anak)</label>
                    <input type="text" class="form-control" id="price_anak_anak" name="price_anak_anak" value="{{ $ticket->price_anak_anak }}" required>
                </div>

                <div class="mb-3">
                    <label for="price_mahasiswa" class="form-label">Price (Mahasiswa)</label>
                    <input type="text" class="form-control" id="price_mahasiswa" name="price_mahasiswa" value="{{ $ticket->price_mahasiswa }}" required>
                </div>

                <div class="mb-3">
                    <label for="price_dewasa" class="form-label">Price (Dewasa)</label>
                    <input type="text" class="form-control" id="price_dewasa" name="price_dewasa" value="{{ $ticket->price_dewasa }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="total_quota" class="form-label">Total Quota</label>
                        <input type="text" class="form-control" id="total_quota" name="total_quota" value="{{ $ticket->total_quota }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="remaining_quota" class="form-label">Remaining Quota</label>
                        <input type="text" class="form-control bg-warning" id="remaining_quota" name="remaining_quota" value="({{ $ticket->remaining_quota }}) cannot edit this filed！" required readonly>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="event_date" class="form-label">Event Date</label>
                    <input type="date" class="form-control" id="event_date" name="event_date" value="{{ $ticket->event_date }}" required>
                </div>
    
                <div class="mb-3">
                    <label for="expiry_date" class="form-label">Expiry Date</label>
                    <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ $ticket->expiry_date }}" required>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Update Ticket</button>
            </div>
        </form>
    </div>
</section> --}}

    <div class="container-fluid">
        <h1 class="mt-4">Edit Ticket</h1>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Edit Ticket
            </div>
            <div class="card-body">
                <form action="{{ route('admin.ticketboard.update', $ticket->id) }}" class="row g-3 card-body p-5 pt-4" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="col-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $ticket->name }}" required>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="price_anak_anak" class="form-label">Price (Anak-Anak)</label>
                            <input type="text" class="form-control" id="price_anak_anak" name="price_anak_anak" value="{{ $ticket->price_anak_anak }}" required>
                        </div>
        
                        <div class="mb-3">
                            <label for="price_mahasiswa" class="form-label">Price (Mahasiswa)</label>
                            <input type="text" class="form-control" id="price_mahasiswa" name="price_mahasiswa" value="{{ $ticket->price_mahasiswa }}" required>
                        </div>
        
                        <div class="mb-3">
                            <label for="price_dewasa" class="form-label">Price (Dewasa)</label>
                            <input type="text" class="form-control" id="price_dewasa" name="price_dewasa" value="{{ $ticket->price_dewasa }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="total_quota" class="form-label">Total Quota</label>
                                <input type="text" class="form-control" id="total_quota" name="total_quota" value="{{ $ticket->total_quota }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="remaining_quota" class="form-label">Remaining Quota</label>
                                {{-- <div class="form-text fs-12 text-danger">Cannot edit this field!.</div>  --}}
                                <input type="text" class="form-control bg-warning" id="remaining_quota" name="remaining_quota" value="{{ $ticket->remaining_quota }}" required readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="event_date" class="form-label">Event Date</label>
                            <input type="date" class="form-control" id="event_date" name="event_date" value="{{ $ticket->event_date }}" required>
                        </div>
            
                        <div class="mb-3">
                            <label for="expiry_date" class="form-label">Expiry Date</label>
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ $ticket->expiry_date }}" required>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Update Ticket</button>
                    </div>
                    {{-- <button type="submit" class="btn btn-primary">Update Ticket</button> --}}
                </form>
            </div>
        </div>
    </div>
    <canvas id="ticketChart" width="0" height="0" style="display: none"></canvas>
    <canvas id="lineChart" width="0" height="0" style="display: none"></canvas>
@endsection
