<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsumidorController;
use App\Http\Controllers\LeituraController;
use App\Http\Controllers\FaturaController;
use App\Http\Controllers\ConfiguracaoTaxaController;

Route::get('/', function () {
    if (auth()->check() && auth()->user()->role === 'admin') {
        return redirect()->route('consumidores.index');
    }
    return redirect()->route('leituras.create');
})->middleware('auth');

// Rotas do leiturista
Route::middleware('auth')->group(function () {
    Route::get('/leituras/create', [LeituraController::class, 'create'])->name('leituras.create');
    Route::post('/leituras', [LeituraController::class, 'store'])->name('leituras.store');
});

// Rotas exclusivas do admin
Route::middleware(['auth', \App\Http\Middleware\CheckAdmin::class])->group(function () {
    Route::resource('consumidores', ConsumidorController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::get('/faturas', [FaturaController::class, 'index'])->name('faturas.index');
    Route::patch('/faturas/{fatura}/pagar', [FaturaController::class, 'pagar'])->name('faturas.pagar');
    Route::get('/configuracao', [ConfiguracaoTaxaController::class, 'edit'])->name('configuracao.edit');
    Route::put('/configuracao', [ConfiguracaoTaxaController::class, 'update'])->name('configuracao.update');
    Route::delete('/consumidores/{consumidor}', [ConsumidorController::class, 'destroy'])->name('consumidores.destroy');
});

require __DIR__.'/auth.php';
