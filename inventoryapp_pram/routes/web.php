<?php


use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;


Route::get('/', [DashboardController::class, 'home']);
Route::get('/register', [FormController::class, 'daftar']);
Route::post('/welcome', [FormController::class, 'signup']);

//crud categories
//Menampilkan data
Route::get('/category', [CategoryController::class, 'index']);

//Membuat data
Route::get('/category/create', [CategoryController::class, 'create']);


Route::post('/category', [CategoryController::class, 'store']);
Route::get('/category/{id}', [CategoryController::class, 'show']);

//update data
Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
Route::put('/category/{id}', [CategoryController::class, 'update']);

Route::delete('/category/{id}', [CategoryController::class, 'destroy']);