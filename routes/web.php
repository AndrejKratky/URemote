<?php

use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
Route::post('/home/updatePlan/{plan}', 'App\Http\Controllers\HomeController@updatePlan')->name('update.plan')->middleware('auth');

Route::get('/login', 'App\Http\Controllers\LoginController@index')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@login')->name('login.action');
Route::post('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

Route::get('/register', 'App\Http\Controllers\RegisterController@index')->name('register.show');
Route::post('/register/newUser', 'App\Http\Controllers\RegisterController@register')->name('register');

Route::get('/library', 'App\Http\Controllers\LibraryController@index')->name('library');

Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile')->middleware('auth');
Route::post('/profile/updatePicture', 'App\Http\Controllers\ProfileController@updatePicture')->name('profile.update.picture');
Route::post('/profile/updateName', 'App\Http\Controllers\ProfileController@updateName')->name('profile.update.name');
Route::post('/profile/updatePassword', 'App\Http\Controllers\ProfileController@updatePassword')->name('profile.update.password');
Route::post('/profile/deleteUser', 'App\Http\Controllers\ProfileController@deleteUser')->name('profile.delete.user');

Route::get('/addBook', 'App\Http\Controllers\BookController@index')->name('addBook')->middleware('admin');
Route::post('/addBook', 'App\Http\Controllers\BookController@insert')->name('addBook.insert')->middleware('admin');
