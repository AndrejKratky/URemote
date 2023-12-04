<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::redirect('/', '/home');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@login')->name('login.action');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

Route::get('/register', 'App\Http\Controllers\RegisterController@index')->name('register.show');
Route::post('/register', 'App\Http\Controllers\RegisterController@register')->name('register');

Route::get('/test', function () {
    return view('layouts.app');
});
