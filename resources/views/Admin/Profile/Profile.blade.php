@extends('Admin.General.General')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
        <div class="card-body Header">
            <h2 class="fw-semibold"> My Profile </h2>
        </div>
    </div>

    <div class="container-fluid col-12 col-sm-6 mx-auto">

      
      <div class="mb-3" style="display: flex; align-items: center; justify-content: space-between">
        <h4> Email Address </h4>
        <h5> {{ Auth::user()->email }} </h5>
      </div>
      <div class="mb-3" style="display: flex; align-items: center; justify-content: space-between">
        <h4> First Name </h4>
        <h5> {{ Auth::user()->fname }} </h5>
      </div>
      <div class="mb-3" style="display: flex; align-items: center; justify-content: space-between">
        <h4> Last Name </h4>
        <h5> {{ Auth::user()->lname }} </h5>
      </div>

    </div>
</div>

</div>
@endsection
