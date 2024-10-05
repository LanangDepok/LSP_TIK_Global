<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/authenticate', 'authenticate')->middleware('guest');
    Route::post('/logout', 'logout')->middleware('auth');
});

Route::middleware('auth')->controller(SiswaController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/create', 'create');
    Route::post('/store', 'store');
    Route::get('/edit/{id}', 'edit');
    Route::put('/update/{id}', 'update');
    Route::delete('/delete/{id}', 'delete');
});
