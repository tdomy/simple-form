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

Route::get('/inquiry', 'InquiryController@show')->name('inquiry');
Route::post('/inquiry/confirm', 'InquiryController@confirm');
Route::post('/inquiry/finish', 'InquiryController@finish');
