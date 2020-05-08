@extends('layouts.head');

@section('title', 'Class verif')

@section('content')
@if(session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

@if(session('delete'))
<div class="alert alert-danger">
    {{session('delete')}}
</div>
@endif

<h1 class="mt-4">list of unverified class</h1>
<div class="container">
    <div class="my-4">

        @foreach ($workshops as $workshop)
        <div class="row my-3">
            <div class="col-lg-6">
                <div class="d-flex justify-content-around align-items-center h-100">
                    <img src={{asset('storage/'.$workshop->workshopImages()->first()->url)}} style="max-height: 200px" alt="classimage">
                <h2>{{$workshop->name}}</h2>
                </div>
            </div>
            <div class="col-lg-6">
                    <div class="d-flex justify-content-around h-100 align-items-center">
                        <form action={{route('verifyWorkshop',['id' => $workshop->id])}} method="POST" enctype="multipart/form-data">
                            @csrf
                            <button name="" id="" class="btn btn-success text-light" href="#" type="submit" role="button">Verify!</button>
                        </form>
                        <button name="" id="" class="btn btn-primary text-light" href="#" role="button">View Detail</button>
                        <form action={{route('noVerifyWorkshop',['id' => $workshop->id])}} method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('DELETE')
                            <button name="" id="" class="btn btn-danger text-light" href="#" role="button" type="submit">Delete!</button>
                        </form>
                    </div>
            </div>
        </div>
        @endforeach
        <div class="d-flex justify-content-center align-items-center pt-5">
        {{ $workshops->links() }}

        </div>

    </div>
</div>


@endsection