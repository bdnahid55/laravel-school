<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AnnouncementController;

 Route::view('/', 'front.index')->name('home');

Route::view('/example-page','example-page');
Route::view('/example-datatable','example-datatable-page');
Route::view('/example-auth','example-auth');



Route::prefix('admin')->name('admin.')->group(function(){

    // Route for admin homepage
    Route::view('/home', 'back.pages.admin.home')->name('home');

    // Route for logo
    Route::controller(LogoController::class)->group(function () {
        Route::get('/edit-logo', 'edit')->name('edit-logo');
        Route::post('/update-logo', 'update')->name('update-logo');
    });

    // Route for page
    Route::controller(PageController::class)->group(function () {

        Route::get('page/all-page','index')->name('page.all-page'); // show all
        Route::get('page/create-page','create')->name('page.create-page'); // show create page
        Route::post('page/insert-page','store')->name('page.insert-page'); // create process
        Route::get('page/preview-page/{id}','show')->name('page.show-page'); // show page preview
        Route::get('page/edit-page/{id}','edit')->name('page.edit-page'); // show edit page
        Route::post('page/update-page/{id}','update')->name('page.update-page'); // update process
        Route::get('page/delete-page/{id}','destroy')->name('page.delete-page'); // delete process
    });

    // Route for Announcement
    Route::controller(AnnouncementController::class)->group(function () {

        Route::get('announcement/all-announcement','index')->name('announcement.all-announcement'); // show all
        Route::get('announcement/create-announcement','create')->name('announcement.create-announcement'); // show create page
        Route::post('announcement/insert-announcement','store')->name('announcement.insert-announcement'); // create process
        Route::get('announcement/preview-announcement/{id}','show')->name('announcement.show-announcement'); // show page preview
        Route::get('announcement/edit-announcement/{id}','edit')->name('announcement.edit-announcement'); // show edit page
        Route::post('announcement/update-announcement/{id}','update')->name('announcement.update-announcement'); // update process
        Route::get('announcement/delete-announcement/{id}','destroy')->name('announcement.delete-announcement'); // delete process
    });

});


