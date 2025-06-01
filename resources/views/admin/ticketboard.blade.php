@extends('layouts.admin_app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Ticket Management</h1>

        <div class="card mb-4">
            <div class="card-header">
                <p>
                    <i class="fas fa-table me-1"></i>
                    Ticket List
                </p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTicketModal">
                    Add Ticket
                </button>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price (Pelajar)</th>
                                <th>Price (Umum)</th>
                                <th>Total Quota</th>
                                <th>Remaining Quota</th>
                                <th>Event Date</th>
                                <th>Expiry Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>{{ $ticket->name }}</td>
                                    <td>Rp.{{ $ticket->price_pelajar }}</td>
                                    <td>Rp.{{ $ticket->price_umum }}</td>
                                    <td>{{ $ticket->total_quota }}</td>
                                    <td>{{ $ticket->remaining_quota }}</td>
                                    <td>{{ \Carbon\Carbon::parse($ticket->event_date)->format('l, d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($ticket->expiry_date)->format('l, d F Y') }}</td>
                                    
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.ticketboard.edit', $ticket->id) }}" class="btn btn-warning me-2">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <form action="{{ route('admin.ticketboard.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the {{ $ticket->name }} ticket?')" style="margin-bottom: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <canvas id="ticketChart" width="0" height="0" style="display: none"></canvas>
    <canvas id="lineChart" width="0" height="0" style="display: none"></canvas>

    <div class="modal fade" id="addTicketModal" tabindex="-1" aria-labelledby="addTicketModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="addTicketModalLabel">Add Ticket</h5>
                    <form class="row g-1 card-body p-3 pt-1"action="{{ route('admin.ticketboard.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class=" col-md-6">
                            <label for="price_pelajar" class="form-label">Price (Pelajar)</label>
                            <input type="number" class="form-control" id="price_mahasiswa" name="price_mahasiswa" required>
                        </div>
                        <div class="mb-3">
                            <label for="price_umum" class="form-label">Price (Umum)</label>
                            <input type="number" class="form-control" id="price_dewasa" name="price_dewasa" required>
                        </div>
                        <div class="col-md-6  mb-3">
                            <label for="total_quota" class="form-label">Total Quota</label>
                            <input type="number" class="form-control" id="total_quota" name="total_quota" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="remaining_quota" class="form-label">Remaining Quota</label>
                            <input type="number" class="form-control" id="remaining_quota" name="remaining_quota" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="event_date" class="form-label">Event Date</label>
                            <input type="date" class="form-control" id="event_date" name="event_date" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="expiry_date" class="form-label">Expiry Date</label>
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Ticket</button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Aktifkan modal saat halaman dimuat
        $(document).ready(function () {
            $('#addTicketModal').modal('show');
        });
    
        // Reset form saat modal ditutup
        $('#addTicketModal').on('hidden.bs.modal', function () {
            $('#addTicketModal form')[0].reset();
        });
    </script>

@endsection
