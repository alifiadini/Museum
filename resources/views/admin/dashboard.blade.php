<!-- resources/views/admin/dashboard.blade.php -->  
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

        <title>{{ config('app.name', 'Museum') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css" integrity="sha512-d0olNN35C6VLiulAobxYHZiXJmq+vl+BGIgAxQtD5+kqudro/xNMvv2yIHAciGHpExsIbKX3iLg+0B6d0k4+ZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" />
        <link rel="stylesheet" href="{{'/assets/css/dashboard.css'}}">
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

        {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> --}}
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script> --}}
        {{-- <script src="{{'/assets/js/dashboard.js'}}"></script> --}}
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body> 
        <div class="main-wrap vw-100 d-lg-flex position-relative">
            <nav class="col-lg-3 col-xxl-2 h-lg-100 w-md-100 bg-nav side-nav position-fixed z-index-99 py-4 px-4 lg-pe-0">
                <div class="h-100 d-flex flex-column flex-shrink-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center py-3 px-4 mt-lg-2 py-3 pt-lg-4">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="16" cy="16" r="16" fill="#3751FF"/>
                                <path d="M11 10C11 9.44772 11.4477 9 12 9H15.9905C18.2127 9 19.9333 9.60955 21.1524 10.8287C22.3841 12.0478 23 13.765 23 15.9803C23 18.2088 22.3841 19.9391 21.1524 21.1713C19.9333 22.3904 18.2127 23 15.9905 23H12C11.4477 23 11 22.5523 11 22V10Z" fill="url(#paint0_linear_0_1)"/>
                                <defs>
                                    <linearGradient id="paint0_linear_0_1" x1="11" y1="9" x2="23" y2="23" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white" stop-opacity="0.7"/>
                                        <stop offset="1" stop-color="white"/>
                                    </linearGradient>
                                </defs>
                            </svg>
                            <p class="fs-4 fw-bold ms-2 mb-0" id="siteName">Museum Purbakala Banten</p>
                        </div>
                        <button class="navbar-toggler d-lg-none p-4" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                            {{-- <span class="navbar-toggler-icon">yyyy</span> --}}
                            <i class="fa-solid fa-bars-staggered"></i>
                        </button>
                    </div>
                    <ul class="d-none d-lg-block flex-column mb-auto nav mt-4 text-gray-400">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link px-4 py-3" aria-current="page">
                                <i class="fa-solid fa-house-chimney"></i>
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link px-4 py-3 {{ request()->is('admin/dashboard') ? 'active' : '' }}" aria-current="page">
                                <i class="fa-solid fa-laptop"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.ticketboard') }}" class="nav-link px-4 py-3 {{ request()->is('admin/ticketboard*') ? 'active' : '' }}">
                                <i class="fa-solid fa-ticket"></i>
                                Ticketboard
                            </a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.events') }}" class="nav-link px-4 py-3 {{ request()->is('admin/events*') ? 'active' : '' }}">
                                <i class="fa-solid fa-ticket"></i>
                                Events
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="offcanvas offcanvas-dark h-100 w-100" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Offcanvas Title</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                <ul class="list-unstyled">
                    <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link px-4 py-3" aria-current="page">
                        <i class="fa-solid fa-house-chimney"></i>
                        Home
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link px-4 py-3 {{ request()->is('admin/dashboard') ? 'active' : '' }}" aria-current="page">
                        <i class="fa-solid fa-laptop"></i>
                        Dashboard
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('admin.ticketboard') }}" class="nav-link px-4 py-3 {{ request()->is('admin/ticketboard*') ? 'active' : '' }}">
                        <i class="fa-solid fa-ticket"></i>
                        Ticketboard
                    </a>
                    </li>
                </ul>
                </div>
            </div>
            

            <main class="col-lg-9 col-xxl-10 ms-lg-auto mt-lg-0 pt-lg-0 mt-4 py-6">
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
                @endsection

                @yield('content')

            </main>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>      
        
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
    </body>
</html>