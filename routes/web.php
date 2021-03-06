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

Route::middleware(['auth:sanctum', 'verified', 'user.allowed'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'user.allowed', 'admin'])->resource('/users', 'UserController')->only(['index', 'destroy', 'show']);
Route::middleware(['auth:sanctum', 'user.allowed'])->resource('services', 'ServiceController');

Route::get('/api/users', 'ApiUserController@index')->name('users.api');
