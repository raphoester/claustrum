@extends('layouts/app')

@section('contenu')

<div class="float-right">
        
            <a href="/forum/newpublication" class="btn btn-primary">Nouvelle publication</a>
    
        

</div>
<br>
<br>


<div class="card mb-3">
    
    
    <div class="card-body">
        <h5 class="card-title">Titre</h5>
        <p class="card-text">Ceci est un article du forum</p>
        <p class="card-text"><small class="text-muted">date publication</small></p>
        <a href="/forum/publication" class="btn btn-primary">Voir la publication</a>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Titre</h5>
        <p class="card-text">Ceci est un article du forum</p>
        <p class="card-text"><small class="text-muted">date publication</small></p>
        <a href="#" class="btn btn-primary">Voir la publication</a>
    </div>
    
</div>

@endsection