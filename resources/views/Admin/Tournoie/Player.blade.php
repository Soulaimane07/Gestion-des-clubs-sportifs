@extends('Admin.General.General')

@section('content')
  <div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body Header">
          <h2 class="fw-semibold"> {{$player->lname}}  {{$player->fname}} </h2>
        </div>
    </div>
    <div class="container-fluid col-12 col-sm-6 mx-auto">
        <div>
            <img src="{{asset('storage/images/players/image/'. $player->image)}}" style="width: 100%" class="card-img-top AnnanceImage" alt="...">
            <h4> Player full name </h4>
            <p> {{$player->lname}}  {{$player->fname}} </p>
        </div>
        <div>
            <h4> Player CIN </h4>
            <p> {{$player->CNI}} </p>
        </div>
        <div>
            <h4> Player CNE </h4>
            <p> {{$player->CNE}} </p>
        </div>
        <div>
            <h4> Player Filliere </h4>
            <p> {{$player->filier}} </p>
        </div>
        <div>
            <h4> Player CIN Image </h4>
            <img src="{{asset('storage/images/players/cin/'. $player->CNIImage)}}" style="width: 100%" class="card-img-top AnnanceImage" alt="...">
        </div>
        <div>
            <h4> Player Attestation </h4>
            <img src="{{asset('storage/images/players/attestation/'. $player->attestation)}}" style="width: 100%" class="card-img-top AnnanceImage" alt="...">
        </div>
    </div>

@endsection
