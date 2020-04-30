@extends('layouts.head')

@section('title', 'Product')

@section('content')

<div class="detail-join-container">
  
    <div class="slide-container">
        <img class="join-slides" src="http://jakarta.sangsanguniv.com/wp-content/uploads/2017/09/KakaoTalk_20170908_175109453.jpg" alt="">
        <img class="join-slides" src="https://tallypress.com/wp-content/uploads/2018/01/top-10-beauty-academies-in-kl-selangor.jpg" alt="">
        <img class="join-slides" src="https://www.botanicadayspa.com/wp-content/uploads/2017/11/private-makeup-class.jpg" alt="">

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
                SangSang School Makeup Class
            </h2>
            <b>Date: </b>Tuesday, 12/09/2017 <br>
            <b>Address: </b>Graha STK – 1st Floor Jalan Taman Margasatwa Ragunan, Pasar Minggu, Jakarta Selatan <br>
            <b>Price: </b>Rp50.000,00 <br>
            <b>Duration: </b>2 hours <br>
            <span>
                SangSang Makeup Class Batch 5 is open! 
                This class focuses on a lot of curriculums and skills
                related to the basics of makeup. Our instructor is 
                a certified professional. With only Rp50.000,00, 
                you can already join the makeup class at SangSang School. <br>
                For inquiries call: 081219765001 <br>
            </span>
        </div>
        <!-- button -->
        <div class="join-detail-btn">
            <!-- wishlist -->
            <div>
                <a href="">
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