@extends('layouts/app')
@section('contenu')

<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{$profil->image}}" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4>{{$profil->name}}</h4>
                                <p class="text-secondary mb-1">Réputation : {{$profil->rep}}</p>
                                @if($connecte->id == $profil->id)
                                    <a href="/profil/modification">Modifier votre profil</a>
                                @else
                                    <a href="/messages/{{$profil->id}}">Envoyer un message</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">  
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$profil->email}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Inscrit depuis le</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$profil->created_at}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gutters-sm">
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 class="d-flex align-items-center mb-3">Défis accomplis : {{ count($profil->defisAccomplis) }}</h6>
                                @foreach($categos as $categorie)
                                    @php
                                    {{ 
                                        $accomplis = $profil->avancementCategorie($categorie->category);
                                        $total = \App\Models\Defi::compteParCatego($categorie->category);
                                        $pourcentage = ($accomplis/$total)*100;
                                        
                                        
                                    }}
                                    @endphp
                                    <small>Web_client</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <!-- insérer ici la progression réelle -->
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 10%"></div>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('contenu')