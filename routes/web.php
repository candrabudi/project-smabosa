<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bosa-admin/login', [AuthController::class, 'login'])->name('bosa-login');
Route::post('/bosa-admin/custom-login', [AuthController::class, 'loginProcess'])->name('login.custom'); 

Auth::routes();
Route::prefix('bosa-admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('bosa.dashboard');
    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('admin.posts');
        Route::get('/create', [PostController::class, 'create'])->name('admin.posts.create');
        Route::post('/upload-image', [PostController::class, 'uploadImagePost'])->name('admin.posts.upload');
    });
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
