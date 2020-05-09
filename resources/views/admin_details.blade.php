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
                For inquiries call: {{$userPhone}} <br>
            </span>
        </div>
        <!-- button -->
        <div class="join-detail-btn mt-3 d-flex w-100 justify-content-center">
        
            
        </div>
    </div>
    

</div>
<div class="d-flex justify-content-center my-4">
    <div class="d-flex flex-column mr-5">
        <span>Ini foot hanya ktp :</span>
        <img src="{{asset('storage/'.$workshop->userImages->url_only_ktp)}}" alt="image-url-only-ktp">
    </div>
    <div class="d-flex flex-column ml-5">
        <span>Ini foot dengan ktp :</span>
        <img src="{{asset('storage/'.$workshop->userImages->url_with_ktp)}}" alt="image-url-with-ktp">
    </div>
</div>
@endsection