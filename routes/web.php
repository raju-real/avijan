<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AdminBasicController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SliderController;

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
    Route::view('about-us','website.pages.about_us')->name('about-us');
    Route::view('contact-us','website.pages.contact_us')->name('contact-us');
    Route::view('all-events','website.pages.events')->name('all-events');
    Route::get('event-details/{slug}','eventDetails')->name('event-details');
    Route::view('all-articles','website.pages.articles')->name('all-articles');
    Route::get('article-details/{slug}','articleDetails')->name('article-details');
    Route::post('send-contact-message','storeMessage')->name('send-contact-message');
});

// Admin routes
Route::group(['as' => 'admin.', 'middleware' => 'auth'], function() {
    Route::resource('articles', ArticleController::class);
    Route::resource('event-categories', EventCategoryController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('events', EventController::class);
    Route::controller(SliderController::class)->group(function() {
        Route::get('sliders','sliders')->name('sliders');
    });
    
    Route::controller(AdminBasicController::class)->group(function() {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::view('website-settings', 'admin.basic.website_settings')->name('website-settings');
        Route::put('update-website-settings', 'updateWebsiteSettings')->name('update-website-settings');
        Route::get('logout', 'logout')->name('logout');
    });
});

