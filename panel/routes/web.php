<?php

use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/users', [UserController::class,'index'])->name('admin.users.index');
    Route::get('/user/create', [UserController::class,'create'])->name('admin.user.create');
    Route::post('/user/store', [UserController::class,'store'])->name('admin.user.store');
    Route::get('/user/edit/{id}', [UserController::class,'edit'])->name('admin.user.edit');
    Route::get('/deleted_users', [UserController::class,'deletedUsers'])->name('admin.user.deletedUsers');
    Route::put('/user/update/{id}', [UserController::class,'update'])->name('admin.user.update');
    Route::put('/user/restore/{id}', [UserController::class,'restore'])->name('admin.user.restore');
    Route::delete('/user/delete/{id}', [UserController::class,'destroy'])->name('admin.user.delete');
    Route::post('/user/download/{id}', [UserController::class,'download'])->name('admin.user.download');
});
