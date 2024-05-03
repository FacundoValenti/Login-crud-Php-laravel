<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GimnasioController;
use App\Http\Controllers\PiletumController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::resource('clientes', ClienteController::class);
route::resource('gimnasio', GimnasioController::class);
Route::resource('pileta', PiletumController::class);

