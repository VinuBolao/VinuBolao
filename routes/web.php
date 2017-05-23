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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/classificacao', 'HomeController@classificacao')->name('classificacao');
Route::get('/palpites/{campeonato?}/{rodada?}', 'HomeController@palpites')->name('palpites');
Route::get('/jogos/{campeonato?}/{rodada?}', 'HomeController@jogos')->name('jogos');

Route::post('save', 'HomeController@save')->name('save');