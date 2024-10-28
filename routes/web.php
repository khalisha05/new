<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\ZoomController;
use App\Http\Controllers\InfoadminController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('homes.home');
});

Route::get('/homes',[HomeController::class,'index']);
Route::resource('users',UserController::class);
Route::resource('materis',MateriController::class);
Route::resource('zooms',ZoomController::class);
Route::resource('infoadmins',InfoadminController::class);
Route::resource('dokumentasis',DokumentasiController::class);
Route::resource('alumnis',AlumniController::class);
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login/proses', 'proses');
    Route::get('/logout', 'logout');
});






