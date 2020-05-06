@extends('layouts.head');

@section('title', 'Class verif')

@section('content')
<h1 class="mt-4">list of unverified class</h1>
<div class="container">
    <div class="my-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="d-flex justify-content-around align-items-center h-100">
                    <img src={{asset('/storage/profile_photo.png')}} style="max-height: 200px" alt="classimage">
                    <h2>nama class</h2>
                </div>
            </div>
            <div class="col-lg-6">
                    <div class="d-flex justify-content-around h-100 align-items-center">
                        <a name="" id="" class="btn btn-success text-light" href="#" role="button">Verify!</a>
                        <a name="" id="" class="btn btn-primary text-light" href="#" role="button">View Detail</a>
                        <a name="" id="" class="btn btn-danger text-light" href="#" role="button">Delete!</a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    

</div>

@endsection