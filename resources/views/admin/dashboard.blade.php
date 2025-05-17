@extends('layouts.admin_app')

@section('content')

    <header class="d-flex flex-row mb-3 pt-4 pb-3 px-5 justify-content-between align-items-center" >
        <h1 class="fs-4 fw-bold">Dahsboard Overview</h1>
        <ul class="d-flex align-items-center">
            <li class="d-flex align-items-center">
                <p class="d-none d-md-inline-block mb-0 ms-4 me-3">Museum Purbakala Banten</p>
                <img src="https://placedog.net/300" class="rounded-circle avatar-img" alt="avatar">
            </li>
        </ul>
    </header>

    <section class="container-fluid px-4 py-4">
        <div class="w-2 mx-auto card flex-lg-row row bg-white">
            <div class="col-lg-9 p-5">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="fs-19 fw-bold">Today's trends</h3>
                        <p class="fs-12 text-gray-300">as of 25 May 2019, 09:41 PM</p>
                    </div>
                    <ul class="d-flex flex-row mb-2 justify-content-end">
                        
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 p-0">
                <ul id="todaysTrends" class="list-group list-group-flush border-top lg-border-top-0 lg-border-left h-lg-100 justify-content-evenly">
                </ul>
            </div>
        </div>
    </section>

    <section class="container-fluid px-4">
        <div class="row g-4" id="infoCardContainer">
            <div class="col-6 col-lg-3">
                <div class="card stats-card text-center pt-4">
                    <p class="text-gray-300 fs-19 mb-1">Ticket's</p>
                    <p class="fw-bold fs-1">{{ $homeData['totalTickets'] }}</p>
                </div>                            
            </div>

            <div class="col-6 col-lg-3">
                <div class="card stats-card text-center pt-4">
                    <p class="text-gray-300 fs-19 mb-1">User's</p>
                    <p class="fw-bold fs-1">{{ $homeData['totalUsers'] }}</p>
                </div>                            
            </div>

            <div class="col-6 col-lg-3">
                <div class="card stats-card text-center pt-4">
                    <p class="text-gray-300 fs-19 mb-1">Admin's</p>
                    <p class="fw-bold fs-1">{{ $homeData['totalAdmins'] }}</p>
                </div>                            
            </div>

            <div class="col-6 col-lg-3">
                <div class="card stats-card text-center pt-4">
                    <p class="text-gray-300 fs-19 mb-1">Transactions's</p>
                    <p class="fw-bold fs-1">{{ $homeData['totalTransactions'] }}</p>
                </div>                            
            </div>
        </div>
    </section>

    <section class="container-fluid px-4 py-4">
        <div class="w-100 card mx-auto bg-white">
            <div class="card-body table-responsive">
                <h2>User Transaction Data</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Total Transactions</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($homeData['users'] as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->transactions_count }}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="container-fluid px-4">
            <div class="row g-4">
                <div class="w-md-100 mx-auto col-lg-6">
                    <div class="card">
                        <div class="p-5 pb-0 d-flex justify-content-between">
                            <div>
                                <h3 class="fs-19 fw-bold">Unresolved Tickets</h3>
                                <p class="fs-12"><span class="text-gray-300">Group:</span> Support</p>
                            </div>
                            <a class="text-decoration-none text-accent" href="/">View Details</a>
                        </div>
                        <div class="pb-3">
                            <ul class="list-group list-group-flush" id="unresolvedContainer">
                            </ul>
                        </div>
                        <canvas id="lineChart" width="500" height="200"></canvas>
                    </div>
                </div>
                <div class="w-md-100 mx-auto col-lg-6">
                    <div class="card table-responsive">
                        <h2>Ticket Sales</h2>
                        <table class="table p-5 pb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Total Sold</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tickets as $ticket)
                                    <tr>
                                        <td>{{ $ticket->id }}</td>
                                        <td>{{ $ticket->name }}</td>
                                        <td>{{ $ticket->total_quota - $ticket->remaining_quota }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>

    <section class="container-fluid px-4 py-4">
        <div class="card">
            <canvas id="ticketChart" width="200" height="80"></canvas>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            var tickets = @json($tickets);

            // Ubah objek tiket menjadi array nilai-nilai
            var ticketArray = Object.values(tickets);

            var ticketLabels = ticketArray.map(function (ticket) {
                return ticket.name;
            });

            var totalSoldData = ticketArray.map(function (ticket) {
                return ticket.totalSold;
            });

            var ctx = document.getElementById('ticketChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ticketLabels,
                    datasets: [{
                        label: 'Total Sold',
                        data: totalSoldData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            var tickets = @json($tickets);

            // Ubah objek tiket menjadi array nilai-nilai
            var ticketArray = Object.values(tickets);

            var ticketLabels = ticketArray.map(function (ticket) {
                return ticket.name;
            });

            var totalSoldData = ticketArray.map(function (ticket) {
                return ticket.totalSold;
            });

            var ctx = document.getElementById('lineChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ticketLabels,
                    datasets: [{
                        label: 'Total Sold',
                        data: totalSoldData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection