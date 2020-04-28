@extends('layouts.head')

@section('title','login')

@section('content')

<div class="login-box">
    <img src="./assets/user-icon.png" class="icon">
    <h1>Log In</h1>

    <form method="POST" action="{{ route('login') }}">
        <input id="email" type="email" placeholder="Me@cosmepick.com" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror


        <input type="submit" value="Sign In" class="submit-btn">

        <a href={{route('password.request')}} class="bottom-txt">Forgot your Password?</a> <br>
        <p class="or-txt">or</p> <br>

        <div class="social-icons">
            <a href="https://www.facebook.com/"><img src="./assets/facebook.png"></a>
            <a href="https://www.google.com/accounts/Login?hl=id"><img src="./assets/google.png"></a>
            <a href="https://twitter.com/login"><img src="./assets/twitter.png"></a>
        </div>

        <a href={{route('register')}} class="bottom-txt"> <b>Don't Have an Account? Sign Up</b> </a>
    </form>
</div>
    
@endsection