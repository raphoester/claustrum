@extends('layouts/app')

@section('contenu')
<div>
    <h1>Défis {{ $defis[0]->category }}</h1>
    @foreach($defis as $defi)
    <div>
        <a href="/defis/{{ $defi->category }}/{{ $defi->id }}">{{ $defi->title }}</a>
    </div>
    @endforeach
</div>


@endsection