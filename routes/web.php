<?php

use App\Http\Controllers\Admin\AboutSchoolController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ImageSliderController;
use App\Http\Controllers\Admin\MasterCategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Frontend\LandingpageController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\SchoolAchievementController;
use App\Http\Controllers\Admin\ExtracurricularController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingpageController::class, 'index'])->name('landingpage');
Route::get('/blog', [LandingpageController::class, 'blog'])->name('blog');
Route::get('/kegiatan', [LandingpageController::class, 'activity'])->name('activity');
Route::get('/tentang-sekolah', [LandingpageController::class, 'about'])->name('about');
Route::get('/agenda', [LandingpageController::class, 'event'])->name('event');
Route::get('/blog/detail/{slug}', [LandingpageController::class, 'blogDetail'])->name('blog.detail');

Route::get('/bosa-admin/login', [AuthController::class, 'login'])->name('bosa-login');
Route::post('/bosa-admin/custom-login', [AuthController::class, 'loginProcess'])->name('login.custom'); 

Auth::routes();
Route::middleware('auth:sanctum')->prefix('bosa-admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('bosa.dashboard');
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
        Route::post('/update/{id}', [ImageSliderController::class, 'update'])->name('admin.image-slider.update');
        Route::delete('/delete/{id}', [ImageSliderController::class, 'delete'])->name('admin.image-slider.delete');
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
    Route::prefix('school-achievement')->group(function () {
        Route::get('/', [SchoolAchievementController::class, 'index'])->name('admin.school-achievement');
        Route::get('/datatable', [SchoolAchievementController::class, 'datatable'])->name('admin.school-achievement.datatable');
        Route::get('/create', [SchoolAchievementController::class, 'create'])->name('admin.school-achievement.create');
        Route::get('/edit/{id}', [SchoolAchievementController::class, 'edit'])->name('admin.school-achievement.edit');
        Route::post('/update/{id}', [SchoolAchievementController::class, 'update'])->name('admin.school-achievement.update');
        Route::post('/store', [SchoolAchievementController::class, 'store'])->name('admin.school-achievement.store');
        Route::delete('/delete/{id}', [SchoolAchievementController::class, 'delete'])->name('admin.school-achievement.delete');
    });
    Route::prefix('facilities')->group(function () {
        Route::get('/', [FacilityController::class, 'index'])->name('admin.facility');
        Route::get('/datatable', [FacilityController::class, 'datatable'])->name('admin.facility.datatable');
        Route::get('/create', [FacilityController::class, 'create'])->name('admin.facility.create');
        Route::post('/store', [FacilityController::class, 'store'])->name('admin.facility.store');
        Route::get('/edit/{id}', [FacilityController::class, 'edit'])->name('admin.facility.edit');
        Route::post('/update/{id}', [FacilityController::class, 'update'])->name('admin.facility.update');
        Route::delete('/delete/{id}', [FacilityController::class, 'delete'])->name('admin.facility.delete');
    });

    Route::prefix('extracurricular')->group(function () {
        Route::get('/', [ExtracurricularController::class, 'index'])->name('admin.extracurricular');
        Route::get('/datatable', [ExtracurricularController::class, 'datatable'])->name('admin.extracurricular.datatable');
        Route::get('/create', [ExtracurricularController::class, 'create'])->name('admin.extracurricular.create');
        Route::post('/store', [ExtracurricularController::class, 'store'])->name('admin.extracurricular.store');
        Route::get('/edit/{id}', [ExtracurricularController::class, 'edit'])->name('admin.extracurricular.edit');
        Route::post('/update/{id}', [ExtracurricularController::class, 'update'])->name('admin.extracurricular.update');
        Route::delete('/delete/{id}', [ExtracurricularController::class, 'delete'])->name('admin.extracurricular.delete');
    });
    Route::prefix('announcement')->group(function () {
        Route::get('/', [AnnouncementController::class, 'index'])->name('admin.announcement');
        Route::get('/datatable', [AnnouncementController::class, 'datatable'])->name('admin.announcement.datatable');
        Route::get('/create', [AnnouncementController::class, 'create'])->name('admin.announcement.create');
        Route::post('/store', [AnnouncementController::class, 'store'])->name('admin.announcement.store');
        Route::get('/edit/{id}', [AnnouncementController::class, 'edit'])->name('admin.announcement.edit');
        Route::post('/update/{id}', [AnnouncementController::class, 'update'])->name('admin.announcement.update');
        Route::delete('/delete/{id}', [AnnouncementController::class, 'delete'])->name('admin.announcement.delete');
    });
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
