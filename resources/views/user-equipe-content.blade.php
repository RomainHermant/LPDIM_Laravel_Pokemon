<h3 class="my-4 bg-dark text-white p-2">Equipe de {{$user->name}}</h3>
@if ( !$user->pokemons->count() )
    <div class="card">
        <div class="card-header">Equipe vide</div>
        <div class="card-body">
            L'utilisateur n'a pas ajoutés de pokemons à son équipe!
        </div>
    </div>            
@else
<div class="d-flex justify-content-around my-3">
    @foreach ($user->pokemons->slice(0,2) as $p)
        <button type="button" class="btn btn-light border border-secondary" data-toggle="modal" data-target="#{{$p->nom}}-{{$p->id}}">
            <img src="{{asset('storage/images/'.$p->image)}}" alt="{{$p->nom}}" width="100" height="100">  
        </button>
        <div class="modal" id="{{$p->nom}}-{{$p->id}}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            No.{{$p->id}} - {{$p->nom}}
                            <img src="{{asset('storage/images/pokeball-capture.svg')}}" alt="Pokeball vide" width="20" height="20" title="Le pokemon fait partie de mon équipe.">                            
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
                                            <div class="row text-white h4">{{$p->pv}}</div>
                                        </div>
                                        <div class="col">
                                            <div class="row text-light">Vitesse</div>
                                            <div class="row text-white h4">{{$p->vitesse}}</div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <div class="row text-light">Attaque</div>
                                            <div class="row text-white h4">{{$p->attaque}}</div>
                                        </div>
                                        <div class="col">
                                            <div class="row text-light">Défense</div>
                                            <div class="row text-white h4">{{$p->defense}}</div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <div class="row text-light">Attaque Spé</div>
                                            <div class="row text-white h4">{{$p->attaque_spe}}</div>
                                        </div>
                                        <div class="col">
                                            <div class="row text-light">Défense Spé</div>
                                            <div class="row text-white h4">{{$p->defense_spe}}</div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <div class="row text-light">Taille</div>
                                            <div class="row text-white h4">{{$p->taille}} m</div>
                                        </div>
                                        <div class="col">
                                            <div class="row text-light">Poids</div>
                                            <div class="row text-white h4">{{$p->poids}} kg</div>
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
                        <a href="{{ route('supprimer-pokemon-utilisateur', [$user->id, $p->id]) }}">
                        <button type="button" class="btn btn-danger">Supprimer de l'équipe de {{$user->name}}</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="d-flex justify-content-around my-3">
    @foreach ($user->pokemons->slice(2,2) as $p)
        <button type="button" class="btn btn-light border border-secondary" data-toggle="modal" data-target="#{{$p->nom}}-{{$p->id}}">
            <img src="{{asset('storage/images/'.$p->image)}}" alt="{{$p->nom}}" width="100" height="100">  
        </button>
        <div class="modal" id="{{$p->nom}}-{{$p->id}}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            No.{{$p->id}} - {{$p->nom}}
                            <img src="{{asset('storage/images/pokeball-capture.svg')}}" alt="Pokeball vide" width="20" height="20" title="Le pokemon fait partie de mon équipe.">                            
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
                                            <div class="row text-white h4">{{$p->pv}}</div>
                                        </div>
                                        <div class="col">
                                            <div class="row text-light">Vitesse</div>
                                            <div class="row text-white h4">{{$p->vitesse}}</div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <div class="row text-light">Attaque</div>
                                            <div class="row text-white h4">{{$p->attaque}}</div>
                                        </div>
                                        <div class="col">
                                            <div class="row text-light">Défense</div>
                                            <div class="row text-white h4">{{$p->defense}}</div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <div class="row text-light">Attaque Spé</div>
                                            <div class="row text-white h4">{{$p->attaque_spe}}</div>
                                        </div>
                                        <div class="col">
                                            <div class="row text-light">Défense Spé</div>
                                            <div class="row text-white h4">{{$p->defense_spe}}</div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <div class="row text-light">Taille</div>
                                            <div class="row text-white h4">{{$p->taille}} m</div>
                                        </div>
                                        <div class="col">
                                            <div class="row text-light">Poids</div>
                                            <div class="row text-white h4">{{$p->poids}} kg</div>
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
                        <a href="{{ route('supprimer-pokemon-utilisateur', [$user->id, $p->id]) }}">
                        <button type="button" class="btn btn-danger">Supprimer de l'équipe de {{$user->name}}</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="d-flex justify-content-around my-3">
    @foreach ($user->pokemons->slice(4,5) as $p)
        <button type="button" class="btn btn-light border border-secondary" data-toggle="modal" data-target="#{{$p->nom}}-{{$p->id}}">
            <img src="{{asset('storage/images/'.$p->image)}}" alt="{{$p->nom}}" width="100" height="100">  
        </button>
        <div class="modal" id="{{$p->nom}}-{{$p->id}}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            No.{{$p->id}} - {{$p->nom}}
                            <img src="{{asset('storage/images/pokeball-capture.svg')}}" alt="Pokeball vide" width="20" height="20" title="Le pokemon fait partie de mon équipe.">                            
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
                                            <div class="row text-white h4">{{$p->pv}}</div>
                                        </div>
                                        <div class="col">
                                            <div class="row text-light">Vitesse</div>
                                            <div class="row text-white h4">{{$p->vitesse}}</div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <div class="row text-light">Attaque</div>
                                            <div class="row text-white h4">{{$p->attaque}}</div>
                                        </div>
                                        <div class="col">
                                            <div class="row text-light">Défense</div>
                                            <div class="row text-white h4">{{$p->defense}}</div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <div class="row text-light">Attaque Spé</div>
                                            <div class="row text-white h4">{{$p->attaque_spe}}</div>
                                        </div>
                                        <div class="col">
                                            <div class="row text-light">Défense Spé</div>
                                            <div class="row text-white h4">{{$p->defense_spe}}</div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <div class="row text-light">Taille</div>
                                            <div class="row text-white h4">{{$p->taille}} m</div>
                                        </div>
                                        <div class="col">
                                            <div class="row text-light">Poids</div>
                                            <div class="row text-white h4">{{$p->poids}} kg</div>
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
                        <a href="{{ route('supprimer-pokemon-utilisateur', [$user->id, $p->id]) }}">
                        <button type="button" class="btn btn-danger">Supprimer de l'équipe de {{$user->name}}</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endif