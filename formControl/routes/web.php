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
// Route::get('form','ATGController@create')->name('form.create');
// Route::post('form','ATGController@store')->name('form.store');
Route::resource('form','ATGController',['names' => [
    'store' => 'store',
]]);