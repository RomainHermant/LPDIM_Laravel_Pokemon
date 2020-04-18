@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mt-5 border-top">
                <h3 class="my-3">Mon équipe</h3>
                @if ( !$user->pokemons->count() )
                    <div class="card">
                        <div class="card-header">Mon équipe</div>
                            <div class="card-body">
                                Votre équipe est vide! Veuillez ajouter des pokemons via le pokedex.
                            </div>
                    </div>            
                @else
                    @foreach ($user->pokemons as $u)
                    <img src="{{asset('storage/images/'.$u->image)}}" alt="{{$u->nom}}" class="img-thumbnail" width="125" height="125">  
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection