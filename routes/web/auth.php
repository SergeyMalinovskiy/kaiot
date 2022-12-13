<?php

use \App\Http\Controllers\AuthController;

Route::get('login', [AuthController::class, 'getLoginForm'])->name('login');
Route::get('register', [AuthController::class, 'getRegisterForm'])->name('register');

Route::post('login', [AuthController::class, 'auth'])->name('login.send');
Route::post('register', [AuthController::class, 'register'])->name('register.send');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');
