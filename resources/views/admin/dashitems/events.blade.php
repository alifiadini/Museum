{{-- resources/views/admin/dashitems/ticketboard.blade.php --}}

@extends('admin.dashboard')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Event Management</h1>

        <div class="card mb-4">
            <div class="card-header">
                <p>
                    <i class="fas fa-table me-1"></i>
                    Event
                </p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTicketModal">
                    Upload Event
                </button>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tittle</th>
                                <th>Descripsion</th>
                                <th>Location</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Quota</th>
                        </thead>
                        <tbody>
                            @foreach ($event as $events)
                                <tr>
                                    <td>{{ $events->tittle }}</td>
                                    <td>{{ $events->Descripsion }}</td>
                                    <td>{{ $events->location }}</td>
                                    <td>{{ \Carbon\Carbon::parse($events->start_date)->format('l, d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($events->end_date)->format('l, d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($events->start_time)->format('H,:i:s') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($events->end_time)->format('H,:i:s') }}</td>
                                     <td>{{ $events->remaining_quota }}</td>                        
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('events.dashboard.edit', $events->id) }}" class="btn btn-warning me-2">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <form action="{{ route('events.dashboard.destroy', $events->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the {{ $events->tittle }} event?')" style="margin-bottom: 0;">
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
                        <div class="col-md-6">
                            <label for="price_anak_anak" class="form-label">Price (Anak-Anak)</label>
                            <input type="number" class="form-control" id="price_anak_anak" name="price_anak_anak" required>
                        </div>
                        <div class=" col-md-6">
                            <label for="price_mahasiswa" class="form-label">Price (Mahasiswa)</label>
                            <input type="number" class="form-control" id="price_mahasiswa" name="price_mahasiswa" required>
                        </div>
                        <div class="mb-3">
                            <label for="price_dewasa" class="form-label">Price (Dewasa)</label>
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