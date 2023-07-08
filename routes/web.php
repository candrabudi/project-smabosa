<?php

use App\Http\Controllers\Admin\AboutSchoolController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageSliderController;
use App\Http\Controllers\Admin\MasterCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Frontend\LandingpageController;
use App\Http\Controllers\Admin\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingpageController::class, 'index'])->name('landingpage');

Route::get('/bosa-admin/login', [AuthController::class, 'login'])->name('bosa-login');
Route::post('/bosa-admin/custom-login', [AuthController::class, 'loginProcess'])->name('login.custom'); 

Auth::routes();
Route::prefix('bosa-admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('bosa.dashboard');
    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('admin.posts');
        Route::get('/create', [PostController::class, 'create'])->name('admin.posts.create');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('admin.posts.edit');
        Route::post('/store', [PostController::class, 'store'])->name('admin.posts.store');
        Route::post('/update/{id}', [PostController::class, 'update'])->name('admin.posts.update');
        Route::delete('/delete/{id}', [PostController::class, 'delete'])->name('admin.posts.delete');
        Route::post('/upload-image', [PostController::class, 'uploadImagePost'])->name('admin.posts.upload');
        Route::get('/datatable/publish', [PostController::class, 'datatblePostPublish'])->name('admin.posts.datatable.publish');
        Route::get('/datatable/draft', [PostController::class, 'datatblePostDraft'])->name('admin.posts.datatable.draft');
        Route::get('/datatable/delete', [PostController::class, 'datatblePostDelete'])->name('admin.posts.datatable.delete');
    });
    Route::prefix('master-categories')->group(function () {
        Route::get('/', [MasterCategoryController::class, 'index'])->name('admin.categories');
        Route::post('/store', [MasterCategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/edit/{id}', [MasterCategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/update/{id}', [MasterCategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/delete/{id}', [MasterCategoryController::class, 'delete'])->name('admin.categories.delete');
        Route::get('/datatable', [MasterCategoryController::class, 'datatable'])->name('admin.categories.datatable');
    });
    Route::prefix('image-slider')->group(function () {
        Route::get('/', [ImageSliderController::class, 'index'])->name('admin.image-slider');
        Route::get('/datatable', [ImageSliderController::class, 'datatbleImageSlider'])->name('admin.image-slider.datatable');
        Route::get('/create', [ImageSliderController::class, 'create'])->name('admin.image-slider.add');
        Route::get('/edit/{id}', [ImageSliderController::class, 'edit'])->name('admin.image-slider.edit');
        Route::post('/store', [ImageSliderController::class, 'store'])->name('admin.image-slider.store');
    });
    Route::prefix('about-school')->group(function () {
        Route::get('/', [AboutSchoolController::class, 'index'])->name('admin.about-school');
        Route::post('/store', [AboutSchoolController::class, 'store'])->name('admin.about-school.store');
    });
    Route::prefix('event')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('admin.event');
        Route::get('/datatable', [EventController::class, 'datatable'])->name('admin.event.datatable');
        Route::get('/create', [EventController::class, 'create'])->name('admin.event.create');
        Route::get('/edit/{id}', [EventController::class, 'edit'])->name('admin.event.edit');
        Route::post('/update/{id}', [EventController::class, 'update'])->name('admin.event.update');
        Route::post('/store', [EventController::class, 'store'])->name('admin.event.store');
        Route::delete('/delete/{id}', [EventController::class, 'delete'])->name('admin.event.delete');
    });
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
