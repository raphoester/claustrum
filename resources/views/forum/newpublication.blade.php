@extends('layouts/app')

@section('contenu')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nouvelle publication') }}</div>

                <div class="card-body">
                    <form method="POST" action="newpublication">
                        @csrf

                        <div class="form-group row">
                            <label for="titre" class="col-md-4 col-form-label text-md-right">{{ __('Titre') }}</label>

                            <div class="col-md-6">
                                <input id="titre" type="text" class="form-control" name="titre" value="{{ old('titre') }}" required autocomplete="titre" autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" name="description" class="form-control" name="description" value="{{ old('description') }}" required autocomplete="description" cols="30" rows="10"></textarea>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Publier') }}
                                </button>

                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>


@endsection