@extends('layouts.head')

@section('title','Edit workshop')

@section('content')
    <div class="container shadow bg-white p-4 w-75" style=" box-shadow: none">
        <div class="d-flex justify-content-center align-items-center">
            <h1 class="font-weight-bold mb-0">Edit Class</h1>
        </div>
        <div class="form-group d-flex flex-column justify-content-center ">
            <div class="mb-4">
                <div class="text-left">
                    <label for="nama" class="mb-2 text-left">Nama</label>
                  </div>
                  <div class="w-50">
                    <input type="text"
                    class="form-control my-input text-left" name="name" value={{$workshop->name}} id="nama" aria-describedby="helpId" placeholder="">
                  </div>
            </div>

            <div class="mb-4">
                <div class="text-left">
                    <label for="category" class="mb-2 text-left">Category</label>
                  </div>
                  <div class="w-50">
                    <input type="text"
                    class="form-control my-input text-left" name="category" value={{$workshop->category}} id="category" aria-describedby="helpId" placeholder="">
                  </div>
            </div>

            <div class="mb-4">
                <div class="text-left">
                    <label for="location" class="mb-2 text-left">Location</label>
                  </div>
                  <div class="w-50">
                    <input type="text"
                    class="form-control my-input text-left" name="location" value={{$workshop->location}} id="location" aria-describedby="helpId" placeholder="">
                  </div>
            </div>

            <div class="mb-4">
                <div class="text-left">
                    <label for="date" class="mb-2 text-left">Date</label>
                  </div>
                  <div class="w-50">
                    <input type="date"
                    class="form-control my-input text-left" name="date" value={{$workshop->date}} id="date" aria-describedby="helpId" placeholder="">
                  </div>
            </div>

            <div class="mb-4">
                <div class="text-left">
                    <label for="price" class="mb-2 text-left">Price</label>
                  </div>
                  <div class="w-50">
                    <input type="number"
                    class="form-control my-input text-left" min="0" name="price" value={{$workshop->price}} id="price" aria-describedby="helpId" placeholder="">
                  </div>
            </div>

            <div class="mb-4">
                <div class="text-left">
                    <label for="duration" class="mb-2 text-left">Duration</label>
                  </div>
                  <div class="w-50">
                    <input type="number"
                    class="form-control my-input text-left" min="1" name="duration" value={{$workshop->duration}} id="duration" aria-describedby="helpId" placeholder="">
                  </div>
            </div>

            <div class="mb-4">
                <div class="text-left">
                    <label for="instructor" class="mb-2 text-left">Instructor</label>
                  </div>
                  <div class="w-50">
                    <input type="text"
                    class="form-control my-input text-left" name="instructor" value={{$workshop->instructor}} id="instructor" aria-describedby="helpId" placeholder="">
                  </div>
            </div>

            <div class="mb-4">
                <div class="text-left">
                    <label for="description" class="mb-2 text-left">Description</label>
                  </div>
                  <div class="w-50">
                    <input type="text"
                    class="form-control my-input text-left" name="description" value={{$workshop->description}} id="description" aria-describedby="helpId" placeholder="">
                  </div>
            </div>
 
        </div>
    </div>

@endsection