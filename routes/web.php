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

Route::get('/', 'TasksController@index');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//Route::resource('tasks', 'TasksController');

Route::group(['middleware' => ['auth']], function () {
    //未ログイン状態では作成・編集・削除・表示ができないようにしたい
    Route::resource('tasks', 'TasksController', ['only' => ['index', 'create', 'show', 'store', 'edit', 'update', 'destroy']]);
});
