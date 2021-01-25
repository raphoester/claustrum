@extends('layouts/app')

@section('contenu')

@foreach($publications as $publi)
<div class="card mb-3">

	<div class="card-body">
		<p class="text-right"><small class="text-muted">{{$publi->created_at}}</small></p>
		<h2 class="card-title">{{$publi->titre}}</h2>
		<br>
		<p class="h3">{{$publi->description}}</p>
		<p class="text-right"><small class="text-muted">{{$publi->auteur}}</small></p>

	</div>
</div>

@endforeach

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<div class="be-comment-block">
		<h1 class="comments-title">Commentaire (3)</h1>
		<div class="card">
			<div class="be-comment">
				<div class="be-img-comment">
					<a href="blog-detail-2.html">
						<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="be-ava-comment">
					</a>
				</div>
				<div class="be-comment-content">

					<span class="be-comment-name">
						Nom
					</span>
					<span class="be-comment-time">
						<i class="fa fa-clock-o"></i>
						Date
					</span>

					<p class="be-comment-text">
						Commentaire
					</p>
				</div>
			</div>




		</div>

		<form class="form-block">
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<textarea class="form-input" required="" placeholder="Votre commentaire"></textarea>
					</div>
				</div>
				<a class="btn btn-primary pull-right">Envoyer</a>
			</div>
		</form>
	</div>
</div>


@endsection