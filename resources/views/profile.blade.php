@extends('layouts.head')

@section('title','Profile')

@section('content')
<div>
    <!-- profile desc -->
    <div id="body-profiledes-container">
        <!-- photo -->
        <div id="profiledes-photos">
            <span class="welcome"><b>Welcome !</b></span>
            <span> <img id="circle-photos" src={{asset('storage/'.$user->profile_pic_url)}} alt=""></span>
        <span class="text-photo">{{$user->name ?? $user->email}}</span>
            <a class="text-photo" href={{route('ViewEditProfile')}}>Edit User</a>
        </div>

        <!-- desc -->
        <div id="profiledes-des">
        <span class="text-des">Phone : <b>{{$user->phone ?? 'Please update your phone number'}}</b></span>
        <span class="text-des">Email : <b>{{$user->email}}</b></span>
        <span class="text-des">Website : <b>{{$user->website ?? 'Please update your website'}}</b></span>
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