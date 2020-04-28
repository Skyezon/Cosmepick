@extends('layouts.head')

@section('title','Register')

@section('content')

<div class="login-box">
    <img src={{ asset('assets/user-icon.png') }} class="icon">
    <h1>Sign Up</h1>

    <form method="POST" action="{{ route('register') }}">
    @csrf

        <input id="email" placeholder="Me@cosmepick.com" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <input id="password-confirm" placeholder="Type your password again" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
       

        <input type="submit" value="Sign Up" class="submit-btn">

        <p class="or-txt">or</p> <br>

        <div class="social-icons">
            <a href="https://www.facebook.com/"><img src="./assets/facebook.png"></a>
            <a href="https://www.google.com/accounts/Login?hl=id"><img src="./assets/google.png"></a>
            <a href="https://twitter.com/login"><img src="./assets/twitter.png"></a>
        </div>

        <a href={{route('login')}} class="bottom-txt"> <b>Already Have an Account? Log In</b> </a>
    </form>


</div>
<div style="height: 110vh"></div>

@endsection
