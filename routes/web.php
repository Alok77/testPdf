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

Route::get('chart', 'DisplayController@index');
Route::get('pdfview',array('as'=>'pdfview','uses'=>'DisplayController@pdfview'));

Route::get('preview', 'DisplayController@preview');
Route::get('download', 'DisplayController@download')->name('download');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
