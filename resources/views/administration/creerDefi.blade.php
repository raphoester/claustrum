@extends('layouts.app')
@section('contenu')
@php
{{ $catego_defi = \App\Models\Defi::getPossibleStatuses();}}
@endphp

<div class="container" >
    <a href="/admin">&#60 &#60 &#60 Retour en arrière</a>
    <div>
        <h1 id="titre">Créer un nouveau défi</h1>
    </div>
    <div>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <h6>Titre</h6>
                <input type="string" required name="titre">
            </div>
            <div>
                <h6>Description</h6>
                <textarea name="description" required  cols="30" rows="10"></textarea>
            </div>
            <div>
                <h6>Difficulté</h6>
                <select name="difficulte" id="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <div>
                <h6>Mot de passe</h6>
                <input type="text" required name="mdp">
            </div>
            <div>
                <h6>Catégorie</h6>
                <select name="categorie" id="selecteur_categorie">
                    @foreach($catego_defi as $defi)
                        <option value="{{$defi->category}}">{{$defi->category}}</option>
                    @endforeach
                    <option selected="selected" id='nv' value="nouvelle">Ajouter une nouvelle catégorie...</option>
                </select>

                <div id='insertion'>
                    <h6>Nom de la nouvelle catégorie</h6>
                    <input type="string" name='nvCategorie'> 
                </div>
            </div>
            <div>
                <h6>fichier .zip contenant le défi</h6>
                <input type="file" required accept=".zip" name='defi_zip'/>
            </div>
            
            <div>
                <input type="submit">
            </div>
        </form>
    </div>
</div>

<script type="application/javascript">

    $(function() {   
        $('#selecteur_categorie').change(function(){
            $('#insertion').hide();
            if($( "#selecteur_categorie" ).val() == 'nouvelle'){
                $('#insertion').show();
            }
        });
    });

</script>




@endsection