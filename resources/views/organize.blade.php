@extends('layouts.head')

@section('title','Organize')

@section('content')

<form action="{{route('reqWorkshopVerification')}}" method="POST" class="mt-5" enctype="multipart/form-data">
@csrf
<div id="workshop-form-1" >
    <div id="title">
        <h1>You Can Organize A Workshop, But We Need Your Detail Information</h1>
    </div>
    
    
    <div id="form-text">
        <label for="" class="text1">Workshop Name</label>
        <input class="input" name="workshopName" type="text" value="{{old('workshopName')}}" placeholder="Input Workshop Name">
        @error('workshopName')
            <div class="text-danger">{{$message}}</div>
        @enderror
        <br>
        <br>
        <label for="" class="text1">Workshop Category</label>
        <input class="input" name="workshopCategory" type="text" value="{{old('workshopCategory')}}" placeholder="Workshop Category">
        @error('workshopCategory')
            <div class="text-danger">{{$message}}</div>
        @enderror
        <br>
        <br>
        <label for="" class="text1">Location</label>
        <input class="input" name="workshopLocation" type="text" value="{{old('workshopLocation')}}" placeholder="Input Location">
        @error('workshopLocation')
            <div class="text-danger">{{$message}}</div>
        @enderror
        <br>
        <br>
        <label for="" class="text1">Date</label>
        <input class="input" name="scheduledDate" type="date" value="{{old('scheduledDate')}}">
        @error('scheduledDate')
            <div class="text-danger">{{$message}}</div>
        @enderror
        <br>
        <br>
        <label for="" class="text1">Price</label>
        <input class="input" name="workshopPrice" type="number" min="0" value="{{old('workshopPrice')}}" placeholder="Input Workshop Price">
        @error('workshopPrice')
            <div class="text-danger">{{$message}}</div>
        @enderror
        <br>
        <br>
        <label for="" class="text1">Duration</label>
        <input class="input" name="workshopDuration" type="number" min="1" value="{{old('workshopDuration')}}" placeholder="Input Workshop Duration (In Hours)">
        @error('workshopDuration')
            <div class="text-danger">{{$message}}</div>
        @enderror
        <br>
        <br>
        <label for="" class="text1">Instructor</label>
        <input class="input" name="workshopInstructor" type="text" value="{{old('workshopInstructor')}}" placeholder="Input Instructor Name">
        @error('workshopInstructor')
            <div class="text-danger">{{$message}}</div>
        @enderror
        <br>
        <br>
        <label for="" class="text1">Description</label>
        <input class="input" name="workshopDescription" type="text" value="{{old('workshopDescription')}}" placeholder="Input More Description">
        @error('workshopDescription')
            <div class="text-danger">{{$message}}</div>
        @enderror

        <div id="button">
            <a href="#" class="next-button button1" onclick="workshop(event)" >Next</a>
        </div>
        
    </div>

</div>
    
    {{-- photo upload --}}
    <div id="workshop-form-2">
        <div id="title">
            <h1>Add Some Photos of Your Workshop</h1>       
        </div>
        <div id="title-content" class="my-5 ml-4">
            <h4>Photos are important to give your workshop an intereseting impression</h4>
        </div>
        
        <div id="body-container" class="mx-5">
            <div id="body-container0">
                <input name="workshopImgs[]" type="file" multiple>
                @error('workshopImgs.0')
                    <div class="text-danger align-center">{{$message}}</div>
                @enderror
            </div>
            <div id="body-container1">
                <input name="workshopImgs[]" type="file" multiple>
                @error('workshopImgs.1')
                    <div class="text-danger align-center">{{$message}}</div>
                @enderror
            </div>
            <div id="body-container2">
                <input name="workshopImgs[]" type="file" multiple>
                @error('workshopImgs.2')
                    <div class="text-danger align-center">{{$message}}</div>
                @enderror
            </div>
            <div id="body-container3">
                <input name="workshopImgs[]" type="file" multiple>
                @error('workshopImgs.3')
                    <div class="text-danger align-center">{{$message}}</div>
                @enderror
            </div>
            <div id="body-container4">
                <input name="workshopImgs[]" type="file" multiple>
                @error('workshopImgs.4')
                    <div class="text-danger align-center">{{$message}}</div>
                @enderror
            </div>
        </div>

        @error('workshopImgs')
            <div class="text-danger align-center">{{$message}}</div>
        @enderror
      
        <div class="d-flex justify-content-center align-items-center">
            <div id="button">
                <a href="#" class="next-button button1"  onclick="revworkshop(event)" >Back</a>
            </div>
    
            <div id="button">
                <a href="#" class="next-button button1" onclick="workshop(event)">Next</a>
            </div>
        </div>
        
    </div>
   
    
    {{-- termscon --}}
    <div id="workshop-form-3">

        <div id="title">
            <h1>Terms and Condition</h1>
        </div>
        
        <div id="img">
            <img src="./Assets/28bab49508c5427bbf15f587e2cf31d1.png" alt="Terms and Condition">
        </div>
        
        
        <div id="content" class="my-4 mx-5">
            <span>These Website Standard Terms and Conditions written on this webpage shall manage your use of this website. These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.</span>
        </div>
        
        <div>
            <div id="agree-button" class="d-flex justify-content-center align-items-center">
                <a onclick="workshop(event)" class="ag-button button1">I Agree</a>
            </div>
            
            <div id="nagree-button" class="mb-5 d-flex justify-content-center align-items-center">
                <a href="#" onclick="revworkshop(event)" class="ag-button button1">I Do Not Agree</a>
            </div>
        </div>
        
        
        
    </div>
    
    
    {{--Verification--}}
    <div id="workshop-form-4">

        <div id="title">
            <h1>Verification</h1>
        </div>
        
        <div id="verifID-text" class="ml-5 my-4">
            <h2>1. Verification of Identity Card</h2>
        </div>
        
        
        <div id="body-container">
            <div id="left-container">
                <div>
                    <p class="left-text">Photo of Your ID Card</p>
                </div>
                
                <div class="add-photo1">
                    <input name="idOnlyImg" type="file">
                    @error('idOnlyImg')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
        
            </div>
        
            <div id="right-container">
                
                <div>
                    <p class="right-text">Photo of Yourself with an ID Card</p>
                </div>
        
                <div class="add-photo2">
                    <input name="idWithUserImg" type="file">
                    @error('idWithUserImg')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
        
            </div>
        </div>
        {{-- ini tombol untuk submit form --}}
        <div class="d-flex justify-content-center align-items-center">
            <div id="button">
                <a href="#" class="next-button button1" onclick="revworkshop(event)">Back</a>
            </div>
    
            <div id="button">
                <button class="next-button button1">Next</button>
            </div>
        </div>
       
    </div>
    
</form>

<script>

for(let i = 2; i < 5;i++){
    let id = `workshop-form-${i}`
    document.getElementById(id).style.display = 'none'
}

const workshop = (e) =>{
    console.log(e)
    let  idBaca = e.target.parentElement.parentElement.parentElement.id
    let angkaidBaca = parseInt(idBaca.substring(idBaca.length - 1)) + 1
    let idBaru = `workshop-form-${angkaidBaca}`
    console.log(idBaru)
    document.getElementById(idBaca).style.display = 'none'
    document.getElementById(idBaru).style.display = "block"
}

const revworkshop = (e) =>{
    console.log(e)
    let  idBaca = e.target.parentElement.parentElement.parentElement.id
    let angkaidBaca = parseInt(idBaca.substring(idBaca.length - 1)) - 1
    let idBaru = `workshop-form-${angkaidBaca}`
    console.log(idBaru)
    document.getElementById(idBaca).style.display = 'none'
    document.getElementById(idBaru).style.display = "block"
}



</script>
    
@endsection