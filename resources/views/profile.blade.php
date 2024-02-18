<!-- resources/views/profile.blade.php -->

@extends('layouts.app')

@section('content')
    {{-- @include('navbar') --}}
    <link rel="stylesheet" href="{{ asset('/assets/css/profile.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#name, #email, #current_password').on('input', function() {
                validateCurrentPassword();
            });
    
            function validateCurrentPassword() {
                var name = $('#name').val();
                var email = $('#email').val();
                var currentPassword = $('#current_password').val();
    
                if ((name.length > 0 || email.length > 0) && currentPassword.length === 0) {
                    $('#current_password_error').text('Current password is required.');
                } else {
                    $('#current_password_error').text('');
                }
            }

            $('#current_password').on('invalid', function() {
                $('#current_password_error').text('Current password is incorrect.');
            });
        });
    </script>

<div id="profile" class="container-profile">
    <div class="profile">
        <div class="profile-detail">
            <div class="img-container">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/images/siger.png') }}" alt="Profile Image">
                </a>
            </div>
            <div class="detail-header">
                <h1 class="usn">{{ $user->name }}</h1>
                <p>{{ $user->role }} <i class="fa-solid fa-at"></i>{{ $user->id }}</p>
                <li class="list-group-item"><strong>Email :</strong> {{ $user->email }}</li>
            </div>
        </div>
        <div class="tab-bar-case">
            <div class="tab-detail">
                <div class="tab-bar">
                    <button id="tab1" class="tab-button active" onclick="showTab('tab1')">
                        <i class="fa-solid fa-house-fire"></i>
                        <p class="active">Your Ticket</p>
                    </button>
                    <button id="tab2" class="tab-button" onclick="showTab('tab2')">
                        <i class="fa-solid fa-gear"></i>
                        <p class="active">Setting's</p>
                    </button>
                </div>
                <div class="tab-contents">
                    <div id="content-tab1" class="tab-content active">
                        <h1>Edit Profile</h1>
                        <ul class="list-group">
                            @forelse ($transactions as $transaction)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong style="font-size: calc(1.2rem + 1vw);">{{ $transaction->ticket->name }}</strong>
                                            <br>
                                            {{ $transaction->quantity_anak_anak }} Anak-Anak,
                                            {{ $transaction->quantity_mahasiswa }} Mahasiswa,
                                            {{ $transaction->quantity_dewasa }} Dewasa
                                            <br>
                                            <strong style="font-size: 1.2rem">Rp.{{ number_format($transaction->total_amount) }}</strong>
                                        </div>
                                        <div class="text-right">
                                            <p style="display: flex; flex-wrap:wrap; text-align:end; float: right;"><b>Waktu Transaksi : </b>{{ \Carbon\Carbon::parse($transaction->transaction_date)->format(' H:i l, d F Y') }}</p>
                                            <form class="d-inline" action="{{ route('transactions.cancel', $transaction->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this transaction?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btncal">Cancel Transaction</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">
                                    <p>No transactions available</p>
                                </li>
                            @endforelse
                        </ul>
                    </div>

                    <div id="content-tab2" class="tab-content ">
                        <h1>Edit Profile</h1>
                        <div class="form">
                            <div class="card-header">Edit Profile</div>
                    
                                <div class="card-body">
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                    
                                    @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                    
                                    <form method="POST" action="{{ route('profile.update', ['id' => $user->id]) }}">
                                        @csrf
                                        @method('PUT')
                    
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="form-control">
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                    
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                    
                                        <div class="form-group">
                                            <label for="current_password">Current Password</label>
                                            <input type="password" id="current_password" name="current_password" class="form-control">
                                            @error('current_password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                    
                                        <div class="form-group">
                                            <label for="password">New Password</label>
                                            <input type="password" id="password" name="password" class="form-control">
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                    
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm New Password</label>
                                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                        </div>
                    
                                        <button type="submit" class="btn btn-primary">Update Profile</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showTab(tabId) {
    const tabButtons = document.querySelectorAll(".tab-button");
    const tabContents = document.querySelectorAll(".tab-content");

    tabButtons.forEach((button) => {
        button.classList.remove("active");
    });

    tabContents.forEach((content) => {
        content.classList.remove("active");
    });

    document.getElementById(tabId).classList.add("active");
    document.getElementById(`content-${tabId}`).classList.add("active");
}
</script>
{{-- <script src="{{ asset('assets/js/profile.js') }}"></script> --}}
@endsection
