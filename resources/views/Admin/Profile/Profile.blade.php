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

      
      <div class="mb-3">
        <h4> Email Address </h4>
        <h5> {{ Auth::user()->email }} </h5>
      </div>
      <div class="mb-3">
        <h4> First Name </h4>
        <h5> {{ Auth::user()->fname }} </h5>
      </div>
      <div class="mb-3">
        <h4> Last Name </h4>
        <h5> {{ Auth::user()->lname }} </h5>
      </div>

        <div class="Buttons">
            <button type="button" class="btn btn-success p-3" data-bs-toggle="modal" data-bs-target="#updateModal">Update</button>
        </div>
    </div>
</div>


<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> Update My Profile </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label"> Email </label>
                  <input id="email" type="email" name="email" value="{{ Auth::user()->email }}" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="fname" class="form-label"> First name </label>
                  <input type="text" name="fname" value="{{ Auth::user()->fname }}" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="lname" class="form-label"> Last name </label>
                  <input type="text" name="lname" value="{{ Auth::user()->lname }}" class="form-control">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label"> Password </label>
                  <input id="password" type="password" name="password" value="{{ Auth::user()->password }}" class="form-control">
                </div>
                <div class="modal-footer">
                  <a  class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                  <button  class="btn btn-primary">Save changes</button>
                </div>
              </form>
        </div>
      </div>
    </div>
</div>
@endsection
