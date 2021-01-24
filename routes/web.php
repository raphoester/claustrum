<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/defis', [App\Http\Controllers\DefisController::class, 'categories'])->name('liste_catego_defis');

Route::get('/defis/{catego}', [App\Http\Controllers\DefisController::class, 'focus_categorie']);

Route::get('/defis/{catego}/{id}', [App\Http\Controllers\DefisController::class, 'focus_defi']);

Route::get('/forum', [App\Http\Controllers\ForumsController::class, 'index'])->name("accueil_forum");

Route::get('/forum/publication', [App\Http\Controllers\ForumsController::class, 'publication']);

Route::get('/forum/newpublication', [App\Http\Controllers\ForumsController::class, 'newpublication']);

Route::post('/defis/{catego}/{id}', [App\Http\Controllers\ValidationController::class, 'validation_defi']);

Route::get('/profil/modification', [App\Http\Controllers\UsersController::class, 'modifierProfil']);

Route::get('/u/{id}', [App\Http\Controllers\UsersController::class, 'profilU']);

Route::get('/messages', [App\Http\Controllers\MessagesController::class, 'liste_convs']);

Route::get('/messages/{id}', [App\Http\Controllers\MessagesController::class, 'affiche_conversation']);

Route::post('messages/{id}', [App\Http\Controllers\MessagesController::class, 'nouveauMessage']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
