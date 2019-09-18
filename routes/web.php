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

include __DIR__.'/Admin/web.php';
include __DIR__.'/Index/web.php';

Route::get('/', function () {
    return view('index.home');
});

Route::any('/component/upload', 'Component\UploadController@upload');
Route::any('/component/filesLists', 'Component\UploadController@filesLists');

Route::get('/home', 'HomeController@index')->name('home');


