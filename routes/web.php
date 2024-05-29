<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoController;



 Route::view('/', 'front.index')->name('home');

Route::view('/example-page','example-page');
Route::view('/example-auth','example-auth');



Route::prefix('admin')->name('admin.')->group(function(){

    // Route for admin homepage
    Route::view('/home', 'back.pages.admin.home')->name('home');

    // Route for logo
    Route::controller(LogoController::class)->group(function () {
        Route::get('/edit-logo', 'edit');
        Route::post('/update-logo', 'update')->name('update-logo');
    });


});


