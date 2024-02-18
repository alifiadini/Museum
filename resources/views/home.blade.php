@extends('layouts.app')

@section('content')
    @include('navbar')
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">

    <div class="video-container">
        <video loop muted autoplay>
            <source src="{{ asset('/assets/images/FInal-Vid.mov') }}" type="video/mp4">
        </video>
        <div class="overlay">
            <div class="centered-text">
                {{-- <h1>Muyyayan Ghatong!</h1> --}}
                <h1>Selamat Datang!</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2>
                                {{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y') }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2 id="realtime-clock"></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <svg id="about" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e1ad01" fill-opacity="1" d="M0,256L60,234.7C120,213,240,171,360,160C480,149,600,171,720,202.7C840,235,960,277,1080,277.3C1200,277,1320,235,1380,213.3L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    <div class="about-content" style="background-color: #e1ad01">
        <div class="Info" data-aos="fade-right" data-aos-delay="300" data-aos-duration="2000">
            <h2>ABOUT</h2>
            <div class="styled-list" data-aos="fade-right" data-aos-delay="300" data-aos-duration="2000">
                <b>
                    Selamat datang di Museum Lampung, tempat yang menyimpan dan memamerkan kekayaan budaya dari wilayah Lampung dengan bangga.
                </b>
                <br>
                <br>

                Terletak di pusat Lampung, museum kami adalah pusat sejarah, seni, dan eksplorasi budaya yang hidup. Dibangun dengan misi untuk merayakan dan mempromosikan tradisi dan kisah-kisah beragam dari Lampung, kami mengundang Anda untuk memulai perjalanan yang menarik melalui waktu dan warisan.
                <br><br>
                <b>Hal Menarik dari Museum Lampung:</b>
    
                <ol>
                    <li>Koleksi Artefak yang Indah: Jelajahi berbagai macam artefak, mulai dari benda purba hingga karya seni kontemporer, masing-masing menceritakan kisah unik evolusi budaya Lampung.</li>
                    <li>Pameran Budaya: Nikmati pameran dinamis yang memamerkan tradisi, ritual, dan cerita rakyat yang memberi identitas pada Lampung.</li>
                    <li>Pembelajaran Interaktif: Terlibat dalam tayangan interaktif dan program pendidikan yang dirancang untuk memberikan pemahaman langsung tentang warisan budaya Lampung.</li>
                    <li>Keterlibatan Masyarakat: Bergabunglah dengan kami untuk memupuk rasa komunitas dengan berpartisipasi dalam acara budaya, lokakarya, dan proyek kolaboratif.</li>        
                </ol>
                Di Museum Lampung, kami percaya pada kekuatan pelestarian dan pendidikan budaya. Mari temukan kekayaan warisan Lampung bersama kami, dan biarkan masa lalu menyinari masa kini.    
            </div>
        </div>

        <div class="image-container">
            <img src="{{ asset('/assets/images/depan.png') }}" alt="">
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e1ad01" fill-opacity="1" d="M0,224L48,234.7C96,245,192,267,288,240C384,213,480,139,576,144C672,149,768,235,864,234.7C960,235,1056,149,1152,101.3C1248,53,1344,43,1392,37.3L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    
    <section class="section">
        <h1>Museum Lampung Gallery</h1>
        <div class="grid">
            <div class="item" >
              <div class="item__details">
                Meriam
              </div>
            </div>
            <div class="item item--large">
              <div class="item__details">
                Bola besi 
              </div>
            </div>
            <div class="item item--medium">
              <div class="item__details">
                Batu
              </div>
            </div>
            <div class="item item--large">
              <div class="item__details">
                Lumbung padi
              </div>
            </div>
            <div class="item item--full">
              <div class="item__details">
                 Museum Lampung
              </div>
            </div>
            <div class="item item--medium">
              <div class="item__details">
                AlQuran tulis tangan
              </div>
            </div>
            <div class="item item--large">
              <div class="item__details">
                Kain tapis dan Siger
              </div>
            </div>
            <div class="item">
              <div class="item__details">
                Alat penyangga pasca sunat
              </div>
            </div>
            <div class="item item--medium">
              <div class="item__details">
                Perahu lesung
              </div>
            </div>
            <div class="item item--large">
              <div class="item__details">
                Lorong lantai satu
              </div>
            </div>
            <div class="item">
              <div class="item__details">
                Rumah Kenali
              </div>
            </div>
            <div class="item item--medium">
              <div class="item__details">
                Pernak-pernik ritual pemakaman
              </div>
            </div>
            <div class="item">
              <div class="item__details">
                Pernak pernik ritual pernikanan Saibatin
              </div>
            </div>
          </div>
    </section>

    <div id="footer" class="footer">
        <div class="row footer-section">
            <!-- Informasi Kontak -->
            <div class="col-md-4">
                <div class="footer-section">
                    <h3>Contact Information</h3>
                    <ul class="footer-links">
                        <li>
                            <p>Email: museumlampung@gmail.com</p>
                        </li>
                        <li>
                            <p>Phone: +123456789</p>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-section">
                    <h3>Route Page</h3>
                    <ul class="footer-links">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('home') }}#about">About Us</a></li>
                        <li><a href="{{ route('home') }}#footer">Contact</a></li>
                        @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ticket.index') }}">Tiket</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.show') }}">Profile</a>
                    </li>
                @endguest
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-section">
                    <h3>Our Location</h3>
                    <iframe
                    width="100%"
                    height="150"
                    frameborder="0"
                    style="border:0"
                    allowfullscreen=""
                    aria-hidden="false"
                    tabindex="0"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCaD1rEk3GVTiSa21Mpz8znAJSJB6qRBGk&q=-5.3722294,105.2409178">
                </iframe>
            </div>
        </div>

        <p class=" text-center">&copy; 2024 Your Website Name. All rights reserved.</p>
    </div>

    <script>
        function updateClock() {
            var now = new Date();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var seconds = now.getSeconds().toString().padStart(2, '0');
            var formattedTime = hours + ':' + minutes + ':' + seconds;
        
            document.getElementById('realtime-clock').innerText = formattedTime;
        }
        
        setInterval(updateClock, 1000);
        
        updateClock();
    </script>
@endsection
