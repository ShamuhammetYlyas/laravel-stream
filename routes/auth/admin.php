<?php

use Illuminate\Support\Facades\Route;


//admin route
Route::group(['middleware' => ['admin.guest']], function () {
    Route::view('login', 'auth.admin.login')->name('admin.login');
    Route::post('login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.auth');
});
        

Route::group(['middleware' => ['admin']], function () {
	Route::any('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.index');
    Route::post('logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/change-password', [App\Http\Controllers\Admin\AdminController::class, 'changePasswordForm'])->name('admin.changePasswordForm');
    Route::post('/change-password', [App\Http\Controllers\Admin\AdminController::class, 'changePasswordPost'])->name('admin.changePasswordPost');
});
//admin route end