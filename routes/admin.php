<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'ant-media/admin'], function(){
	require __DIR__.'/auth/admin.php';
	Route::middleware('admin')->name('admin.')->group(function(){
		Route::resource('/broadcast', App\Http\Controllers\Admin\BroadcastController::class);
	});
});
