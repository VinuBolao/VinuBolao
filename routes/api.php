<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('API\\')->group(function (){
    Route::group(['prefix' => 'jogo'], function (){
        Route::get('get/{id?}', 'JogoController@get')->where('id', '[0-9]+');
        Route::get('getCampeonato/{id}/{rodada?}', 'JogoController@getCampeonato')->where('id', '[0-9]+');
        Route::post('update', 'JogoController@update');
    });

    Route::group(['prefix' => 'participante'], function (){
        Route::get('getRanking/{rodada?}', 'ParticipanteController@getRanking')->where('id', '[0-9]+');
        Route::get('getBolao/{id}', 'ParticipanteController@getBolao')->where('id', '[0-9]+');
        Route::get('get/{id?}', 'ParticipanteController@get')->where('id', '[0-9]+');
        Route::get('getDados/{id}/{rodada?}', 'ParticipanteController@getDados');
        Route::post('create', 'ParticipanteController@create');
        Route::post('delete/{id}', 'ParticipanteController@destroy');
    });

    Route::group(['prefix' => 'campeonato'], function (){
        Route::get('get/{id?}', 'CampeonatoController@get')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'user'], function (){
        Route::get('get/{id?}', 'UserController@get')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'palpite'], function (){
        Route::get('get/{id?}', 'PalpiteController@get')->where('id', '[0-9]+');
        Route::get('getPalpites/{userId}/{campeonatoId}/{rodada?}', 'PalpiteController@getPalpites');
        Route::post('save', 'PalpiteController@save');
    });
});
