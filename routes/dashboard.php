<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;

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




Route::middleware(['auth:admin'])->as('admin.')->group(function () {

    Route::resource('admins','App\Http\Controllers\Backend\AdminController');
    Route::post('admins/{id}',[App\Http\Controllers\Backend\AdminController::class,'updateStatus'])->name('admins.update_status');
    Route::delete('multi_delete',[App\Http\Controllers\Backend\AdminController::class,'MultiDelete'])->name('admins.mult.delete');
});


