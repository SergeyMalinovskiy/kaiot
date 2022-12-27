<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DeviceController;

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

Route::get('/', function () { return view('pages.home.index'); })->name('home');

/**
 * Устройства
 */
Route::resource('devices', DeviceController::class);

/**
 * Мониторинг
 */
Route::prefix('monitor')->group(function () {
    Route::get('/', function () { return 'Monitoring page!'; })->name('monitor');
});

/**
 * Управление системой
 */
Route::prefix('control')->group(function () {
    Route::get('/', function () { return 'Control page!'; })->name('control');
});

/**
 * Настройки
 */
Route::prefix('settings')->group(function () {
    Route::get('/', function () { return 'Settings page!'; })->name('settings');
});

/**
 * Пользователи
 */
Route::resource('users', \App\Http\Controllers\UsersController::class);

