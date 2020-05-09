@extends('layouts.head')

@section('title', 'Product')

@section('content')
@if(session('message'))
        <div class="alert alert-success">
                {{session('message')}}
        </div>
    @endif
<div class="detail-join-container">
  

    <div class="slide-container">
        @foreach ($workshop->workshopImages as $image)
        <img class="join-slides" src={{asset('storage/'.$image->url)}} alt="">
        @endforeach
        <button class="slide-button slide-left" onclick="plusDivs(-1)">&#10094;</button>
        <button class="slide-button slide-right" onclick="plusDivs(1)">&#10095;</button>
    </div>

    <script>
        var slideIndex = 1;
        showDivs(slideIndex);
        
        function plusDivs(n) {
          showDivs(slideIndex += n);
        }
        
        function showDivs(n) {
          var i;
          var x = document.getElementsByClassName("join-slides");
          if (n > x.length) {slideIndex = 1}
          if (n < 1) {slideIndex = x.length}
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
          }
          x[slideIndex-1].style.display = "block";  
        }
    </script>

    <!-- desc+join -->
    <div class="detail-desc-container">
        <!-- desc -->
        <div class="desc-join">
            <h2>
                {{$workshop->name}}
            </h2>
        <b>Date: </b>{{$workshop->date}}<br>
        <b>Address: </b>{{$workshop->location}}<br>
            <b>Price: </b>Rp {{number_format($workshop->price,2,',','.')}} <br>
            <b>Duration: </b>{{$workshop->duration}} hours <br>
            <span>{{$workshop->description}}. <br>
                For inquiries call: {{$user_phone}} <br>
            </span>
        </div>
        <!-- button -->
        <div class="join-detail-btn mt-3">
            <!-- wishlist -->
            <div >
                @if(Auth::check())
                                 @if(Auth::user()->chosenWorkshops()->wherePivot('workshop_status','wishlist')->where('workshop_id',$workshop->id)->first() ?? false)
                             <a class="img-link" href="{{route('unRegisWorkshop',['workshopId' => $workshop->id,'relationType' => 'wishlist'])}}" onclick="document.getElementById('myform').submit()">
                                <img src={{asset('assets/wishlist_btn.png')}} alt="wishlist-btn" style="filter:none"class="wishlist-btn">
                             </a>
                                @else
                             <a class="img-link" href="{{route('regisWorkshop',['workshopId' => $workshop->id,'relationType' => 'wishlist'])}}" onclick="document.getElementById('myform').submit()">
                                <img src={{asset('assets/wishlist_btn.png')}} alt="wishlist-btn"class="wishlist-btn">
                             </a>
                             @endif    
                             @else
                             <a class="img-link" href="{{route('login')}}" >
                                <img src={{asset('assets/wishlist_btn.png')}} alt="wishlist-btn"class="wishlist-btn">
                             </a>
                             @endif
            </div>
            <!-- join -->
            <div class="join-button-container">
                @if(Auth::check())
                @if(Auth::user()->chosenWorkshops()->wherePivot('workshop_status','upcoming')->where('workshop_id',$workshop->id)->first() ?? false)
                <a class="join-click" href="{{route('unRegisWorkshop',['workshopId' => $workshop->id, 'relationType' => 'upcoming'])}}">
                    Leave the Class
                </a>
                   @else
                   <a class="join-click" href="{{route('regisWorkshop',['workshopId' => $workshop->id, 'relationType' => 'upcoming'])}}">
                    Join the Class
                </a>
                @endif
        
                @else
                <a class="join-click" href="{{route('login')}}">
                    Join the Class
                </a>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection