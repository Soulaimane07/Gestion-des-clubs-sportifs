@extends('SAdmin/General.General')

@section('content')
    <div class="container-fluid ">
        <div class="container-fluid">
            <div class="card">
            <div class="card-body Header">
                <h1 class="card-title fw-semibold">Create Annace</h1>
            </div>
        </div>

        <div class="col-12 col-sm-6 mx-auto">
            <form method="POST" action="/admin/annance/create" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Image</label>
                    <input type="file" accept="image/*" class="form-control" name="image">
                </div>
                <div class="mb-3">
                    <label for="formFileMultiple" class="form-label">Video</label>
                    <input class="form-control" accept="video/*" name="video" type="file" id="formFileMultiple">
                </div>
                <div class="w-sm mb-3">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <div class="form-floating">
                        <textarea class="form-control" name="desc" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Comments</label>
                    </div>
                </div>
                
                <input type="submit" class="btn btn-primary w-100 p-3" name="Create" value="Create"></input>
            </form>
        </div>
    </div>
@endsection
