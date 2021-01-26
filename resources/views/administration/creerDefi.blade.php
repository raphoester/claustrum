@extends('layouts.app')
@section('contenu')

<div class="container">
    <a href="/admin">&#60 &#60 &#60 Retour en arrière</a>
    <div>
        <h1>Créer un nouveau défi</h1>
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
                <input type="text" required name="description" id="">
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
                <select name="categorie" id="">
                    <option value="web_client">web_client</option>
                    <option value="web_serveur">web_serveur</option>
                    <option value="linux">linux</option>
                </select>
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



@endsection