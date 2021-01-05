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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');

Route::resource('comments', 'CommentController');

// 管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset' => false,
        'vertify' => false
    ]); 

    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

        // post一覧ページ
        Route::resource('admin', 'AdminController');
    });
});

// 既読
Route::get('/posts/read/{id}', 'PostController@read')->name('post.read');

// お気に入り機能
Route::get('/posts/favorite/{id}', 'PostController@favorite')->name('post.favorite');
Route::get('/posts/unfavorite/{id}', 'PostController@unfavorite')->name('post.unfavorite');
