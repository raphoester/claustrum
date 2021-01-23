@extends('layouts.app')
@section('contenu')

<div class="container">
    <div>
        <div>
            <h2>Conversation avec {{$interlocuteur->name}}</h2>
        </div>
        <div>
            <div>
                @foreach($conversation as $message)
                    @if($message->receveur_id == $interlocuteur->id && $message->envoyeur_id == $connecte->id)
                        <div style="color: blue;">{{ $message->contenu }}</div>  
                    @elseif($message->receveur_id == $connecte->id && $message->envoyeur_id == $interlocuteur->id)
                        <div style="color: grey;">{{ $message->contenu }}</div>
                    @else
                        <div style="color:red; font-weight: bold;">ERREUR</div>
                    @endif
                @endforeach
            </div>
            <div>
                <form action="" method='POST'>
                    @csrf
                    <input type="text" name='message'>
                    <input type="submit">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection