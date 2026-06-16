<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsumidorController;

Route::get('/', function () {
    return redirect()->route('consumidores.index');
});

Route::resource('consumidores', ConsumidorController::class)->only(['index', 'create', 'store', 'edit', 'update']);

use App\Http\Controllers\LeituraController;
use App\Http\Controllers\FaturaController;
use App\Http\Controllers\ConfiguracaoTaxaController;

Route::get('/leituras/create', [LeituraController::class, 'create'])->name('leituras.create');
Route::post('/leituras', [LeituraController::class, 'store'])->name('leituras.store');
Route::get('/faturas', [FaturaController::class, 'index'])->name('faturas.index');
Route::patch('/faturas/{fatura}/pagar', [FaturaController::class, 'pagar'])->name('faturas.pagar');
Route::get('/configuracao', [ConfiguracaoTaxaController::class, 'edit'])->name('configuracao.edit');
Route::put('/configuracao', [ConfiguracaoTaxaController::class, 'update'])->name('configuracao.update');
