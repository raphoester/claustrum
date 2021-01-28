@extends('layouts/app')

@section('contenu')


<section class="hero">

    <div class="hero-content">

        <h1 class="hero-title">
            Claustrum
        </h1>

        <h2 class="hero-subtitle">
            Le meilleur endroit pour apprendre la cybersécurité !
        </h2>
        <div>
            <button type="button" class="hero-button" onclick="location.href='/register'">
                S'inscrire &raquo;
            </button>
        </div>
        <div>
            <button type="button" class='hero-button' onclick="location.href='/login'" style="font-size: 1.4rem;">
                Se connecter
            </button>
        </div>


    </div>

</section>

<div class="container">



    <div>
        <h3>Claustrum est une plateforme d'entraînement destinée aux apprentis de la sécurité informatique.</h3>
        <div>
            <p>
                Elle a été conçue pour faire découvrir des problématiques variées de la cybersécurité,
                que ce soit dans les technologies toile, la programmation, l'environnement Linux, ou même
                l'infrastructure réseau.
            </p>
            <p>Sur ce site, vous avez accès à des défis où le but est toujours de retrouver un mot de passe.
                Une fois le mot de passe soumis, vous validez le défi et voyez votre score public augmenter.
                Si vous avez fini tous les défis que nous proposons, revenez dans quelques jours ! Il y en aura
                certainement de nouveaux.
            </p>
            <p>
                Si vous avez du mal à résoudre un défi, que vous ne savez pas par où commencer, le forum est fait pour
                ça.
                Vous pourrez y lancer des sujets de discussion pour demander de l'aide, ou répondre à ceux qui existent
                déjà
                pour aider les autres apprentis. Une règle très importante existe toutefois :
            </p>
            <p><strong>Ne JAMAIS donner la solution entière.</strong></p>
            <p>L'équipe de modération se réserve le droit de supprimer toute publication, commentaire ou compte qui
                violerait cette règle.
            </p>
            <p>
                Sur ce : bonne chance et amusez-vous bien !
            </p>

        </div>
    </div>
</div>




@endsection