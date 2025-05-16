@extends('layouts.app')

@section('content')
    @include('navbar')
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DFD0B8" fill-opacity="1" d="M0,224L48,234.7C96,245,192,267,288,240C384,213,480,139,576,144C672,149,768,235,864,234.7C960,235,1056,149,1152,101.3C1248,53,1344,43,1392,37.3L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
    <section class="section" id="news" style="background-color: #f5f5f5; padding: 50px 20px;">
    <h1 class="text-center text-3xl font-bold mb-10" data-aos="fade-up">Event</h1>
    
    <div class="flex flex-row flex-wrap justify-center items-stretch gap-8">
        <!-- Kartu 1 -->
        <div class="card w-96 bg-base-100 shadow-xl" data-aos="fade-up" data-aos-delay="100">
            <figure><img src="{{ asset('assets/images/kucing.jpg') }}" alt="kucing" class="object-cover h-56 w-full" /></figure>
            <div class="card-body">
                <h2 class="card-title">
                    Funny Cat!!
                    <div class="badge badge-secondary">UPDATE</div>
                </h2>
                <p>Seekor kucing yang imut dan lucu</p>
                <div class="card-actions justify-end">
                    <div class="badge badge-outline">Animals</div> 
                    <div class="badge badge-outline">News</div>
                </div>
            </div>
        </div>

        <!-- Kartu 2 -->
        <div class="card w-96 bg-base-100 shadow-xl" data-aos="fade-up" data-aos-delay="200">
            <figure><img src="{{ asset('assets/images/banjir.jpg') }}" alt="banjir" class="object-cover h-56 w-full" /></figure>
            <div class="card-body">
                <h2 class="card-title">
                    Bencana Alam
                    <div class="badge badge-secondary">UPDATE</div>
                </h2>
                <p>Telah terjadi banjir bandang di daerah DKI Jakarta</p>
                <div class="card-actions justify-end">
                    <div class="badge badge-outline">Bencana</div> 
                    <div class="badge badge-outline">News</div>
                </div>
            </div>
        </div>

        <!-- Kartu 3 -->
        <div class="card w-96 bg-base-100 shadow-xl" data-aos="fade-up" data-aos-delay="300">
            <figure><img src="{{ asset('assets/images/lesti.jpeg') }}" alt="lesti" class="object-cover h-56 w-full" /></figure>
            <div class="card-body">
                <h2 class="card-title">
                    KDRT
                    <div class="badge badge-secondary">UPDATE</div>
                </h2>
                <p>Lesti Kejora mendapatkan kekerasan rumah tangga oleh Rizky Billar</p>
                <div class="card-actions justify-end">
                    <div class="badge badge-outline">Kekerasan</div> 
                    <div class="badge badge-outline">News</div>
                </div>
            </div>
        </div>

        <!-- Kartu 4 -->
        <div class="card w-96 bg-base-100 shadow-xl" data-aos="fade-up" data-aos-delay="400">
            <figure><img src="{{ asset('assets/images/mobil.jpg') }}" alt="mobil" class="object-cover h-56 w-full" /></figure>
            <div class="card-body">
                <h2 class="card-title">
                    Mobil Terbakar
                    <div class="badge badge-secondary">UPDATE</div>
                </h2>
                <p>Sebuah mobil terbakar karena mesin mobil terlalu panas</p>
                <div class="card-actions justify-end">
                    <div class="badge badge-outline">Bencana</div> 
                    <div class="badge badge-outline">News</div>
                </div>
            </div>
        </div>
    </div>
</section>

 