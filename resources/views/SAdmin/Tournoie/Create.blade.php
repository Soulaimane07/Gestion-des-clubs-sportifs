@extends('SAdmin/General.General')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
        <div class="card-body Header">
            <h1 class="card-title fw-semibold">Create Tournoie</h1>
        </div>
    </div>

    <div class="col-12 col-sm-6 mx-auto">
    <form method="POST" action="/admin/tournoie/create"  enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Image</label>
            <input type="file" class="form-control"  name="image">
        </div>
        
        <div class="w-sm mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp">
        </div>
        <div class="w-sm mb-3">
            <label for="title" class="form-label">Sport</label>
            <select name="etab" class="form-select" aria-label="Default select example">
                <option value="" selected>Open this select menu</option>
                @foreach ($sports as $sport)
                    <option value={{$sport['title']}}> {{$sport['title']}} </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">date Debut</label>
            <input type="date" class="form-control" required name="dateDebut">
        </div>
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">date Fin</label>
            <input type="date" class="form-control"  name="dateFin">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <div class="form-floating">
                <textarea class="form-control" name="desc" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>

        </div>
        
        <button type="submit" class="btn btn-primary w-100 p-3">Create</button>
    </form>
    </div>
</div>
@endsection