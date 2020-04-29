@extends('layouts.head')

@section('title','Organize')

@section('content')

<form action="">
<div id="workshop-form-1">
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
        <a href="#" class="next-button button1" onclick="workshop(event)" >Next</a>
    </div>
    
</div>
    
    {{-- photo upload --}}
    <div id="workshop-form-2">
        <div id="title">
            <h1>Add Some Photos of Your Workshop</h1>       
        </div>
        <div id="title-content">
            <h4>Photos are important to give your workshop an intereseting impression</h4>
        </div>
        
        <div id="body-container">
            <div id="body-container0">
                <input type="image">
            </div>
            
            <div id="body-container1">
                <input type="image">
            </div>
            <div id="body-container2">
                <input type="image">
            </div>
            <div id="body-container3">
                <input type="image">
            </div>
            <div id="body-container4">
                <input type="image">
            </div>
        </div>
        
        <div id="button">
            <a href="#" class="next-button button1" onclick="workshop(event)">Next</a>
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
        
        
        <div id="content">
            <p>These Website Standard Terms and Conditions written on this webpage shall manage your use of this website. These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.</p>
        </div>
        
        
        <div id="agree-button">
            <a onclick="workshop(event)" class="ag-button">I Agree</a>
        </div>
        
        <div id="nagree-button" class="mb-5">
            <a href="" href={{route('ViewHome')}} class="nag-button">I Do Not Agree</a>
        </div>
        
        
    </div>
    
    
    {{--Verification--}}
    <div id="workshop-form-4">

        <div id="title">
            <h1>Verification</h1>
        </div>
        
        <div id="verifID-text">
            <p>1. Verification of Identity Card</p>
        </div>
        
        
        <div id="body-container">
            <div id="left-container">
                <div>
                    <p class="left-text">Photo of Your ID Card</p>
                </div>
                
                <div class="add-photo1">
                    <input type="image">
                </div>
        
            </div>
        
            <div id="right-container">
                
                <div>
                    <p class="right-text">Photo of Yourself with an ID Card</p>
                </div>
        
                <div class="add-photo2">
                    <input type="image">
                </div>
        
            </div>
        </div>
        
        <div id="button">
            <a href="#" class="next-button button1" onclick="workshop(event)">Next</a>
        </div>
    </div>
    
</form>

<script>

for(let i = 2; i < 5;i++){
    let id = `workshop-form-${i}`
    document.getElementById(id).style.display = 'none'
}

let workshop = (e) =>{
    console.log(e)
    let  idBaca = e.target.parentElement.parentElement.id
    let angkaidBaca = parseInt(idBaca.substring(idBaca.length - 1)) + 1
    let idBaru = `workshop-form-${angkaidBaca}`
    console.log(idBaru)
    document.getElementById(idBaca).style.display = 'none'
    document.getElementById(idBaru).style.display = "block"
}

</script>
    
@endsection