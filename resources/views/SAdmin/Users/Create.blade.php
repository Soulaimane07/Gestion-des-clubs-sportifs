@extends('SAdmin/General.General')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
        <div class="card-body Header">
            <h1 class="card-title fw-semibold">Create User</h1>
        </div>
    </div>

    <div class="col-12 col-sm-6 mx-auto">
        <form method="POST" action="/admin/users/create">
            @csrf
            <div class="mb-3">
                <label for="etab" class="form-label"> Etablissement </label>
                <select name="etab" class="form-select" aria-label="Default select example">
                    <option value="" selected>Open this select menu</option>
                    @foreach ($etabs as $etab)
                        <option value={{$etab['bref']}}> {{$etab['etab']}} </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label"> Email Address </label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="fname" class="form-label"> First Name </label>
                <input type="fname" class="form-control" name="fname">
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label"> Last Name </label>
                <input type="lname" class="form-control" name="lname">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label"> Password </label>
                <input type="password" class="form-control" name="password">
            </div>
            
            <button type="submit" class="btn btn-primary w-100 p-3">Create</button>
        </form>
    </div>
</div>
@endsection
