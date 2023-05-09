@extends('General.General')

@section('content')
  <div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body Header">
          <h2 class="fw-semibold">Tournoies ( {{$tournoies->count()}} ) </h2>
          <a href="/tournoie/create" type="button" class="btn btn-primary m-1">Create Tournoie</a>
        </div>
    </div>

    <div class="row">
        @foreach ($tournoies as $tournoie)
            <div class="col-md-5 col-lg-4">
                <div class="card mx-auto" style="width: 18rem;">
                    <a href="/tournoie/{{$tournoie['id']}}">
                      <img src="{{asset('storage/images/tournoies/'. $tournoie->image)}}" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                      <h5 class="card-title">{{$tournoie['title']}}</h5>
                      <div style="display: flex; align-items:center">
                        <h6 class="text-success "> {{$tournoie['dateDebut']}} </h6> 
                        <span> -> </span>
                        <h6 class="text-danger"> {{$tournoie['dateFin']}} </h6> 
                      </div>
                      <p class="card-text">{{Str::limit($tournoie['desc'], 100);}}</p>
                      <a href="/tournoie/{{$tournoie['id']}}" class="btn btn-primary">See more...</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
  </div>
@endsection