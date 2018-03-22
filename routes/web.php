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
    return redirect()->secure('/bolao');
});

Route::get('/laravelversion', function () {
    $laravel = app();
    return "Laravel Framework " . $laravel::VERSION;
});

Auth::routes();

Route::namespace('Admin\\')->group(function (){
    Route::group(['middleware' => ['auth', 'can:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function (){
        Route::resource('user', 'UserController');
    });

    Route::group(['middleware' => ['auth', 'can:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function (){
        Route::resource('campeonato', 'CampeonatoController');
    });

    Route::group(['middleware' => ['auth', 'can:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function (){
        Route::resource('time', 'TimeController');
    });

    Route::group(['middleware' => ['auth', 'can:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function (){
        Route::resource('jogo', 'JogoController');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::get('classificacao', 'BolaoController@classificacao')->name('classificacao');

    Route::view('/regulamento', 'bolao.regulamento')->name('regulamento');

    Route::resource('bolao', 'BolaoController');

    Route::get('participante', 'ParticipanteController@index')->name('participante');

    Route::get('jogo', 'JogoController@index')->name('jogo.index');

    Route::get('palpite', 'PalpiteController@index')->name('palpite.index');
});
