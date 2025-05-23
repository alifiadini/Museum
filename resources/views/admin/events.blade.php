@extends('layouts.admin_app')

@section('content')
    <div class="container-fluid">
        <h1 class="mt-4">Event Management</h1>

        <div class="card mb-4">
            <div class="card-header">
                <p>
                    <i class="fas fa-table me-1"></i>
                    Event
                </p>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">
                    Upload Event
                </button>
            </div>
            
            <div class="card-body">

                @if ($errors->any())
            <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li> {{-- Menampilkan setiap error --}}
                @endforeach
            </ul>
            </div>
             @endif
                <div class="table-responsive text-center">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Gambar</th>
                                <th>Deskripsi</th>
                                <th>Lokasi</th>
                                <th>Mulai Event</th>
                                <th>Akhir Event</th>
                                <th>Mulai Jam</th>
                                <th>Akhir Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{ $event->title }}</td>
                                    <td>
                                    @if ($event->image)
                                    <img src="{{ asset('images/events/'. $event->image) }}" width="100" alt="Gambar Event">
                                    @else
                                        <p>Tidak ada gambar</p>
                                    @endif
                                    </td>
                                    <td>{{ $event->Descripsion }}</td>
                                    <td>{{ $event->location }}</td>
                                    <td>{{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('l, d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($event->expired_date)->translatedFormat('l, d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($event->start_time)->format('H,:i:s') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($event->end_time)->format('H,:i:s') }}</td>
                                    <td>{{ $event->remaining_quota }}</td>                        
                                        {{-- <div class="d-flex align-items-center">
                                            <a href="{{ route('events.dashboard.edit', $event->id) }}" class="btn btn-warning me-2">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            <form action="{{ route('events.dashboard.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the {{ $event->title }} event?')" style="margin-bottom: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div> --}}
                                    </td>                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <canvas id="EventChart" width="0" height="0" style="display: none"></canvas>
    <canvas id="lineChart" width="0" height="0" style="display: none"></canvas>

    <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="addTicketModalLabel">Upload Event</h5>
                    <form class="row g-1 card-body p-3 pt-1"action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="name" name="title" required>
                        </div>
                        <div class="mb-3">
                             <label for="image" class="form-label">Gambar</label>
                             <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                        </div>
                       <div class="mb-3">
                            <label for="name" class="form-label">Desripsi</label>
                            <input type="text" class="form-control" id="name" name="description" required>
                       </div> 
                       <div class="mb-3">
                            <label for="name" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="name" name="location" required>
                       </div> 
                       <div class="mb-3">
                            <label for="event_date" class="form-label">Mulai Event</label>
                            <input type="date" class="form-control" id="event_date" name="event_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="event_date" class="form-label">Akhir Date</label>
                            <input type="date" class="form-control" id="expired_date" name="expired_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="start_time" class="form-label">Mulai Jam</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_time" class="form-label">Akhir Jam</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Posting</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Aktifkan modal saat halaman dimuat
        $(document).ready(function () {
        });
    
    </script>

@endsection