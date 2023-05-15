@extends('General.General')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card">
            <div class="card-body Header">
                <h2 class="fw-semibold"> Sports ( {{$sports->count()}} ) </h2>
                <a href="/admin/sports/create" type="button" class="btn btn-primary m-1">Create Sport</a>
            </div>
        </div>
        <div class="mx-auto">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($sports as $sport)
                        <tr>
                            <th scope="row">{{$sport['id']}}</th>
                            <td>{{$sport['title']}}</td>
                            <td class="TableButtons">
                                <a href="/admin/sports/{{$sport['id']}}"type="button" class="btn btn-success mx-2" >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                        <path d="M13.5 6.5l4 4"></path>
                                     </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection
