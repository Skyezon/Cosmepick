@extends('layouts.head')

@section('title', 'Product')

@section('content')

<div class="detail-join-container">
  
    <div class="slide-container">
        @foreach ($workshop->workshopImages as $image)
        <img class="join-slides" src={{asset($image->url)}} alt="">
            
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
                <a href="#" class="d-flex">
                    <img class="wishlist-btn" src={{asset('assets/wishlist_btn.png')}} alt="wishlist-btn">
                </a>
            </div>
            <!-- join -->
            <div class="join-button-container">
                <a class="join-click" href="">
                    Join the Class
                </a>
            </div>
        </div>
    </div>
</div>

@endsection