@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('/assets/css/auth.css') }}">

<div class="Abody">
    <div class="Acontainer">
        <div class="brand-logo"> <img src="{{ asset('/assets/images/siger.png') }}" alt=""></div>
        <a class="navbar-brand" href="{{ url('/') }}"><div class="brand-title">Museum Lampung</div></a>
        <form class="inputs" method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" placeholder="Username kamu" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
            <label for="email">{{ __('Email Address') }}</label>
            <input id="email" type="email" placeholder="Email kamu di sini!"  class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="submit">
                <div class="pass">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" placeholder="8 karakter minimum!" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="cpass">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" placeholder="Ketik ulang password!" name="password_confirmation" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button type="submit">
                {{ __('Register') }}
            </button>

            <a class="linked" href="{{ route('login') }}">
                {{ __('Sudah punya akun?') }}
            </a>
        </form>
      </div>
</div>
@endsection