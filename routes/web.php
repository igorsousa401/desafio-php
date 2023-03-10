<?php

use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/imoveis', [\App\Http\Controllers\AppImovelController::class, 'index'])->name('app.imoveis.index');
    Route::post('/imoveis/store', [\App\Http\Controllers\AppImovelController::class, 'store'])->name('app.imoveis.store');
    Route::post('/imoveis/update/{id}', [\App\Http\Controllers\AppImovelController::class, 'update'])->name('app.imoveis.update');
    Route::post('/imoveis/destroy/{id}', [\App\Http\Controllers\AppImovelController::class, 'destroy'])->name('app.imoveis.destroy');
});

require __DIR__.'/auth.php';
