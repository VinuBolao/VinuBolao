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

Route::group(['prefix' => 'jogo'], function (){
    Route::get('get/{id?}', 'API\JogoController@get')->where('id', '[0-9]+');
    Route::get('getCampeonato/{id}/{rodada?}', 'API\JogoController@getCampeonato')->where('id', '[0-9]+');
    Route::post('update', 'API\JogoController@update');
});

Route::group(['prefix' => 'participante'], function (){
    Route::get('updatedData', 'API\ParticipanteController@updatedData');
    Route::get('getDados/{id}/{rodada?}', 'API\ParticipanteController@getDados');
    Route::get('getBolao/{id}', 'API\ParticipanteController@getBolao')->where('id', '[0-9]+');
    Route::get('get/{id?}', 'API\ParticipanteController@get')->where('id', '[0-9]+');
});

Route::group(['prefix' => 'campeonato'], function (){
    Route::get('get/{id?}', 'API\CampeonatoController@get')->where('id', '[0-9]+');
});

Route::group(['prefix' => 'palpite'], function (){
    Route::get('get/{id?}', 'API\PalpiteController@get')->where('id', '[0-9]+');
    Route::get('getPalpites/{userId}/{campeonatoId}/{rodada?}', 'API\PalpiteController@getPalpites');
    Route::post('save', 'API\PalpiteController@save');
});