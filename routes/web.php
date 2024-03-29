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
Route::post('/libraryUpdate/{bookId}', 'App\Http\Controllers\LibraryController@updateBook')->name('libraryUpdate')->middleware('admin');
Route::post('/libraryDelete/{bookId}', 'App\Http\Controllers\LibraryController@deleteBook')->name('libraryDelete')->middleware('admin');
Route::post('/library/search', 'App\Http\Controllers\LibraryController@searchBooks')->name('librarySearch');
Route::post('/library/search/filters', 'App\Http\Controllers\LibraryController@searchBooksFilters')->name('librarySearch.filters');
Route::get('/library/refresh', 'App\Http\Controllers\LibraryController@refresh')->name('library.refresh');

Route::post('/buyBook/{userId}/{bookId}', 'App\Http\Controllers\LibraryController@buyBook')->name('buyBook');
Route::post('/borrowBook/{userId}/{bookId}', 'App\Http\Controllers\LibraryController@borrowBook')->name('borrowBook');

Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile')->middleware('auth');
Route::post('/profile/updatePicture', 'App\Http\Controllers\ProfileController@updatePicture')->name('profile.update.picture');
Route::post('/profile/updateName', 'App\Http\Controllers\ProfileController@updateName')->name('profile.update.name');
Route::post('/profile/updatePassword', 'App\Http\Controllers\ProfileController@updatePassword')->name('profile.update.password');
Route::post('/profile/deleteUser', 'App\Http\Controllers\ProfileController@deleteUser')->name('profile.delete.user');

Route::get('/addBook', 'App\Http\Controllers\BookController@index')->name('addBook')->middleware('admin');
Route::post('/addBook', 'App\Http\Controllers\BookController@insert')->name('addBook.insert')->middleware('admin');
Route::post('/updateBook/{bookId}', 'App\Http\Controllers\BookController@update')->name('addBook.update')->middleware('admin');

Route::get('/myLibrary', 'App\Http\Controllers\MyLibraryController@index')->name('myLibrary');
Route::post('/updateBookFavourite/{bookId}', 'App\Http\Controllers\MyLibraryController@updateBookFavourite')->name('myLibrary.updateBookFavourite');

Route::get('/bookInfo/{bookId}', 'App\Http\Controllers\BookInfoController@index')->name('bookInfo');

Route::get('/write/review/{what}', 'App\Http\Controllers\WriteController@index')->name('write');
Route::post('/write/website', 'App\Http\Controllers\WriteController@writeWebsiteReview')->name('write.website');
Route::post('/write/book/{bookId}', 'App\Http\Controllers\WriteController@writeBookReview')->name('write.book');
