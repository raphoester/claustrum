@extends('layouts.app')
@section('contenu')
<div class="container">
    <a href="/admin">&#60 &#60 &#60 Retour en arrière</a>
    <div>
        <h1>Liste des inscrits</h1>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Courriel</th>
                    <th scope="col">Inscrit le</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($utilisateurs as $utilisateur)
                <tr>
                    <th scope="row">{{$utilisateur->id}}</th>
                    <td>{{$utilisateur->name}}</td>
                    <td>{{$utilisateur->email}}</td>
                    <td>{{$utilisateur->created_at}}</td>
                    <td><a href="/admin/suppr_util/{{$utilisateur->id}}">❌</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection