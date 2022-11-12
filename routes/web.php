<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TimeController;
use App\Http\Controllers\Admin\JogoController;
use App\Http\Controllers\Admin\CampeonatoController;
use App\Http\Controllers\Site\BolaoController;
use App\Http\Controllers\Site\ClassificacaoController;
use App\Http\Controllers\Site\JogosController;
use App\Http\Controllers\Site\PalpiteController;
use App\Http\Controllers\Site\ParticipanteController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/', '/login')->secure();

Route::middleware(['auth', 'verified', 'can:admin'])->prefix('admin')->as('admin.')->group(function () {
    Route::resources(['users' => UserController::class]);
    Route::resources(['times' => TimeController::class]);
    Route::resources(['jogos' => JogoController::class]);
    Route::resources(['campeonatos' => CampeonatoController::class]);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resources(['bolaos' => BolaoController::class]);
    Route::resources(['jogos' => JogosController::class]);
    Route::resources(['palpites' => PalpiteController::class]);
    Route::get('/classificacao', [ClassificacaoController::class, 'index'])->name('classificacao');
    Route::view('/regulamento', 'site.regulamento')->name('regulamento');
    Route::get('/bolaos/{id}/participantes', [ParticipanteController::class, 'getByBolao'])->name('participantes');
    Route::post('/participantes', [ParticipanteController::class, 'store'])->name('participantes.store');
    Route::delete('/participantes/{id}', [ParticipanteController::class, 'destroy'])->name('participantes.destroy');
});

require __DIR__.'/auth.php';
