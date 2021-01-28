@extends('layouts.app')
@section('contenu')

<div class="container">
    <div>
        <h1>Administration</h1>
    </div>
    <div>
        <ul>
            <li>
                <div>
                    <h4>Défis</h4>
                </div>
                <ul>
                    <li>
                        <a href="/admin/nDefi">Nouveau défi</a>
                    </li>
                    <li>
                        <a href="/admin/defis">Liste des défis</a>
                    </li>
                </ul>
            </li>
            <li>
                <div>
                    <h4>Utilisateurs</h4>
                </div>
                <ul>
                    <li>
                        <a href="/admin/utilisateurs">Liste des utilisateurs</a>
                    </li>
                </ul>
            </li>
            <li>
                <div>
                    <h4>Forum</h4>
                </div>
                <ul>
                    <li>
                        <a href="/admin/sujetsForum">Sujets du forum</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

@endsection