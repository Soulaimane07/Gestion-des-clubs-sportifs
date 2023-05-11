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