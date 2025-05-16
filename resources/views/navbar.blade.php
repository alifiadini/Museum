    <style>
        nav.navbar {
            position: fixed;
            width: 100%;
            top: 0;
            background-color: #1e212600;
            backdrop-filter: blur(40px) saturate(85%) contrast(100%);
            -webkit-backdrop-filter: blur(16px) saturate(100%) contrast(100%);
            z-index: 999999;
            transition: background-color 0.5s ease;
        }
    
        nav.navbar,
        nav.navbar a,
        nav.navbar .nav-link,
        nav.navbar .navbar-brand,
        nav.navbar .dropdown-menu a {
            color: white !important;
        }
    
        .dropdown-menu {
            background-color: rgba(30, 33, 38, 0.9);
        }
    
        .dropdown-menu a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
    </style>
<nav class="navbar navbar-expand-md navbar-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('/assets/images/siger.png') }}" alt="" style="max-height: 50px; margin-right: 2px;">
            <span>MUPURBA</span>
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            {{-- <ul class="navbar-nav me-auto"></ul> --}}

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav justify-content-center w-100">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#footer">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#event">Event</a>
                </li>
                </ul>
            <ul class="navbar-nav ms-auto">
            @guest
                    @if (Route::has('login'))
                        <li class="nav-item me-1">
                            <a class="nav-link" href="{{ route('login') }}" style="border: 1px solid #ffffff80; border-radius: 8px; padding: 6px 12px; color: white !important; transition: 0.3s;">
                                {{ __('Login') }}
                            </a>
                        </li>
                    @endif
                
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}" style="border: 1px solid #ffffff80; border-radius: 8px; padding: 6px 12px; color: white !important; transition: 0.3s;">
                                {{ __('Register') }}
                            </a>
                        </li>
                    @endif  
                @else          
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ticket.index') }}">Tiket</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @auth
                                @if(Auth::user()->isAdmin())
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>   
                                @endif
                            @endauth
                            <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
        
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
            @endguest
            </ul>
        </div>
    </div>
</nav>