@extends('General.General')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
        <div class="card-body Header">
            <h1 class="card-title fw-semibold">Create sport</h1>
        </div>
    </div>

    <div class="col-12 col-sm-6 mx-auto">
        <form method="POST" action="/sports/create">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label"> Title </label>
                <input type="title" class="form-control" name="title">
            </div>
            
            <button type="submit" class="btn btn-primary w-100 p-3">Create</button>
        </form>
    </div>
</div>
@endsection
