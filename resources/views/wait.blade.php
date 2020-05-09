@extends('layouts.head')

@section('title','Verification')

@section('content')
    <div style="margin-top: 3rem"></div>


    @if(session('message'))
<div id="wait">

        <h3 class="wait-text">
            {{session('message')}}
        </h3>
</div>

        @else
        <div id="title">
            <h2 class="title-text">2. Verification Process by CosmePick</h2>
        </div>
<div id="wait">

    <h3 class="wait-text">Waiting for Verification</h3>
</div>

    @endif

<div id="image">
    <img src="./Assets/sandclock.gif" alt="Waiting">
</div>

<div id="button">
<a href="{{route('ViewHome')}}" class="next-button button1" >Home</a>
</div>
@endsection