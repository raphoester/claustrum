@extends('layouts.app')
@section('contenu')

    <div class='container'>
        @foreach($interlocuteurs as $interlocuteur)
            <div>
                <h5><a href="/messages/{{$interlocuteur->id}}">{{ $interlocuteur->name }}</a></h5>
            </div>
        @endforeach
    </div>

@endsection