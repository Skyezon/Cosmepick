@extends('layouts.head')

@section('title','Home')

@section('content')
<div style="display: relative">
    <div class="body-content">
        <h2>
            We recommend the best workshop that suits you. 
            You can join a number of workshops of your choice or you can create your own workshop.
        </h2>
    </div>
    
    <div class="button">
        <a href={{route('ViewJoin')}} class="btn btn-primary text-light">Let's Get Started</a>
    </div>
    
    <div class="image-1">
        <img src={{ asset('assets/makeup.png') }} alt="">
    </div>
</div>
<div style="height: 100vh"></div>
@endsection


