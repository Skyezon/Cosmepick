@extends('layouts.workshop_head')

@section('title','My Class')

@section('workshop-title','My Class')

@section('table-content')
    @foreach ($userCreatedWorkshops as $workshop)
        <div class="layout-inline row d-flex justify-content-center align-items-center">
            <div class="col col-pro layout-inline d-flex flex-column justify-content-center align-items-center ">
                <img style="align-items: center;">
                    <a href={{route('showEditClass')}}>
                        <img src="{{asset('storage/'.$workshop->workshopImages()->first()->url)}}" alt="{{$workshop->name}}">
                    </a>
                <p><a href="./join detail/join-detail1.html">{{$workshop->name}}</a></p>
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
            <div class="col col-total col-numeric d-flex justify-content-around">
                <a href={{route('showEditClass')}} class="btn btn-primary text-light w-50">Edit</a>
                <form action="{{route('DeleteUserCreatedWorkshop', $workshop->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
@endsection