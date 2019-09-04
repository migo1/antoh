<?php

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

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('dashboard', 'DashboardController');
Route::resource('genres', 'TypeController');
Route::resource('books', 'BookController');
Route::resource('members', 'MemberController');
Route::resource('borrowers', 'BorrowerController');
Route::resource('renews', 'RenewController');

//routes for books search
Route::get('/books_search', 'BookSearchController@index')->name('books_search');
Route::get('/books_search/search', 'BookSearchController@search')->name('search');

//routes for members search
Route::get('/members_search', 'MemberSearchController@index')->name('members_search');
Route::get('/members_search/search', 'MemberSearchController@search')->name('member_search');