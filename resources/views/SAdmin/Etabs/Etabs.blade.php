@extends('SAdmin/General.General')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <div class="card">
        <div class="card-body Header">
            <h2 class="fw-semibold">Etablissements ( {{$etabs->count()}} ) </h2>
            <a href="/admin/etablissements/create" type="button" class="btn btn-primary m-1">Create Etablissement</a>
        </div>
    </div>
    <div class="mx-auto">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Etablissement</th>
                <th scope="col">Breviation</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($etabs as $etab)
                    <tr>
                        <th scope="row">{{$etab['id']}}</th>
                        <td>{{$etab['etab']}}</td>
                        <td>{{$etab['bref']}}</td>
                        <td class="TableButtons">
                            <a href="/admin/etablissements/{{$etab['id']}}"type="button" class="btn btn-success mx-2" >
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-filled" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 4c4.29 0 7.863 2.429 10.665 7.154l.22 .379l.045 .1l.03 .083l.014 .055l.014 .082l.011 .1v.11l-.014 .111a.992 .992 0 0 1 -.026 .11l-.039 .108l-.036 .075l-.016 .03c-2.764 4.836 -6.3 7.38 -10.555 7.499l-.313 .004c-4.396 0 -8.037 -2.549 -10.868 -7.504a1 1 0 0 1 0 -.992c2.831 -4.955 6.472 -7.504 10.868 -7.504zm0 5a3 3 0 1 0 0 6a3 3 0 0 0 0 -6z" stroke-width="0" fill="currentColor"></path>
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