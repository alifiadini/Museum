@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('/assets/css/auth.css') }}">

<div class="Abody">
    <div class="Acontainer">
        <div class="brand-logo"> <img src="{{ asset('/assets/images/siger.png') }}" alt=""></div>
        <a class="navbar-brand" href="{{ url('/') }}"><div class="brand-title">MUPURBA</div></a>
        <form class="inputs" method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">{{ __('Email') }}</label>
            <input id="email" type="email" placeholder="Email kamu di sini!"  class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <label>{{ __('Password') }}</label>
            <input id="password" type="password" placeholder="8 karakter minimum!" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            
            <button type="submit">
                {{ __('Login') }}
            </button>

            <a class="linked" href="{{ route('register') }}">
                {{ __('Belum punya akun?') }}
            </a>
        </form>
      </div>
</div>
@endsection
