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
    Route::get('get_campeonato/{id}/{rodada?}', 'API\JogoController@get_campeonato')->where('id', '[0-9]+');
    Route::post('update', 'API\JogoController@update');
});

Route::group(['prefix' => 'participante'], function (){
    Route::get('get_bolao/{id}', 'API\ParticipanteController@get_bolao')->where('id', '[0-9]+');
});

Route::group(['prefix' => 'campeonato'], function (){
    Route::get('get/{id?}', 'API\CampeonatoController@get')->where('id', '[0-9]+');
});

Route::group(['prefix' => 'palpite'], function (){
    Route::get('get/{id?}', 'API\PalpiteController@get')->where('id', '[0-9]+');
    Route::get('get_palpites/{userId}/{campeonatoId}/{rodada?}', 'API\PalpiteController@get_palpites');
    Route::post('save', 'API\PalpiteController@save');
});