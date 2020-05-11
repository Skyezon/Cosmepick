@extends('layouts.head')

@section('title', 'Product')

@section('content')
@if(session('message'))
        <div class="alert alert-success">
                {{session('message')}}
        </div>
    @endif
   
<div class="detail-join-container">
  

    <div class="slide-container">
        @foreach ($workshop->workshopImages as $image)
        <img class="join-slides" src={{asset('storage/'.$image->url)}} alt="">
        @endforeach
        <button class="slide-button slide-left" onclick="plusDivs(-1)">&#10094;</button>
        <button class="slide-button slide-right" onclick="plusDivs(1)">&#10095;</button>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>

      var slideIndex = 1;
            showDivs(slideIndex);
            
            function plusDivs(n) {
              showDivs(slideIndex += n);
            }
        
        function showDivs(n) {
          var i;
          var x = document.getElementsByClassName("join-slides");
          if (n > x.length) {slideIndex = 1}
          if (n < 1) {slideIndex = x.length}
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
          }
          x[slideIndex-1].style.display = "block";  
        }
        var imported = document.createElement('script');
imported.src = '../../js/app.js';
document.head.appendChild(imported);
 
        $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

        
    </script>

    <!-- desc+join -->
    <div class="detail-desc-container">
        <!-- desc -->
        <div class="desc-join">
            <h2>
                {{$workshop->name}}
            </h2>
        <b>Date: </b>{{$workshop->date}}<br>
        <b>Address: </b>{{$workshop->location}}<br>
            <b>Price: </b>Rp {{number_format($workshop->price,2,',','.')}} <br>
            <b>Duration: </b>{{$workshop->duration}} hours <br>
            <span>{{$workshop->description}}. <br>
                For inquiries call: {{$user_phone}} <br>
            </span>
        </div>
        <!-- button -->
        <div class="join-detail-btn mt-3">
            <!-- wishlist -->
            <div >
                @if(Auth::check())
                                 @if(Auth::user()->chosenWorkshops()->wherePivot('workshop_status','wishlist')->where('workshop_id',$workshop->id)->first() ?? false)
                             <a class="img-link" href="{{route('unRegisWorkshop',['workshopId' => $workshop->id,'relationType' => 'wishlist'])}}" onclick="document.getElementById('myform').submit()">
                                <img src={{asset('assets/wishlist_btn.png')}} alt="wishlist-btn" style="filter:none"class="wishlist-btn">
                             </a>
                                @else
                             <a class="img-link" href="{{route('regisWorkshop',['workshopId' => $workshop->id,'relationType' => 'wishlist'])}}" onclick="document.getElementById('myform').submit()">
                                <img src={{asset('assets/wishlist_btn.png')}} alt="wishlist-btn"class="wishlist-btn">
                             </a>
                             @endif    
                             @else
                             <a class="img-link" href="{{route('login')}}" >
                                <img src={{asset('assets/wishlist_btn.png')}} alt="wishlist-btn"class="wishlist-btn">
                             </a>
                             @endif
            </div>
            <!-- join -->

        

            <div class="join-button-container">
                @if(Auth::check())
                @if(Auth::user()->chosenWorkshops()->wherePivot('workshop_status','upcoming')->where('workshop_id',$workshop->id)->first() ?? false)
                <a class="join-click" data-toggle="modal" data-target="#exampleModal" href="">
                    Leave the Class
                </a>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">                          Are you sure you wanted to leave the class?
                        </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        {{-- <div class="modal-body">

                        </div> --}}
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <a type="button" class="btn btn-success" href="{{route('unRegisWorkshop',['workshopId' => $workshop->id, 'relationType' => 'upcoming'])}}">Leave class</a>
                        </div>
                      </div>
                    </div>
                  </div>
                   @else
                   <a class="join-click" data-toggle="modal" data-target="#exampleModal" href="">
                    Join the Class
                </a>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">
                            Are you sure you want to register class?
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        {{-- <div class="modal-body">
                         
                        </div> --}}
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <a type="button" class="btn btn-success" href="{{route('regisWorkshop',['workshopId' => $workshop->id, 'relationType' => 'upcoming'])}}">Register class</a>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
        
                @else
                <a class="join-click" href="{{route('login')}}">
                    Join the Class
                </a>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection