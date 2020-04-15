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
                            <th>Type</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $p)
                        <tr class="table-row h4" data-toggle="modal" data-target="#infos">
                            <th scope="row">
                                @if ($p->image == null)
                                    <img src="{{asset('storage/images/pokemon-default.png')}}" alt="{{$p->nom}}" class="img-thumbnail" width="125" height="125">                                
                                @else                               
                                    <img src="{{asset('storage/images/'.$p->image)}}" alt="{{$p->nom}}" class="img-thumbnail" width="125" height="125">                                
                                @endif
                            </th>
                            <th class="align-middle" scope="row">No.{{$p->id}}</th>
                            <td class="align-middle" style="">{{$p->nom}}</td>
                            <td class="align-middle">{{$p->poids}}</td>
                            <td class="align-middle">
                                <a class="text-danger font-weight-bold" href="{{ route('home', $p->id) }}">Supprimer</a>
                            </td>
                            <div class="modal" id="infos">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{$p->nom}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Modal body text goes here.</p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        <button type="button" class="btn btn-primary">Ajouter à mon équipe</button>
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
