<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;

Route::get('/', [DashboardController::class, 'home']);
Route::get('/pendaftaran', [FormController::class, 'daftar']);
Route::post('/signup', [FormController::class, 'signup']);