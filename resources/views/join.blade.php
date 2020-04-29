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
               
                <p class="fas fa-sm">
                   <span>SangSang School Basic Makeup Class</span> 
                   <div class="d-flex">
                       <div class="d-flex flex-lg-column ">
                        <b>Date:</b>
                        <b>Location:</b>
                        <b >Price:</b>
                        <b>Duration:</> 
                       </div>
                       <div class="d-flex flex-column flex-nowrap ml-4">
                           <span>Tuesday, 12/09/2017</span>
                           <span> Graha STK – 1st Floor Jalan Taman Margasatwa</span>
                           <span>Rp50.000,00 </span>
                           <span>2 hours</span>
                       </div>
                   </div>
                     
                                       
    
                </p> 
            </div>
            <div class="right-container">
                <a class="img-link" href="./join detail/join-detail1.html">
                    <img src="http://jakarta.sangsanguniv.com/wp-content/uploads/2017/09/KakaoTalk_20170908_175109453.jpg" alt="makeup1" class="class-img">
                </a>            
            </div>
        </div>
       
        <div class="join-page">
            <a href="" class="join-page">1</a>
        </div>
    </div>

    <script>
        
function on() {
    document.getElementById("overlay").style.display = "block";
  }
  
  function off() {
    document.getElementById("overlay").style.display = "none";
  }
    </script>
    
@endsection