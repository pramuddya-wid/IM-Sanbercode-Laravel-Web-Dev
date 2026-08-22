<?php


use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;


Route::get('/', [DashboardController::class, 'home'])->middleware('auth');
Route::get('/register', [FormController::class, 'daftar']);
Route::post('/welcome', [FormController::class, 'signup']);

Route::get('/profile', [ProfileController::class, 'GetProfile'])->middleware('auth');
Route::post('/profile', [ProfileController::class, 'store'])->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->middleware('auth');

Route::middleware(['auth', 'admin'])->group(function () {
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
});




//CRUD Product
Route::resource('/product', ProductController::class);


Route::middleware(['guest'])->group(function () {
    //AUTH
//register
    Route::get('/register', [AuthController::class, 'formregister']);
    Route::post('/register', [AuthController::class, 'register']);

    //login
    Route::get('/login', [AuthController::class, 'formlogin']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});


//logout
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/transaction', [TransactionController::class, 'index']);
    Route::get('/transaction/create', [TransactionController::class, 'create']);
    Route::post('/transaction', [TransactionController::class, 'store']);
});