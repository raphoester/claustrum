@extends('layouts.app')
@section('contenu')

{{dd($conversation)}}

<div class="container">
    <div>
        <div>
            <h2>Conversation avec {{$interlocuteur->name}}</h2>
        </div>
        <div>
            <div>
                @foreach($conversation as $message)
                    {{ $message->contenu }}
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