<?php

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

Route::get('/michael', function () {
    return 'teste1';
});

Route::get('/', function () {
    return redirect('/bolao');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('classificacao', 'BolaoController@classificacao')->name('classificacao');
    Route::resource('bolao', 'BolaoController');

    Route::resource('participante', 'ParticipanteController');

    Route::get('participante', 'ParticipanteController@index')->name('participante.index');
    Route::resource('jogo', 'JogoController');

    Route::resource('palpite', 'PalpiteController');

    Route::get('regulamento', 'BolaoController@regulamento')->name('regulamento');
});