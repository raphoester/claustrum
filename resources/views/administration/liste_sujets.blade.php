@extends('layouts.app')
@section('contenu')
<div class="container">
    <a href="/admin">&#60 &#60 &#60 Retour en arrière</a>
    <div>
        <h1>Liste des sujets du forum</h1>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Créé le</th>
                    <th scope="col">ID de l'auteur</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($sujets as $sujet)
                <tr>
                    
                    <th scope="row">{{$sujet->id}}</th>
                    <td><a href="/forum/publication/1">{{$sujet->titre}}</a></td>
                    <td>{{$sujet->created_at}}</td>
                    <td>{{$sujet->auteur}}</td>
                    
                    <td><a href="/admin/suppr_publi/{{$sujet->id}}">❌</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection