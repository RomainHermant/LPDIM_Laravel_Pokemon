@extends('layouts.app')

@auth
@section('content')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <input style="width: 100%" type="text" id="myInput" onkeyup="myFunction()" placeholder="Recherche..">
                <table class="table table-hover" id="myTable">
                    <thead class="thead-dark">
                        <tr class="header">
                            <th>Nom</th>
                            <th>Adresse email</th>
                            <th>Inscription</th>
                            <th>Pokemon(s)</th>
                            <th>Rôle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $u)
                            <tr class="table-row h5" onclick="load_user_equipe({{$u->id}})">
                                <td class="align-middle">{{$u->name}}</td>
                                <td class="align-middle">{{$u->email}}</td>
                                <td class="align-middle">{{$u->created_at}}</td>
                                <td class="align-middle">
                                    {{$u->pokemons->count()}}
                                </td>
                                <td class="align-middle">
                                    @if ($u->admin)
                                        @if (Auth::id() == $u->id)
                                            <select class="custom-select user" disabled>
                                                <option value="{{$u->id}}" selected>Administrateur</option>
                                                <option value="{{$u->id}}">Utilisateur</option>
                                            </select>
                                        @else
                                            <select class="custom-select user">
                                                <option value="{{$u->id}}" selected>Administrateur</option>
                                                <option value="{{$u->id}}">Utilisateur</option>
                                            </select>
                                        @endif   
                                    @else
                                        <select class="custom-select admin">
                                            <option value="{{$u->id}}">Administrateur</option>
                                            <option value="{{$u->id}}" selected>Utilisateur</option>
                                        </select>                                           
                                    @endif
                                </td>
                            </tr>
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
        </div>
        <div class="col-md-4" id="user_equipe_div">
        </div>
        <script type="text/javascript">
            function load_user_equipe(id)
            {
                $('#user_equipe_div').load('/admin/utilisateur-equipe/' + id);
            }
        </script>
        <script type="text/javascript">
            $(".user").change(function()
            {
                document.location.href = '/admin/modif-role/' + $(this).val() + '/user';
            });

            $(".admin").change(function()
            {
                document.location.href = '/admin/modif-role/' + $(this).val() + '/admin';
            });
        </script>
    </div>
</div>
@endsection
@endauth
