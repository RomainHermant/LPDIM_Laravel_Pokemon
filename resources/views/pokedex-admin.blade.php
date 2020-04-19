@extends('layouts.app')

@auth
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ( !$data->count() )
                <div class="card">
                    <div class="card-header">Pokedex</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Le pokedex ne contient aucun pokemon!
                    </div>
                </div>            
            @else
                <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

                <input style="width: 100%" type="text" id="myInput" onkeyup="myFunction()" placeholder="Recherche..">
                <table class="table table-hover" id="myTable">
                    <thead class="thead-dark">
                        <tr class="header">
                            <th></th>
                            <th>Numéro</th>
                            <th>Nom</th>
                            <th>Pv</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $p)
                            <tr class="table-row h4" data-toggle="modal" data-target="#{{$p->nom}}-{{$p->id}}">
                                <th scope="row">
                                    @if ($p->image == null)
                                        <img src="{{asset('storage/images/pokemon-default.png')}}" alt="{{$p->nom}}" class="img-thumbnail" width="125" height="125">                                
                                    @else                               
                                        <img src="{{asset('storage/images/'.$p->image)}}" alt="{{$p->nom}}" class="img-thumbnail" width="125" height="125">                                
                                    @endif
                                </th>
                                <th class="align-middle" scope="row">No.{{$p->id}}</th>
                                <td class="align-middle">{{$p->nom}}</td>
                                <td class="align-middle">{{$p->pv}}</td>
                                <td class="align-middle">
                                    @if ($p->type)
                                        <span class="px-5 py-2 rounded-pill h5 font-weight-bold" style="background: {{$p->type->couleur}}; color: {{$p->type->couleurTxt}}">
                                            {{$p->type->libelle}}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            <div class="modal" id="{{$p->nom}}-{{$p->id}}">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{route('update', $p->id)}}" method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title">
                                                    No.{{$p->id}} - {{$p->nom}}                                     
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <img src="{{asset('storage/images/'.$p->image)}}" alt="{{$p->nom}}" class="img-thumbnail">                                
                                                    </div>
                                                    <div class="col border mr-3 bg-dark rounded h5 py-3">
                                                        <div class="mx-5">
                                                            <div class="row my-2">
                                                                <div class="col">
                                                                    <div class="row text-light">Pv</div>
                                                                    <div class="row text-white h4">
                                                                        <input type="number" value="{{$p->pv}}" step="1" min="1" class="form-control mr-5" id="pv" name="pv" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row text-light">Vitesse</div>
                                                                    <div class="row text-white h4">
                                                                        <input type="number" value="{{$p->vitesse}}" step="1" min="1" class="form-control mr-5" id="vitesse" name="vitesse" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row my-2">
                                                                <div class="col">
                                                                    <div class="row text-light">Attaque</div>
                                                                    <div class="row text-white h4">
                                                                        <input type="number" value="{{$p->attaque}}" step="1" min="1" class="form-control mr-5" id="attaque" name="attaque" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row text-light">Défense</div>
                                                                    <div class="row text-white h4">
                                                                        <input type="number" value="{{$p->defense}}" step="1" min="1" class="form-control mr-5" id="defense" name="defense" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row my-2">
                                                                <div class="col">
                                                                    <div class="row text-light">Attaque Spé</div>
                                                                    <div class="row text-white h4">
                                                                        <input type="number" value="{{$p->attaque_spe}}" step="1" min="1" class="form-control mr-5" id="attaque_spe" name="attaque_spe" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row text-light">Défense Spé</div>
                                                                    <div class="row text-white h4">
                                                                        <input type="number" value="{{$p->defense_spe}}" step="1" min="1" class="form-control mr-5" id="defense_spe" name="defense_spe" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row my-2">
                                                                <div class="col">
                                                                    <div class="row text-light">Taille</div>
                                                                    <div class="row text-white h4">
                                                                        <input type="number" value="{{$p->taille}}" step="0.1" min="0.1" class="form-control mr-5" id="taille" name="taille" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <div class="row text-light">Poids</div>
                                                                    <div class="row text-white h4">
                                                                        <input type="number" value="{{$p->poids}}" step="0.1" min="0.1" class="form-control mr-5" id="poids" name="poids" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                @if ($p->type)
                                                                    <span class="px-5 py-2 rounded-pill h5 font-weight-bold" style="background: {{$p->type->couleur}}; color: {{$p->type->couleurTxt}}">
                                                                        {{$p->type->libelle}}
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-primary">Modifier le pokemon</button>
                                                <a href="{{ route('delete-pokemon', $p->id) }}">
                                                    <button type="button" class="btn btn-danger">Supprimer le pokemon</button>
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>

                <script>
                    $(document).ready(function(){
                      $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("tbody tr").filter(function() {
                          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                        });
                      });
                    });
                </script>
            @endif
        </div>
    </div>
</div>
@endsection
@endauth
