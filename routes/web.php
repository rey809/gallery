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

/*Route::get('/', function () {
    return view('gallery/index');
});*/

Route::get('/', 'GalleryController@index')->name('index');
Route::get('image/mainlist', 'GalleryController@mainlist')->name('image.mainlist');

Route::post('image/upload', 'ImageUploadController@upload')->name('image.upload');
Route::post('image/tag/{image_id?}', 'ImageTagController@tag')->name('image.tag');
Route::post('image/delete/{image_id?}', 'ImageTagController@destroy')->name('image.destroy');
/*Route::post('image/tag/{image_id?}', 'ImageTagController@tag')->name('image.tag');*/

