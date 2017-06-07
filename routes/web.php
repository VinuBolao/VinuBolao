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

Route::get('/', function () {
    return redirect('/bolao');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::get('/bolao/classificacao', 'BolaoController@classificacao')->name('bolao.classificacao');
    Route::resource('bolao', 'BolaoController');

    Route::resource('participante', 'ParticipanteController');

    Route::get('participante', 'ParticipanteController@index')->name('participante.index');
    Route::resource('jogo', 'JogoController');

    Route::resource('palpite', 'PalpiteController');
});