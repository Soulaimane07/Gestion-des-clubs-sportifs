@extends('General.General')

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
                    {{$etab[0]->etab}} - Players 
                </h2>
                <div>
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
                                <a href="/admin/player/{{$player['id']}}"type="button" class="btn btn-success mx-2" >
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