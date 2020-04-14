@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mt-5 border-top">
                <h3 class="my-3">Ajouter un pokemon au pokedex</h2>
                <form action="{{route('create')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="pv">Pv :</label>
                                <input type="number" value="1" step="1" min="1" class="form-control" id="pv" name="pv" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="vitesse">Vitesse :</label>
                                <input type="number" value="1" step="1" min="1" class="form-control" id="vitesse" name="vitesse" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="attaque">Attaque :</label>
                                <input type="number" value="1" step="1" min="1" class="form-control" id="attaque" name="attaque" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="defense">Défense :</label>
                                <input type="number" value="1" step="1" min="1" class="form-control" id="defense" name="defense" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="attaque_spe">Attaque spéciale :</label>
                                <input type="number" value="1" step="1" min="1" class="form-control" id="attaque_spe" name="attaque_spe" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="defense_spe">Défense spéciale :</label>
                                <input type="number" value="1" step="1" min="1" class="form-control" id="defense_spe" name="defense_spe" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="taille">Taille (en mètres) :</label>
                                <input type="number" value="1.0" step="0.1" min="0" class="form-control" id="taille" name="taille" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="poids">Poids (en kg) :</label>
                                <input type="number" value="1.0" step="0.1" min="0" class="form-control" id="poids" name="poids" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
