@extends('layouts.app')

@section('content')
    @include('navbar')
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">

    <div class="video-container">
        <video loop muted autoplay>
            <source src="{{ asset('/assets/images/video.mp4') }}" type="video/mp4">
        </video>
        <div class="overlay">
            <div class="centered-text">
                {{-- <h1>Muyyayan Ghatong!</h1> --}}
                <h1>WELCOME TO MUSEUM PURBAKALA BANTEN!</h1>
            </div>
        </div>
    </div>

    <svg id="about" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DFD0B8" fill-opacity="1" d="M0,256L60,234.7C120,213,240,171,360,160C480,149,600,171,720,202.7C840,235,960,277,1080,277.3C1200,277,1320,235,1380,213.3L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    <div class="about-content" style="background-color: #DFD0B8">
        <div class="Info" data-aos="fade-right" data-aos-delay="300" data-aos-duration="2000">
            <h2>ABOUT</h2>
            <div class="styled-list" data-aos="fade-right" data-aos-delay="300" data-aos-duration="2000">
                <b>
                    Selamat datang di Museum Purbakala Banten, tempat yang menyimpan dan memamerkan kekayaan budaya dari wilayah Banten dengan bangga.
                </b>
                <br>
                <br>

                Terletak di Banten Lama, museum kami adalah pusat sejarah, seni, dan eksplorasi budaya yang hidup. Dibangun dengan misi untuk merayakan dan mempromosikan tradisi dan kisah-kisah beragam dari Banten, kami mengundang Anda untuk memulai perjalanan yang menarik melalui waktu dan warisan.
                <br><br>
                <b>Hal Menarik dari Museum Banten:</b>
                <br>
                <ol>
                    <li>Koleksi Artefak yang Indah: Jelajahi berbagai macam artefak, mulai dari benda purba hingga karya seni kontemporer, masing-masing menceritakan kisah unik evolusi budaya Lampung.</li>
                    <li>Pameran Budaya: Nikmati pameran dinamis yang memamerkan tradisi, ritual, dan cerita rakyat yang memberi identitas pada Lampung.</li>
                    <li>Pembelajaran Interaktif: Terlibat dalam tayangan interaktif dan program pendidikan yang dirancang untuk memberikan pemahaman langsung tentang warisan budaya Lampung.</li>
                    <li>Keterlibatan Masyarakat: Bergabunglah dengan kami untuk memupuk rasa komunitas dengan berpartisipasi dalam acara budaya, lokakarya, dan proyek kolaboratif.</li>        
                </ol>
                Di Museum Purbakala Banten, kami percaya pada kekuatan pelestarian dan pendidikan budaya. Mari temukan kekayaan warisan Lampung bersama kami, dan biarkan masa lalu menyinari masa kini.    
            </div>
        </div>

        <div class="image-container">
            <img src="{{ asset('/assets/images/museum.jpg') }}" alt="">
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DFD0B8" fill-opacity="1" d="M0,224L48,234.7C96,245,192,267,288,240C384,213,480,139,576,144C672,149,768,235,864,234.7C960,235,1056,149,1152,101.3C1248,53,1344,43,1392,37.3L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    
    <section class="section">
        <h1 class="fw-bold">Gallery Museum Purbakala Banten</h1>
        <div class="grid">
            <div class="item" >
              <div class="item__details">
                Gentong Barrel
              </div>
            </div>
            <div class="item item--large">
              <div class="item__details">
                Kerpus 
              </div>
            </div>
            <div class="item item--medium">
              <div class="item__details">
                Patung Pande Emas
              </div>
            </div>
            <div class="item item--large">
              <div class="item__details">
                Meriam Voc
              </div>
            </div>
            <div class="item item--full">
              <div class="item__details">
                 Celengan
              </div>
            </div>
            <div class="item item--medium">
              <div class="item__details">
                Cermin
              </div>
            </div>
            <div class="item item--large">
              <div class="item__details">
                Arca Nandi
              </div>
            </div>
            <div class="item">
              <div class="item__details">
                Timbangan VOC
              </div>
            </div>
            <div class="item item--medium">
              <div class="item__details">
                Hiasan Terokota
              </div>
            </div>
            <div class="item item--large">
              <div class="item__details">
                Kendi Arca
              </div>
            </div>
            <div class="item">
              <div class="item__details">
                Rumah Kenali
              </div>
            </div>
            <div class="item item--medium">
              <div class="item__details">
                Kendi Susu
              </div>
            </div>
            <div class="item--large">
              <div class="item__details">
                Patung Lembu
              </div>
              </div>
            <div class="item">
              <div class="item__details">
                Tombak
              </div>
            </div>
          </div>
    </section>

    <svg id="about" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DFD0B8" fill-opacity="1" d="M0,256L60,234.7C120,213,240,171,360,160C480,149,600,171,720,202.7C840,235,960,277,1080,277.3C1200,277,1320,235,1380,213.3L1440,192L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
    <section class="section" id="event" style="background-color: #DFD0B8">
        <h1 class="fw-bold">Event</h1>
        <div class="d-flex flex-wrap justify-content-center" style="gap: 50px">
          @foreach ($events as $event)
              <div class="card w-25 bg-base-100 shadow-xl" data-aos="fade-up" data-aos-delay="100">
                  <figure class="w-100 h-56 ">
                  <img src="{{ asset('images/events/' . $event->image) }}" alt="kucing" class="object-cover h-56 w-100" /></figure>
                  <div class="card-body"> 
                      <div class="d-flex justify-content-end">
                          <div class="badge text-bg-secondary" style="font-size: 12px;">{{ $event->location }}</div>
                      </div>
                      <h2 class="fs-4">
                          {{ $event->title }}
                      </h2>
                      <p>{{ $event->description }}</p>
                      <div>
                        <p class="fw-bold my-0 py-0" style="font-size: 12px;">Start: {{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('d F Y') }} {{ \Carbon\Carbon::parse($event->start_time)->translatedFormat('H:m') }}</p>
                        <p class="fw-bold my-0 py-0" style="font-size: 12px;">End: {{ \Carbon\Carbon::parse($event->end_date)->translatedFormat('d F Y') }} {{ \Carbon\Carbon::parse($event->end_time)->translatedFormat('H:m') }}</p>
                      </div>
                  </div>
              </div>
            
          @endforeach
        </div>
    </section>
    

    <div id="footer" class="footer">
        <div class="row footer">
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
                    src="https://www.google.com/maps/place/Museum+Situs+Kepurbakalaan+Banten+Lama/@-6.036206,106.1532561,17z/data=!3m1!4b1!4m6!3m5!1s0x2e418cd503245f25:0x32ba6d5b3f4ae62c!8m2!3d-6.0362113!4d106.155831!16s%2Fg%2F11b7k0bfdx?entry=ttu&g_ep=EgoyMDI1MDUxMy4xIKXMDSoASAFQAw%3D%3D">
                </iframe>
            </div>
        </div>

        <p class=" text-center">&copy; 2025 dins. All rights reserved.</p>
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
