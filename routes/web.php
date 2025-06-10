<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');




Route::get('/stock', function () {
    return view('stock.index');
});

use App\Http\Controllers\ProductoController;

Route::resource('productos', ProductoController::class);
Route::resource('productos', \App\Http\Controllers\ProductoController::class);
use App\Http\Controllers\MarcaController;

Route::resource('marcas', MarcaController::class);
use App\Http\Controllers\RubroController;

Route::resource('rubro', RubroController::class);