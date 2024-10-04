<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AdminBasicController;
use App\Http\Controllers\EventCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Website routes
Route::controller(HomePageController::class)->group(function() {
    Route::get('/','home')->name('home');
    Route::view('admin','auth.login')->name('admin');
    Route::post('admin-login','adminLogin')->name('admin-login');
});

// Admin routes
Route::group(['as' => 'admin.', 'middleware' => 'auth'], function() {
    Route::resource('articles', ArticleController::class);
    Route::resource('event-categories', EventCategoryController::class);
    Route::resource('events', EventController::class);
    
    Route::controller(AdminBasicController::class)->group(function() {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::view('website-settings', 'admin.basic.website_settings')->name('website-settings');
        Route::put('update-website-settings', 'updateWebsiteSettings')->name('update-website-settings');
        Route::get('logout', 'logout')->name('logout');
    });
});

