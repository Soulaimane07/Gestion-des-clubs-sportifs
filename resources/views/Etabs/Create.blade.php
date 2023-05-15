@extends('General.General')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
        <div class="card-body Header">
            <h1 class="card-title fw-semibold">Create Etablissement</h1>
        </div>
    </div>

    <div class="col-12 col-sm-6 mx-auto">
        <form method="POST" action="/admin/etablissements/create" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Image</label>
                <input type="file" accept="image/*" class="form-control" name="image">
            </div>
            <div class="mb-3">
                <label for="etab" class="form-label">Etablissement</label>
                <input type="text" class="form-control" required name="etab">
            </div>
            <div class="mb-3">
                <label for="bref" class="form-label">Breviation</label>
                <input type="text" class="form-control" required name="bref">
            </div>
            
            <button type="submit" class="btn btn-primary w-100 p-3">Create</button>
        </form>
    </div>
</div>
@endsection
