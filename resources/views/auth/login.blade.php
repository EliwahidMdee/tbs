@extends('layouts.auth')

@section('content')
    <div class="wrapper">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <h2>Login</h2>
            <div class="input-field">
                <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <label for="email">Enter your email</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required autocomplete="current-password">
                <label for="password">Enter your password</label>
            </div>
            <div class="forget">
                <label for="remember">
                    <input type="checkbox" id="remember" name="remember">
                    <p>Remember me</p>
                </label>
                <a href="{{ route('password.request') }}">Forgot password?</a>
            </div>
            <button type="submit">Log In</button>
            <div class="register">
                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
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
