@extends('layouts/app')

@section('contenu')

<div class="container">
	<div class="card mb-3 container">

		<div class="card-body">
			<p class="text-right"><small class="text-muted">{{$publication->created_at}}</small></p>
			<h2 class="card-title">{{$publication->titre}}</h2>
			<br>
			<p>{{$publication->description}}</p>
			<p class="text-right"><small class="text-muted"></small></p>

		</div>
	</div>

	@php
	$i=0;
	foreach($com as $commentaire)
	{
	$i+=1;
	}
	@endphp


	<div class="container">
		<div class="be-comment-block">
			<h1 class="comments-title">Commentaires ({{$i}})</h1>

			@foreach($com as $commentaire)

			<div class="card">
				<div class="be-comment">
					<div class="be-img-comment">
						<img src="https://thumbs.dreamstime.com/b/default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg" alt="" class="be-ava-comment">
					</div>
					<div class="be-comment-content">
						<span class="be-comment-name">
							<a href="/messages/{{$commentaire->auteur}}">✉️</a>

						</span>
						<span class="be-comment-time">
							<i class="fa fa-clock-o"></i>
							{{$commentaire->created_at}}
						</span>

						<p class="be-comment-text">
							{{$commentaire->description}}
						</p>
					</div>
				</div>
				@endforeach




			</div>


			<form class="form-block" method="POST" action="">
				@csrf
				<div class="row">
					<div class="col-xs-12">
						<div class="form-group">
							<textarea id="description" name="contenu" class="form-input" required="" placeholder="Votre commentaire"></textarea>
						</div>
					</div>
					<button type="submit" class="btn btn-primary">
						{{ __('Publier') }}
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection