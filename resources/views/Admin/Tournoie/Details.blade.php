@extends('Admin.General.General')

@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-body Header">
                <h2 class="fw-semibold"> {{$tournoie['title']}} </h2>
            </div>
        </div>
        
        <form method="POST" action="/participation" class="container-fluid col-12 col-sm-6 mx-auto">
            @csrf
            <div style="display: none">
                <input name="tournoie" value={{$tournoie['id']}} />
                <input name="etab" value={{ Auth::user()->etab }} />
            </div>
                
            <img src="{{asset('storage/images/tournoies/'. $tournoie->image)}}" style="width: 100%" class="card-img-top AnnanceImage" alt="...">
            <div class="card-body">
                <h1> {{$tournoie['title']}} </h1>
                <div style="display: flex; align-items:center">
                    <h6 class="text-success "> {{$tournoie['dateDebut']}} </h6> 
                    <span> / </span>
                    <h6 class="text-danger"> {{$tournoie['dateFin']}} </h6> 
                </div>
                <p class=""> {{$tournoie['desc']}} </p>
            </div>
            <div class="Buttons">
                @if(!$isParticipated)
                    <button type="submit" class="btn btn-success p-3 mx-auto"> Participer </button>
                @endif

                @if($isParticipated)
                    <button type="button" class="btn btn-danger p-3 mx-auto" data-bs-toggle="modal" data-bs-target="#deleteModal"> Cancel Participation </button>
                @endif
            </div>
        </form>

        @if($isParticipated)
            <div class="card mt-9">
                <div class="card-body Header">
                    <h4 class="fw-semibold"> les joueures </h4>
                    <div>
                        @if($players)
                            <a href="/playersTable/{{$tournoie['id']}}"type="button" class="btn btn-success mx-2">
                                Imprimer le tableau
                            </a>
                            <a href="/playersCard/{{$tournoie['id']}}"type="button" class="btn btn-success mx-2">
                                Imprimer les cartes
                            </a>
                        @endif
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Create Joueure
                        </button>
                    </div>
                </div>

                <div >
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
                            @foreach ($players as $player)
                                <tr>
                                    <th scope="row">{{$player['id']}}</th>
                                    <td>{{$player['CNI']}}</td>
                                    <td>{{$player['CNE']}}</td>
                                    <td>{{$player['lname']}} {{$player['fname']}}</td>
                                    <td>{{$player['filier']}}</td>
                                    <td class="TableButtons">
                                        <a href="player/{{$player['id']}}"type="button" class="btn btn-success mx-2" >
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

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"> Info de Joueure  </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="/tournoie/Cplayer" class="modal-body" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3" style="display: none">
                                <label for="tournoie" class="form-label"> Tournoie </label>
                                <input type="text" value={{$tournoie['id']}} class="form-control" required name="tournoie">
                            </div>
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Image</label>
                                <input type="file" accept="image/*" class="form-control" name="image">
                            </div>
                            <div class="mb-3">
                                <label for="fname" class="form-label">First name</label>
                                <input type="text" class="form-control"  name="fname">
                            </div>
                            <div class="mb-3">
                                <label for="lname" class="form-label">Last name</label>
                                <input type="text" class="form-control"  name="lname">
                            </div>
                            <div class="mb-3" style="display: none">
                                <label for="filier" class="form-label">Etablissement</label>
                                <input type="text" class="form-control" value={{ Auth::user()->etab }}  name="etab">
                            </div>
                            <div class="mb-3">
                                <label for="filier" class="form-label">Filier</label>
                                <input type="text" class="form-control"  name="filier">
                            </div>
                            <div class="mb-3">
                                <label for="CNI" class="form-label">CIN</label>
                                <input type="text" class="form-control"  name="CNI">
                            </div>
                            <div class="mb-3">
                                <label for="CNI" class="form-label">CIN</label>
                                <input type="file" accept="image/*" class="form-control"  name="CNIImage">
                            </div>
                            <div class="mb-3">
                                <label for="CNE" class="form-label">CNE</label>
                                <input type="text" class="form-control"  name="CNE">
                            </div>
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Attestation</label>
                                <input type="file" accept="image/*" class="form-control" name="attestation">
                            </div>
                            
                            
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="input" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        @endif
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
                <h4 class="mb-8" style="text-align: center"> Vous voulez vraiment supprimer participation ? </h4> 
                <br>
                <div class="Buttons">
                    <button data-bs-toggle="modal" data-bs-target="#deleteModal" type="button" class="button btn btn-success">Non, Cancel</button>
                    <form class="button" action="{{url('/participation/'.$tournoie['id'])}}" method="post">
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button id="delete" class="w-100 btn btn-danger"> Oui, I'm sure </button> 
                    </form>
                </div>
            </div>
          </div>
        </div>
    </div>

    

@endsection