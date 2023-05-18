@extends('SAdmin/General.General')

@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-body Header">
                <h2 class="fw-semibold"> {{$tournoie['title']}} </h2>
            </div>
        </div>
        
        <div class="">
            <div class="card-body Header mb-9">
                <h2 class="fw-semibold"> 
                    {{$etab[0]->bref}} - Players ( {{$players->count()}} )
                </h2>
                <div>

                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" >Cancel Participation</button>
                    <a href="/admin/playersTable/tournoie/{{$tournoie['id']}}/etab/{{$etab[0]->bref}}"type="button" class="btn btn-success mx-2">
                        Imprimer le tableau
                    </a>
                    <a href="/admin/playersCard/tournoie/{{$tournoie['id']}}/etab/{{$etab[0]->bref}}"type="button" class="btn btn-success mx-2">
                        Imprimer les cartes
                    </a>
                </div>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">CNI</th>
                    <th scope="col">CNE</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Fillier</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($players as $key => $player)
                        <tr>
                            <th scope="row">{{++$key}}</th>
                            <td>{{$player['CNI']}}</td>
                            <td>{{$player['CNE']}}</td>
                            <td>{{$player['lname']}} {{$player['fname']}}</td>
                            <td>{{$player['filier']}}</td>
                            <td class="TableButtons">
                                <a href="/admin/tournoie/{{$tournoie->id}}/player/{{$player['id']}}"type="button" class="btn btn-success mx-2" >
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

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="mx-50 w-100 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-100 icon icon-tabler icon-tabler-alert-circle-filled" width="50" height="50" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M12 2c5.523 0 10 4.477 10 10a10 10 0 0 1 -19.995 .324l-.005 -.324l.004 -.28c.148 -5.393 4.566 -9.72 9.996 -9.72zm.01 13l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -8a1 1 0 0 0 -.993 .883l-.007 .117v4l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-4l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="#dc3545"></path>
                </svg>
                </div>
                <h4 class="mb-8" style="text-align: center"> Vous voulez vraiment Cancel Participation tournoie ? </h4> 
                <br>
                <div class="Buttons">
                    <button data-bs-toggle="modal" data-bs-target="#deleteModal" type="button" class="button btn btn-success">Non, Cancel</button>
                    <form class="button" action="{{url('/admin/cancel/tournoie/'.$tournoie["id"].'/etab/'.$etab[0]->bref)}}" method="post">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button id="delete" class="w-100 btn btn-danger"> Oui, I'm sure </button> 
                    </form>
                </div>
            </div>
        </div>
        </div>


@endsection