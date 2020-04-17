@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mt-5 border-top">
                <h3 class="my-3">Ajouter un pokemon au pokedex</h2>
                @if ( !$data->count() )
                    <div class="card">
                        <div class="card-header">Type</div>
                            <div class="card-body">
                                L'administrateur doit créer au moins un type pour pouvoir ajouter un pokemon!
                            </div>
                    </div>            
                @else
                <form action="{{route('create')}}" method="POST" enctype="multipart/form-data">
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
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Ajouter
                      </button>
                      <div class="modal" id="exampleModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Ajouter une image</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <label class="input-group-text" for="type">Types</label>
                                    </div>
                                    <select class="custom-select" id="type" name="type" required>
                                        @foreach($data as $p)
                                            <option class="h5 font-weight-bold" value="{{$p->id}}" style="background: {{$p->couleur}}; color: {{$p->couleurTxt}}">{{$p->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="image" name="image" accept=".jpg,.gif,.png,.svg,.jpeg" class="custom-file-input" required>
                                        <label class="custom-file-label" for="customFile">Choisir un fichier</label>
                                    </div>
                                </div>
                                <div class="form-group" width="250">
                                    <img id="preview" class="img-fluid" src="#" alt="">
                                </div>                    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </div>
                </form>
                <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

                <script>
                    $(() => {
                        $('input[type="file"]').on('change', (e) => {
                            let that = e.currentTarget
                            if (that.files && that.files[0]) {
                                $(that).next('.custom-file-label').html(that.files[0].name)
                                let reader = new FileReader()
                                reader.onload = (e) => {
                                    $('#preview').attr('src', e.target.result)
                                }
                                reader.readAsDataURL(that.files[0])
                            }
                        })
                    })
                </script>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
