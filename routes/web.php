<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KorwilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GeneralController;
use App\Http\Middleware\login;

Route::get('/', [GeneralController::class, 'index']);
Route::post('/login', [GeneralController::class, 'login']);

Route::middleware(login::class)->get('/user', [UserController::class, 'index']);

Route::middleware(login::class)->get('/korwil', [KorwilController::class, 'index']);
Route::post('/input', [KorwilController::class, 'input']);
Route::get('kab/{id}', [KorwilController::class, 'kab']);
Route::get('kec/{id}', [KorwilController::class, 'kec']);
Route::get('kel/{id}', [KorwilController::class, 'kel']);
