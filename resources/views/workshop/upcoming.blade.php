@extends('layouts.workshop_head')

@section('title','Upcoming')

@section('workshop-title','Upcoming Class')

@section('table-content')
    @foreach ($userUpcomingdWorkshop as $workshop)
        <div class="layout-inline row d-flex justify-content-center align-items-center">
            <div class="col col-pro layout-inline d-flex flex-column justify-content-center align-items-center ">
                <img style="align-items: center;">
                    <a href="{{route('ViewWorkshop',['id' => $workshop->id])}}">
                        <img src="{{asset('storage/'.$workshop->workshopImages()->first()->url)}}" alt="{{$workshop->name}}">
                    </a>
                <p><a href="{{route('ViewWorkshop',['id' => $workshop->id])}}">{{$workshop->name}}</a></p>
            </div>

            <div class="col col-price col-numeric align-center">
                <p>{{$workshop->date}}</p>
            </div>

            <div class="col col-price col-numeric align-center">
                <p>{{$workshop->location}}</p>
            </div>

            <div class="col col-qty layout-inline">
                <p>{{$workshop->duration}}</p>
            </div>

            <div class="col col-vat col-numeric">
                <p>Rp {{number_format($workshop->price,2,',','.')}}</p>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center my-4">
        {{$userUpcomingdWorkshop->links()}}
    </div>
@endsection