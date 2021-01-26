@extends('layouts/app')

@section('contenu')

<div class="float-right">
        
            <a href="/forum/newpublication" class="btn btn-primary">Nouvelle publication</a>
    
        

</div>
<br>
<br>


@foreach($publications as $publication)
<div class="card">    
    <div class="card-body">
        <h5 class="card-title">{{$publication->titre}}</h5>
        <p class="card-text">{{$publication->description}}</p>
        <p class="card-text"><small class="text-muted">{{$publication->created_at}}</small></p>
        <a href="/forum/publication/{{ $publication->id }}" class="btn btn-primary">Voir la publication</a>
    </div>
</div>

@endforeach
@endsection