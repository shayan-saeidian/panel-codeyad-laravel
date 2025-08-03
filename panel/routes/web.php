<?php

use App\Http\Controllers\Admin\PanelController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'enterUser'])->name('enter');

Route::get('/register',[AuthController::class,'register'])->name('register');
Route::post('/register',[AuthController::class,'submitUser'])->name('submit_user');

Route::get('/forget_password',[AuthController::class,'forgetPassword'])->name('forget_password');
Route::post('/send_forget_password_token',[AuthController::class,'forgetPasswordToken'])->name('send_forget_password_token');
Route::get('/set_new_password/{token}',[AuthController::class,'setNewPassword'])->name('set_new_password');
Route::post('/submit_new_password}',[AuthController::class,'SubmitNewPassword'])->name('submit_new_password');


Route::prefix('admin')->middleware(['auth','admin'])->group(function () {
    Route::get('/', PanelController::class)->name('admin_home');
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
