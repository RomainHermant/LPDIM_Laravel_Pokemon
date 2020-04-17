@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mt-5 border-top">
                <h3 class="my-3">
                    Liste des types
                    @if ($data->count() < 1)
                    <a href="{{ route('delete-types') }}" title="Supprimer tous les types.">
                        <img src="{{asset('storage/images/delete.svg')}}" alt="Supprimer" width="25" height="25">
                    </a>
                    @endif
                </h2>
                @if ( !$data->count())
                    <div class="card">
                        <div class="card-header">Type</div>
                            <div class="card-body">
                                Veuillez créer des types pour les pokemons!
                            </div>
                    </div>            
                @else
                <div class="d-flex flex-wrap">
                    @foreach($data as $p)
                        <span class="px-5 py-2 rounded-pill h5 font-weight-bold mr-2" style="background: {{$p->couleur}}; color: {{$p->couleurTxt}}">
                            {{$p->libelle}}
                            <a href="{{ route('delete-type', $p->id) }}" title="Supprimer." 
                                @foreach($pokes as $pk)
                                    @if ($p->id == $pk->type_id)
                                        style="display:none"
                                        @break;                           
                                    @endif
                                @endforeach
                                >
                                <img src="{{asset('storage/images/delete.svg')}}" alt="Supprimer" width="15" height="15">
                            </a>                            
                        </span>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="mt-5 border-top">
                <h3 class="my-3">
                    Ajouter un type de pokemon
                    <a class="btn btn-outline-dark" href="{{ route('generate-types') }}">Générer automatiquement les types</a>
                </h2>

                <span id="preview" class="px-5 py-2 rounded-pill h5 font-weight-bold"></span>    
                <form class='mt-3' action="{{route('new-type')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="couleur">Couleur du type:</label>
                                <input type="color" class="form-control" id="couleur" name="couleur" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="couleur-txt">Couleur du texte:</label>
                                <input type="color" class="form-control" id="couleur-txt" name="couleur-txt" required>
                            </div>
                        </div>
                    </div>      
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
                <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

                <script>
                    $(function() {
                        $('#nom').keyup(function() {
                            $('#preview').text($(this).val());
                        });
                        $('#couleur').change(function() {
                            $('#preview').css('background-color', $(this).val());
                        });
                        $('#couleur-txt').change(function() {
                            $('#preview').css('color', $(this).val());
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>
@endsection
