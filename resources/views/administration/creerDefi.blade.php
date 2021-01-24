@extends('layouts.app')
@section('contenu')

<div class="container">
    <div>
        <h1>Créer un nouveau défi</h1>
    </div>
    <div>
        <form action="" method="POST">
            @csrf
            <div>
                <h6>Titre</h6>
                <input type="text" name="titre">
            </div>
            <div>
                <h6>Description</h6>
                <input type="text" name="description" id="">
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
                <input type="text" name="mdp">
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
                <input type="submit">
            </div>
            <div>
                <strong>Note: Vous devez déjà avoir mis le défi dans le dossier approprié.</strong>
            </div>
        </form>
    </div>
</div>



@endsection