@extends('layouts.head')

@section('title','Join')

@section('content')
    <div id="overlay">
        <div>
            <div class="price">
                <h3>Price</h3>
                <label class="radio-container">less or equal to Rp100.000,00
                    <input type="radio" name="radio">
                    <a class="checkmark"></a>
                </label>
                <label class="radio-container">less or equal to Rp200.000,00
                    <input type="radio" name="radio">
                    <a class="checkmark"></a>
                </label>
                <label class="radio-container">more than Rp200.000,00
                    <input type="radio" name="radio">
                    <a class="checkmark"></a>
                </label>
                <button id="ok-filter" onclick="off()">OK</button>
            </div>
        </div>
    </div>
    


    <div id="filter">
        <a onclick="on()" id="filter-click">Filter</a>
    </div>
    <div id="body-join">

        <div class="list-container">
            <div class="left-container">
                <a href="./join detail/join-detail1.html"><h2>SangSang School Makeup Class</h2></a>
                <p>
                    SangSang School Basic Makeup Class<br>
                    <b>Date:</b> Tuesday, 12/09/2017<br>
                    <b>Location:</b> Graha STK – 1st Floor Jalan Taman Margasatwa Ragunan, Pasar Minggu, Jakarta Selatan <br>
                    <b>Price:</b> Rp50.000,00 <br>
                    <b>Duration:</b> 2 hours
                </p> 
            </div>
            <div class="right-container">
                <a class="img-link" href="./join detail/join-detail1.html">
                    <img src="http://jakarta.sangsanguniv.com/wp-content/uploads/2017/09/KakaoTalk_20170908_175109453.jpg" alt="makeup1" class="class-img">
                </a>            
            </div>
        </div>

        <div class="list-container">
            <div class="left-container">
                <a href="./join detail/join-detail2.html"><h2>Make Over Makeup Class</h2></a>
                <p>
                    Make Over Makeup Class<br>
                    <b>Date:</b> Saturday, 14/04/2018<br>
                    <b>Location:</b> Hong Tang Mall 3 Kelapa Gading <br>
                    <b>Price:</b> Rp275.000,00 <br>
                    <b>Duration:</b> 2 hours
                </p> 
            </div>
            <div class="right-container">
                <a class="img-link" href="./join detail/join-detail2.html">
                    <img src="https://ecs7.tokopedia.net/img/cache/700/product-1/2018/3/25/0/0_13835354-e217-47a1-9393-af7af76bd877_842_595.jpg" alt="makeup2" class="class-img">
                </a>            
            </div>
        </div>
   
        <div class="list-container">
            <div class="left-container">
                <a href="./join detail/join-detail3.html"><h2>INGLOT Makeup Class</h2></a>
                <p>
                    INGLOT Makeup Class<br>
                    <b>Date:</b> Friday, 24/08/2018<br>
                    <b>Location:</b> Central Premiere Lounge Grand Indonesia <br>
                    <b>Price:</b> Rp600.000,00 <br>
                    <b>Duration:</b> 2 hours
                </p> 
            </div>
            <div class="right-container">
                <a class="img-link" href="./join detail/join-detail3.html">
                    <img src="https://files.sirclocdn.xyz/inglot/files/Aug%20-%20Fransisca%20Livinna.jpg" alt="makeup3" class="class-img">
                </a>
            </div>
        </div>
       
        <div class="join-page">
            <a href="" class="join-page">1</a>
        </div>
    </div>
    
@endsection