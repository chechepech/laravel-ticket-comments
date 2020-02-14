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

Auth::routes();
Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');
Route::resource('tickets','TicketsController');
Route::post('/comment','CommentsController@new_comment');
Route::get('/', 'HomeController@index')->name('home');

// Route::get('/tickets', 'TicketsController@index')->name('tickets');
// Route::get('/ticket/{slug?}','TicketsController@show')->name('ticket.show');
// Route::get('/ticket/{slug?}/edit','TicketsController@edit')->name('ticket.edit');
// Route::post('/ticket/{slug?}/edit','TicketsController@update');
// Route::post('/ticket/{slug?}/delete','TicketsController@destroy')->name('ticket.destroy');
// Route::get('/contact', 'PagesController@create');
// Route::post('/contact', 'TicketsController@store')->name('ticket.store');

