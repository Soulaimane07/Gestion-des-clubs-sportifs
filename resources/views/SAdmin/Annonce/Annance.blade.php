@extends('SAdmin.General.General')

@section('content')
  <div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body Header">
          <h2 class="fw-semibold">Annances ( {{$annances->count()}} )</h2>
          <a href="/admin/annance/create" type="button" class="btn btn-primary m-1">Create Annance</a>
        </div>
    </div>

    <div class="row">
        @foreach ($annances as $annance)
            <div class="col-md-5 col-lg-4">
                <div class="card mx-auto" style="width: 18rem;">
                    <a class="card-img-top DivImage" href="/admin/annance/{{$annance['id']}}">
                      <img src="{{asset('storage/images/annaces/'. $annance->image)}}" alt="...">
                    </a>
                    <div class="card-body">
                      <h5 class="card-title">{{$annance['title']}}</h5>
                      <p class="card-text"> {{Str::limit($annance['desc'], 100);}}</p>
                      <a href="/admin/annance/{{$annance['id']}}" class="btn btn-primary">See more...</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
  </div>
@endsection