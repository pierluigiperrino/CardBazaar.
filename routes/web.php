<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevisorController;
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

// FRONT

Route::get('/', [FrontController::class, 'homepage'])->name('homepage');

Route::get('/lavora-con-noi', [FrontController::class, 'workWithUs'])->middleware('auth')->name('workWithUs');

Route::post('/language/{lang}', [FrontController::class,'setLanguage'])->name('set_language');

Route::get('/user/announcements', [FrontController::class,'userAnnouncements'])->middleware('auth')->name('user_announcements');

Route::post('/user/announcements/{id}/delete', [FrontController::class,'userAnnouncementsDelete'])->middleware('auth')->name('user_announcements_delete');

Route::get('/about-us2', [FrontController::class, 'AboutUs'])->name('about_us');

// CATEGORIES

Route::get('/categories/{name}/show', [CategoryController::class, 'show'])->name('categories.show');

// ANNOUNCEMENTS

Route::get('/announcements', [AnnouncementController::class, 'index'])->name('announcements.index');

Route::get('/announcements/create', [AnnouncementController::class, 'create'])->middleware('auth')->name('announcements.create');

Route::get('/announcements/{uri}/show', [AnnouncementController::class, 'show'])->name('announcements.show');

Route::get('/announcements/search', [FrontController::class, 'searchAnnouncements'])->name('announcements.search');

// REVISOR

Route::get('/revisor', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

Route::get('/revisor/{uri}/show', [RevisorController::class, 'show'])->middleware('isRevisor')->name('revisor.show');

Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');

Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');

Route::post('/revisor/richiesta', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

Route::get('/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

// Rotta chi siamo del footer

Route::get('/about-us', function(){
    return view('about_us');
});

//Rotta provvisoria
Route::get('/login-register', function(){
    return view('login_register');
});
