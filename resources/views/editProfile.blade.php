@extends('layouts.head')

@section('title','Edit Profile')

@section('content')
<form action={{route('UpdateEditProfile')}} method="post" class="form-group" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="d-flex justify-content-center">
        <div class="d-flex flex-column justify-content-center align-items-center p-4">
            <img src={{asset('storage/'.$user->profile_pic_url)}} alt="profile-pic" id="profile-image">
            <input type="file" class="m-4" name="newProfilePic" value={{$user->profile_pic_url}} id="profile-input">
            @error('newProfilePic')
        <div class="text-danger">{{$message}}</div>
            @enderror
        </div>

        <div class="d-flex flex-column justify-content-center align-items-center mx-3">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-around align-items-end h-100">
                    &nbsp;<label for="name">Name :</label>
                    &nbsp;<label for="email">Email :</label>
                    &nbsp;<label for="password">New password :</label>
                    &nbsp;<label for="phone">phone :</label>
                    &nbsp;<label for="website">website :</label>
                </div>
                <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center h-100">
                    &nbsp; 
                    <div>
                        <input value="{{$user->name}}" type="text" class="form-control w-100" size="50" name="newName" id="name">
                        @error('newName')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    &nbsp; <div>
                        <input value="{{$user->email}}" type="email" class="form-control w-100" size="50" name="newEmail" id="email">
                        @error('newEmail')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    &nbsp; <div>
                        <input type="password" class="form-control w-100" size="50" name="newPassword" id="password">
                        @error('newPassword')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    &nbsp; <div>
                        <input value="{{$user->phone}}" type="text" class="form-control w-100" size="50" name="newPhone" id="phone">
                        @error('newPhone')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    &nbsp; <div>
                        <input value="{{$user->website}}" type="text" class="form-control w-100" size="50" name="newWebsite" id="website">
                        @error('newWebsite')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <input name="" id="" class="btn btn-primary" type="submit">

    </div>
</form>
<div style="height: 9.5vh;"></div>

<script>
    displayImage = (input,image,i) => {
            image.src == window.location.href ? image.style.display= 'none' : console.log('jalan'); 
            input.addEventListener('change',() =>{
                    image.style.display = 'block'
                    image.style.maxHeight = '200px'
                    image.style.maxWidth = '300px'

                    readURL(input,i,image);
            })

            input.addEventListener('load', () =>{
                if(image.src == window.location.href){
                    console.log('jalan')
                    
                }else{
                    readURL(input,i,image)
                }
            })
    }

    function readURL(input,id,image) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                image.setAttribute('src',  e.target.result);

            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    const input = document.getElementById('profile-input')
    const image  = document.getElementById('profile-image')
    displayImage(input,image)
</script>
@endsection
