@extends('layouts.auth')

@section('content')
    <div class="wrapper">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h2>Register</h2>
            <div class="input-field">
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <label for="name">Enter your name</label>
            </div>
            <div class="input-field">
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                <label for="email">Enter your email</label>
            </div>
            <div class="input-field">
                <input id="password" type="password" name="password" required autocomplete="new-password">
                <label for="password">Enter your password</label>
            </div>
            <div class="input-field">
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                <label for="password-confirm">Confirm your password</label>
            </div>
            <button type="submit">Register</button>
            <div class="register">
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>
            @if($errors->any())
                <div class="alert-popup alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert-popup alert-danger">{{ session('error') }}</div>
            @endif
            @if (session()->has('success'))
                <div class="alert-popup alert-success">{{ session('success') }}</div>
            @endif
        </form>
    </div>
@endsection
