@extends('layouts.app')
@section('contenu')
<div class="container">
    <a href="/admin">&#60 &#60 &#60 Retour en arrière</a>
    <div>
        <h1>Liste des défis</h1>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <style>
                        td{
                            width: 10%;
                        }
                    </style>
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Créé le</th>
                    <th scope="col">Url</th>
                    <th scope="col">Mot de passe</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($defis as $defi)
                <tr>
                    <th scope="row">{{$defi->id}}</th>
                    <td>{{$defi->title}}</td>
                    <td>{{$defi->description}}</td>
                    <td>{{$defi->category}}</td>
                    <td>{{$defi->created_at}}</td>
                    <td><a href="{{$defi->link}}">{{$defi->link}}</a></td>
                    <td>{{$defi->password}}</td>
                    <td><button>❌</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection