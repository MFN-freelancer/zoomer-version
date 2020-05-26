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

Auth::routes();

//Route::get('/', 'HomeController@index')->name('home');

Route::get('/', 'FrontController@index');
Route::get('whats-new', 'FrontController@whatNew');
Route::get('whats-hot', 'FrontController@whatHot');
Route::get('video-view/{id}', 'FrontController@player');
Route::post('video/{id}', 'FrontController@videoInfo');
//likes dislikes
Route::post('like', 'FrontController@like');
Route::post('dislike', 'FrontController@dislike');
//comment
Route::post('comment', 'FrontController@comment')->name('comment');

Route::get('contact-us', function (){
    return view('contact-us');
});

//admin part
Route::group(['prefix'=>'admin'], function(){
    Route::get('/', 'VideoListController@index');
    Route::get('/approve/{id}', 'VideoListController@approve');

    Route::get('add-videos', 'VideoListController@showAddboard')->name('add-video');
    Route::post('add-videos', 'VideoListController@addVideo');

    Route::get('edit-delete', 'VideoListController@editShow')->name('edit-delete');
    Route::get('edit-delete/{id}', 'VideoListController@editDelete');

    Route::get('manage-users', 'HomeController@manageUser')->name('user-manage');
    Route::get('manage-users/{id}', 'HomeController@deleteUser');

    Route::get('change-password', function (){
        return view('admin.change');
    })->name('change-password');
    Route::get('change-password/{id}', 'HomeController@updateUser');
    Route::get('/downloaded', 'VideoListController@index')->name('downloaded-video');
});
Route::get('/config-cache', function() {

    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});