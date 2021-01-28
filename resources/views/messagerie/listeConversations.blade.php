@extends('layouts.app')
@section('contenu')

<div class='container'>
    <h1>Conversations</h1>
    <div>
        <h4>Retrouvez ici tous les messages que vous avez échangés avec les membres de Claustrum.</h4>
    </div>
    <ul class="list-group">
        @foreach($interlocuteurs as $interlocuteur)

        <li class='list-group-item'>
            <a href="/messages/{{$interlocuteur->id}}">{{ $interlocuteur->name }}</a>
        </li>

        @endforeach
    </ul>
</div>

@endsection