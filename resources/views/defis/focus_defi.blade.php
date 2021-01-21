@extends('layouts/app')

@section('contenu')

<div>
    <div>
        <div>
            <div>
                <h1>
                    {{ $defi->title }}
                </h1>
                <div>
                    publié le {{ $defi->created_at}}
                </div>
                <div>
                    difficulté : {{ $defi->level }}
                </div>
            </div>
        </div>
        <div>
            <div>
                {{ $defi->description }}
            </div>

            <div>
                <a href="{{$defi->link}}">Page d'accès</a>
            </div>
            
            <form action="" method="POST">
                @csrf
                
                <label for="mdp_defi"></label>
                <input type="password" id="mdp_defi" name="mdp_defi">
                <label for="valider_defi"></label>
                <input type="submit" id="valider_defi">
            </form>
        </div>
    </div>
</div>
@endsection