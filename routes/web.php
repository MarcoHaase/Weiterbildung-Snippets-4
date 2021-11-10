<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home/{id?}', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/api2', [App\Http\Controllers\HomeController::class, 'saveuser'])->name('save2');


Route::get('/api', [App\Http\Controllers\HomeController::class, 'getusers'])->name('api');
Route::post('/api', [App\Http\Controllers\HomeController::class, 'saveuser'])->name('save');

Route::get('/api/tf/{friendid?}', [App\Http\Controllers\HomeController::class, 'tfriend'])->name('tfriend');
Route::get('/api/details/{id?}', [App\Http\Controllers\HomeController::class, 'fetchuser'])->name('fetchuser');
