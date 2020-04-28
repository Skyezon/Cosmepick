@extends('layouts.workshop_head')

@section('title','Wishlist')

@section('workshop-title','Wishlist')

@section('table-content')
<div class="layout-inline row d-flex justify-content-center align-items-center">
    <div class="col col-pro layout-inline d-flex flex-column justify-content-center align-items-center ">
        <img style="align-items: center;">
            <a href="./join detail/join-detail1.html"><img src="http://jakarta.sangsanguniv.com/wp-content/uploads/2017/09/KakaoTalk_20170908_175109453.jpg" alt=""></a>
        <p><a href="./join detail/join-detail1.html">SangSang School Makeup Class</a></p>
    </div>

    <div class="col col-price col-numeric align-center">
        <p>date</p>
    </div>

    <div class="col col-price col-numeric align-center">
        <p>location</p>
    </div>

    <div class="col col-qty layout-inline">
        <p>duration</p>
    </div>

    <div class="col col-vat col-numeric">
        <p>Rp10.000,00</p>
    </div>
    <div class="col col-total col-numeric d-flex justify-content-around">
        <button type="button" class="btn btn-default">Edit</button>
        <button type="button" class="btn btn-danger">Delete</button>
    </div>
</div>
@endsection