@extends('layouts.head')

@section('content')

<div class="heading">
    <h1 class="heading-text">
        @yield('workshop-title')
    </h1>

    <a href={{route('ViewProfile')}} class="cross-logo transition is-open">X</a>
</div>

<div class="cart transition is-open">
    <a href={{route('ViewProfile')}} class="btn btn-back">Go Back</a>


    <div class="table">

        <div class="layout-inline row th">
            <div class="col col-pro align-center">Workshop</div>
            <div class="col col-price align-center">Date</div>
            <div class="col col-qty align-center">Location</div>
            <div class="col align-center">Duration (Hours)</div>
            <div class="col align-center">Price</div>
            <div class="col align-center">Action</div>
        </div>

      @yield('table-content')

        
        <div class="tf row layout-inline">
            <div class="row layout-inline"></div>
          
        </div>
    </div>
 
    <a href="./Upcoming-Classes.html" class="btn btn-next">Next Page</a>
</div>


    
@endsection