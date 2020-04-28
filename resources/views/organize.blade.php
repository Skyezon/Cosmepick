@extends('layouts.head')

@section('title','Organize')

@section('content')


<div class="mt-4" id="title">
    <h1>You Can Organize A Workshop, But We Need Your Detail Information</h1>
</div>


<div id="form-text">
    <label for="" class="text1">Workshop Name</label>
    <input class="input" type="text" placeholder="Input Workshop Name">
    <br>
    <br>
    <label for="" class="text1">Workshop Category</label>
    <input class="input" type="text" placeholder="Workshop Category">
    <br>
    <br>
    <label for="" class="text1">Location</label>
    <input class="input" type="text" placeholder="Input Location">
    <br>
    <br>
    <label for="" class="text1">Date</label>
    <input class="input" type="date">
    <br>
    <br>
    <label for="" class="text1">Price</label>
    <input class="input" type="text" placeholder="Input Workshop Price">
    <br>
    <br>
    <label for="" class="text1">Duration</label>
    <input class="input" type="text" placeholder="Input Workshop Duration">
    <br>
    <br>
    <label for="" class="text1">Instructor</label>
    <input class="input" type="text" placeholder="Input Instructor Name">
    <br>
    <br>
    <label for="" class="text1">Description</label>
    <input class="input" type="text" placeholder="Input More Description">

</div>

<div id="button">
    <a href="upPhoto.html" class="next-button button1">Next</a>
</div>
    
@endsection