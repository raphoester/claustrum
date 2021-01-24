@extends('layouts.app')
@section('contenu')
<div class="container">
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
                    <td><button>❌</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection