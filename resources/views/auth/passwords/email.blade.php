@extends('layouts.head')

@section('content')
<div class="forget-box">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <form action="" class="d-flex justify-content-center a\lign-items-center flex-column p-4">
        <input placeholder="Enter your email" id="email" type="email" class="form-control my-4 @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="submit" value="Forgot Password" class="submit-btn">
    </form>
</div>
<div style="height:91vh; background-image: url('/assets/wallpaper_login.jpg'); background-size: cover;background-position: center"></div>
@endsection
