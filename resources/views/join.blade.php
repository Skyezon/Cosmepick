@extends('layouts.head')

@section('title','Join')

@section('content')
@if(session('message'))
<div class="alert alert-success">
    {{session('message')}}
</div>
@endif
<div id="overlay">
    <div>
        <div class="price">
            <form action="{{route('FilterJoin')}}" method="POST">
                @csrf

                <h3>Price</h3>
                <label class="radio-container">less or equal to Rp100.000,00
                    <input type="radio" name="filterPrice", value="1" checked>
                    <a class="checkmark"></a>
                </label>
                <label class="radio-container">less or equal to Rp200.000,00
                    <input type="radio" name="filterPrice", value="2">
                    <a class="checkmark"></a>
                </label>
                <label class="radio-container">more than Rp200.000,00
                    <input type="radio" name="filterPrice", value="3">
                    <a class="checkmark"></a>
                </label>
                <button type="submit" id="ok-filter">OK</button>
                
            </form>
        </div>
    </div>
</div>



<div id="filter">
    <a onclick="on()" id="filter-click">Filter</a>
</div>
<div id="body-join">

    <div class="my-5">
        @foreach ($workshops as $workshop)
        <div class=" d-flex justify-content-center align-items-center" style="width: 80vw; margin-bottom: 4rem">
            <div class="left-container" style="width: 40vw">
                <p class="fas fa-sm">
                    <span>{{$workshop->name}}</span>
                    <div class="d-flex">
                        <div class="d-flex flex-lg-column ">
                            <b>Date:</b>
                            <b>Location:</b>
                            <b>Price:</b>
                            <b>Duration:</>
                        </div>
                        <div class="d-flex flex-column flex-nowrap ml-4">
                            <span>{{$workshop->date}}</span>
                            <span> {{$workshop->location}}</span>
                            <span>Rp {{number_format($workshop->price,2,',','.')}}</span>
                            <span>{{$workshop->duration}} hours</span>
                        </div>
                    </div>
                </p>
                <div class="d-flex align-items-center">
                    <div class="mr-5">
                        <a name="" id="" class="btn btn-primary text-light"
                            href={{route('ViewWorkshop',['id' => $workshop->id])}} role="button">Details</a>
                    </div>

                     
                        @if(Auth::check())
                        @if(Auth::user()->chosenWorkshops()->wherePivot('workshop_status','wishlist')->where('workshop_id',$workshop->id)->first()
                        ?? false)
                        <a class="img-link"
                            href="{{route('unRegisWorkshop',['workshopId' => $workshop->id,'relationType' => 'wishlist'])}}"
                            onclick="document.getElementById('myform').submit()">
                            <img src={{asset('assets/wishlist_btn.png')}} alt="makeup-{{$loop->index}}" style="filter:none"
                                class="wishlist-btn">
                        </a>
                        @else
                        <a class="img-link"
                            href="{{route('regisWorkshop',['workshopId' => $workshop->id,'relationType' => 'wishlist'])}}"
                            onclick="document.getElementById('myform').submit()">
                            <img src={{asset('assets/wishlist_btn.png')}} alt="makeup-{{$loop->index}}"
                                class="wishlist-btn">
                        </a>
                        @endif
                        @else
                        <a class="img-link" href="{{route('login')}}">
                            <img src={{asset('assets/wishlist_btn.png')}} alt="makeup-{{$loop->index}}"
                                class="wishlist-btn">
                        </a>
                        @endif
                    
                   

                </div>
            </div>
            <div class="">



                <a class="img-link" href={{route('ViewWorkshop',['id' => $workshop->id])}}>
                    <img src={{asset('storage/'.$workshop->workshopImages()->first()->url)}}
                        alt="makeup-{{$loop->index}}" class="class-img-{{$loop->index}}">
                </a>
            </div>
        </div>

        @endforeach

    </div>


    <div class="mt-5">
        {{$workshops->links()}}

    </div>

</div>

<script>
    function on() {
        document.getElementById("overlay").style.display = "block";
    }

    function off() {
        document.getElementById("overlay").style.display = "none";
    }

</script>

@endsection
