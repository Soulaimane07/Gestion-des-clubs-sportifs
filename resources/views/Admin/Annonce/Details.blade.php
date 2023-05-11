@extends('Admin/General.General')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body Header">
                <h2 class="fw-semibold"> {{$annance['title']}} </h2>
            </div>
        </div>
        
        <div class="container-fluid col-12 col-sm-6 mx-auto">
            <img src="{{asset('storage/images/annaces/'. $annance->image)}}" style="width: 100%" class="card-img-top AnnanceImage" alt="...">
            <div class="card-body">
                <h2 class=""> {{$annance['title']}} </h2>
                <p class=""> {{$annance['desc']}} </p>
                @if($annance->video)
                <div style="margin-bottom: 60px;" class="mx-auto col-12 col-sm-8">
                  <video class="Video" src="{{asset('storage/videos/annaces/'. $annance->video)}}" poster="{{asset('storage/images/annaces/'. $annance->image)}}" controls width="100%" ></video>
                </div>
                @endif
            </div>
          </div>
        </div>
      </div>
    </div>
    
@endsection
