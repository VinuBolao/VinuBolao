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

Route::group(['prefix' => 'bolao', 'as' => 'bolao.'], function (){
    Route::get('/', 'BolaoController@index')->name('index');
    Route::get('/add', 'BolaoController@add')->name('add');
    Route::post('/save', 'BolaoController@save')->name('save');
    Route::get('/edit/{id}', 'BolaoController@edit')->name('edit');
    Route::put('/update/{id}', 'BolaoController@save')->name('update');
    Route::delete('/remove/{id}', 'BolaoController@destroy')->name('remove');
});



Route::get('/classificacao', 'HomeController@classificacao')->name('classificacao');
Route::get('/palpites/{campeonato?}/{rodada?}', 'HomeController@palpites')->name('palpites');
Route::get('/jogos/{campeonato?}/{rodada?}', 'HomeController@jogos')->name('jogos');

Route::post('save', 'HomeController@save')->name('save');