<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\ImportantLinkController;
use App\Http\Controllers\SchoolHistoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SpeechOneController;
use App\Http\Controllers\SpeechTwoController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackupController;


// ---------------------------- sample template view --------------------------------------
Route::view('/example-page', 'example-page');
Route::view('/example-datatable', 'example-datatable-page');
Route::view('/example-auth', 'example-auth');
// ----------------------------------------------------------------------------------------

// Route for Login
Route::controller(AuthController::class)->group(function () {
    Route::get('adminuser/login', 'index')->name('admin.login');
    Route::post('adminuser/login-process', 'LoginProcess')->name('adminuser.login-process');
    // Route for admin homepage / Dashboard
    Route::get('admin/home', 'dashboard')->name('admin.home')->middleware('admin');
    Route::get('admin/logout', 'logout')->name('logout');
});


// ----------------------------------------------------------------------------------------

// Route for Homepage
Route::controller(HomePageController::class)->group(function () {
    Route::get('/', 'index')->name('homepage');
    Route::get('/announcement/{id}/view', 'announcementshow')->name('announcement');
    Route::get('/notice/{id}/view', 'noticeshow')->name('notice');
    Route::get('/download/{id}/view', 'downloadshow')->name('download');
    Route::get('/page/{id}/view', 'pageshow')->name('page');
});

// ----------------------------------------------------------------------------------------

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {

    // Route for menu
    Route::controller(MenuController::class)->group(function () {
        Route::get('/menu/all-menu', 'index')->name('menu.all-menu');
        Route::get('/menu/create-menu', 'create')->name('menu.create-menu');
        Route::post('/menu/store-menu', 'store')->name('menu.store-menu');
        Route::get('/menu/edit-menu/{id}', 'edit')->name('menu.edit-menu');
        Route::post('/menu/update-menu/{id}', 'update')->name('menu.update-menu');
        Route::get('/menu/delete-menu/{id}', 'destroy')->name('menu.delete-menu');
    });

    // Route for Backup
    Route::controller(BackupController::class)->group(function () {
        Route::get('backup/create-new-backup', 'create')->name('backup.create-new-backup');
        Route::get('backup/delete-backup', 'destroy')->name('backup.delete-backup');

    });

    // Route for footer
    Route::controller(FooterController::class)->group(function () {
        Route::get('footer/edit-footer', 'edit')->name('footer.edit-footer');
        Route::post('footer/update-footer', 'update')->name('footer.update-footer');
    });

    // Route for logo
    Route::controller(LogoController::class)->group(function () {
        Route::get('/edit-logo', 'edit')->name('edit-logo');
        Route::post('/update-logo', 'update')->name('update-logo');
    });

    // Route for school history
    Route::controller(SchoolHistoryController::class)->group(function () {
        Route::get('schoolhistory/edit-schoolhistory', 'edit')->name('schoolhistory.edit-schoolhistory');
        Route::post('schoolhistory/update-schoolhistory', 'update')->name('schoolhistory.update-schoolhistory');
    });

    // Route for Speech One
    Route::controller(SpeechOneController::class)->group(function () {
        Route::get('speechone/edit-speechone', 'edit')->name('speechone.edit-speechone');
        Route::post('speechone/update-speechone', 'update')->name('speechone.update-speechone');
    });

    // Route for Speech Two
    Route::controller(SpeechTwoController::class)->group(function () {
        Route::get('speechtwo/edit-speechtwo', 'edit')->name('speechtwo.edit-speechtwo');
        Route::post('speechtwo/update-speechtwo', 'update')->name('speechtwo.update-speechtwo');
    });

    // Route for page
    Route::controller(PageController::class)->group(function () {

        Route::get('page/all-page', 'index')->name('page.all-page'); // show all
        Route::get('page/create-page', 'create')->name('page.create-page'); // show create page
        Route::post('page/insert-page', 'store')->name('page.insert-page'); // create process
        Route::get('page/preview-page/{id}', 'show')->name('page.show-page'); // show page preview
        Route::get('page/edit-page/{id}', 'edit')->name('page.edit-page'); // show edit page
        Route::post('page/update-page/{id}', 'update')->name('page.update-page'); // update process
        Route::get('page/delete-page/{id}', 'destroy')->name('page.delete-page'); // delete process
    });

    // Route for Notice
    Route::controller(NoticeController::class)->group(function () {

        Route::get('notice/all-notice', 'index')->name('notice.all-notice'); // show all
        Route::get('notice/create-notice', 'create')->name('notice.create-notice'); // show create page
        Route::post('notice/insert-notice', 'store')->name('notice.insert-notice'); // create process
        Route::get('notice/preview-notice/{id}', 'show')->name('notice.show-notice'); // show page preview
        Route::get('notice/edit-notice/{id}', 'edit')->name('notice.edit-notice'); // show edit page
        Route::post('notice/update-notice/{id}', 'update')->name('notice.update-notice'); // update process
        Route::get('notice/delete-notice/{id}', 'destroy')->name('notice.delete-notice'); // delete process
    });

    // Route for Announcement
    Route::controller(AnnouncementController::class)->group(function () {

        Route::get('announcement/all-announcement', 'index')->name('announcement.all-announcement'); // show all
        Route::get('announcement/create-announcement', 'create')->name('announcement.create-announcement'); // show create page
        Route::post('announcement/insert-announcement', 'store')->name('announcement.insert-announcement'); // create process
        Route::get('announcement/preview-announcement/{id}', 'show')->name('announcement.show-announcement'); // show page preview
        Route::get('announcement/edit-announcement/{id}', 'edit')->name('announcement.edit-announcement'); // show edit page
        Route::post('announcement/update-announcement/{id}', 'update')->name('announcement.update-announcement'); // update process
        Route::get('announcement/delete-announcement/{id}', 'destroy')->name('announcement.delete-announcement'); // delete process
    });

    // Route for importantlink
    Route::controller(ImportantLinkController::class)->group(function () {

        Route::get('importantlink/all-importantlink', 'index')->name('importantlink.all-importantlink'); // show all
        Route::get('importantlink/create-importantlink', 'create')->name('importantlink.create-importantlink'); // show create page
        Route::post('importantlink/insert-importantlink', 'store')->name('importantlink.insert-importantlink'); // create process
        Route::get('importantlink/preview-importantlink/{id}', 'show')->name('importantlink.show-importantlink'); // show page preview
        Route::get('importantlink/edit-importantlink/{id}', 'edit')->name('importantlink.edit-importantlink'); // show edit page
        Route::post('importantlink/update-importantlink/{id}', 'update')->name('importantlink.update-importantlink'); // update process
        Route::get('importantlink/delete-importantlink/{id}', 'destroy')->name('importantlink.delete-importantlink'); // delete process
    });

    // Route for Download
    Route::controller(DownloadController::class)->group(function () {

        Route::get('download/all-download', 'index')->name('download.all-download'); // show all
        Route::get('download/create-download', 'create')->name('download.create-download'); // show create page
        Route::post('download/insert-download', 'store')->name('download.insert-download'); // create process
        Route::get('download/preview-download/{id}', 'show')->name('download.show-download'); // show page preview
        Route::get('download/edit-download/{id}', 'edit')->name('download.edit-download'); // show edit page
        Route::post('download/update-download/{id}', 'update')->name('download.update-download'); // update process
        Route::get('download/delete-download/{id}', 'destroy')->name('download.delete-download'); // delete process
    });

    // Route for Download
    Route::controller(SliderController::class)->group(function () {

        Route::get('slider/all-slider', 'index')->name('slider.all-slider'); // show all
        Route::get('slider/create-slider', 'create')->name('slider.create-slider'); // show create page
        Route::post('slider/insert-slider', 'store')->name('slider.insert-slider'); // create process
        Route::get('slider/preview-slider/{id}', 'show')->name('slider.show-slider'); // show page preview
        Route::get('slider/edit-slider/{id}', 'edit')->name('slider.edit-slider'); // show edit page
        Route::post('slider/update-slider/{id}', 'update')->name('slider.update-slider'); // update process
        Route::get('slider/delete-slider/{id}', 'destroy')->name('slider.delete-slider'); // delete process
    });

    // End
});
