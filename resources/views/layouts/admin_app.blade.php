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

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                                <i class="fa-solid fa-calendar-days"></i>
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
                @yield('content')
            </main>
        </div>
    </body>
</html>