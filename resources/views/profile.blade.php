@extends('layouts.head')

@section('title','Profile')

@section('content')
<div>
    <!-- profile desc -->
    <div id="body-profiledes-container">
        <!-- photo -->
        <div id="profiledes-photos">
            <span class="welcome"><b>Welcome !</b></span>
            <span> <img id="circle-photos" src="./assets/profile-photo.png" alt=""></span>
            <span class="text-photo">User</span>
            <span class="text-photo">Edit User</span>
        </div>

        <!-- desc -->
        <div id="profiledes-des">
            <span class="text-des">Phone : <b>021 - 033342343</b></span>
            <span class="text-des">Email : <b>mygetbeautyty@gmail.com</b></span>
            <span class="text-des">Website : <b>www.mygetbeauty67.com</b></span>
        </div>


    </div>

    <!-- classes -->
    <div id="body-classes-container">
        <!-- left-class -->
        <div id="left-class-container">
            <div class="img-class-flex"> 
                    <img class="img-class" src="assets/hearticon.png" alt="Classes Wishlist">
                <a class="hyperlink-text" href={{route('ViewWishlist')}}>
                    <span class="text-class" >Classes Wishlist</span>
                </a>          
            </div>
            
            <div class="img-class-flex">
                <img class="img-class" src="assets/downloadicon.png" alt="Upcoming Classes">
                <a class="hyperlink-text" href={{route('ViewUpcoming')}}>
                    <span class="text-class">Upcoming Classes</span>
                </a>
            </div>
            
        </div>

        <!-- right-class -->
        <div id="right-class-container">
            <div class="img-class-flex">
                <img class="img-class" src="assets/historyicon.png" alt="History">
                <a class="hyperlink-text" href={{route('ViewHistory')}}>
                     <span class="text-class">Classes History</span>
                </a>
            </div>
            
            <div class="img-class-flex">
                <img class="img-class" src="assets/classicon.png" alt="My Classes">
                <a class="hyperlink-text" href={{route('ViewMyclass')}}>
                    <span class="text-class">My Classes</span>
                </a>
            </div>
        </div>

    </div>  

</div>

@endsection