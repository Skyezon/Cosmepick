@extends('layouts.head')

@section('title','Edit workshop')

@section('content')
<div class="container shadow bg-white p-4 w-75" style=" box-shadow: none">
    <div class="d-flex justify-content-center align-items-center">
        <h1 class="font-weight-bold mb-0">Edit Class</h1>
    </div>
    <form class="form-group d-flex flex-column justify-content-center ">
        <div class="mb-4">
            <div class="text-left">
                <label for="nama" class="mb-2 text-left">Nama</label>
            </div>
            <div class="w-50">
                <input type="text" class="form-control my-input text-left" name="name" value={{$workshop->name}}
                    id="nama" aria-describedby="helpId" placeholder="">
            </div>
        </div>

        <div class="mb-4">
            <div class="text-left">
                <label for="category" class="mb-2 text-left">Category</label>
            </div>
            <div class="w-50">
                <input type="text" class="form-control my-input text-left" name="category" value={{$workshop->category}}
                    id="category" aria-describedby="helpId" placeholder="">
            </div>
        </div>

        <div class="mb-4">
            <div class="text-left">
                <label for="location" class="mb-2 text-left">Location</label>
            </div>
            <div class="w-50">
                <input type="text" class="form-control my-input text-left" name="location" value={{$workshop->location}}
                    id="location" aria-describedby="helpId" placeholder="">
            </div>
        </div>

        <div class="mb-4">
            <div class="text-left">
                <label for="date" class="mb-2 text-left">Date</label>
            </div>
            <div class="w-50">
                <input type="date" class="form-control my-input text-left" name="date" value={{$workshop->date}}
                    id="date" aria-describedby="helpId" placeholder="">
            </div>
        </div>

        <div class="mb-4">
            <div class="text-left">
                <label for="price" class="mb-2 text-left">Price</label>
            </div>
            <div class="w-50">
                <input type="number" class="form-control my-input text-left" min="0" name="price"
                    value={{$workshop->price}} id="price" aria-describedby="helpId" placeholder="">
            </div>
        </div>

        <div class="mb-4">
            <div class="text-left">
                <label for="duration" class="mb-2 text-left">Duration</label>
            </div>
            <div class="w-50">
                <input type="number" class="form-control my-input text-left" min="1" name="duration"
                    value={{$workshop->duration}} id="duration" aria-describedby="helpId" placeholder="">
            </div>
        </div>

        <div class="mb-4">
            <div class="text-left">
                <label for="instructor" class="mb-2 text-left">Instructor</label>
            </div>
            <div class="w-50">
                <input type="text" class="form-control my-input text-left" name="instructor"
                    value={{$workshop->instructor}} id="instructor" aria-describedby="helpId" placeholder="">
            </div>
        </div>

        <div class="mb-4">
            <div class="text-left">
                <label for="description" class="mb-2 text-left">Description</label>
            </div>
            <div class="w-50">
                <input type="text" class="form-control my-input text-left" name="description"
                    value={{$workshop->description}} id="description" aria-describedby="helpId" placeholder="">
            </div>
        </div>
        {{-- {{dd($workshopImages)}} --}}
        <h1 class="mt-3">Workshop Image</h1>
        <div class="d-flex flex-column justify-content-between align-items-center">
          @for($i = 0 ;$i <= 4; $i++)
          <div class="my-3 d-flex flex-column align-items-center justify-content-center">
            @if($workshopImages->first() != null)
            <label for="workshop-image-input-{{$i}}" style="cursor: pointer;" class="btn btn-primary">Change Image ?</label>
            <input type="file" pl name="workshopImg[]" class="d-none" id="workshop-image-input-{{$i}}" onchange="addText(event)">
            <img class="mt-3" id="workshop-image-{{$i}}" src={{asset($workshopImages->shift()->url)}} alt="workshop-image-{{$i}}">
          @else
            <input type="file" name="workshopImg[]" id="workshop-image-input-{{$i}}">
            <img src="#" id="workshop-image-{{$i}}" class="mt-3" alt="workshop-image-{{$i}}">
          @endif  
          </div>

             
          @endfor
        </div>

    </form>

    <script>
      
displayImage = (input,image,i) => {
    image.src == window.location.href + '#' ? image.style.display= ' none' : console.log('jalan'); 
    input.addEventListener('change',() =>{
            image.style.display = 'block'
            image.style.maxHeight = '200px'
            image.style.maxWidth = '300px'

            readURL(input,i,image);
     })

     input.addEventListener('load', () =>{
        if(image.src == window.location.href){
           
        }else{
            readURL(input,i,image)
        }
     })
}

function readURL(input,id,image) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            image.setAttribute('src', e.target.result);
    
        }

        reader.readAsDataURL(input.files[0]);
    }

}


for(let i = 0 ;i < 5;i++){
    // $("#workshop-input-"+ i).change(function(){
    // });
    let input =  document.getElementById('workshop-image-input-' + i)
    let image  = document.getElementById('workshop-image-' + i);

        displayImage(input,image,i);
    
}

function insertAfter(referenceNode, newNode) {
  referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}



addText = (e) => {
  var el = document.createElement("span");
  el.innerHTML = "Image will be : ";
  var div = document.getElementById(e.target.id);
  insertAfter(div, el);
}
    </script>
</div>

@endsection
