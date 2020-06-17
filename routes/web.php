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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    // ユーザー詳細画面
    Route::get('/users/edit', 'UsersController@edit');
    Route::post('/users/update', 'UsersController@update');
    Route::get('/users/{user_id}', 'UsersController@show');


    // タスクのトップ画面
    Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');

    // フォルダーの作成画面
    Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
    Route::post('/folders/create', 'FolderController@create');

    // フォルダーの削除送信
    Route::delete('/folders/{folder}', 'FolderController@destroy');


    // タスクの作成：詳細画面
    Route::get('/folders/{id}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
    Route::post('/folders/{id}/tasks/create', 'TaskController@create');

    //タスクの検索?????????????????????????????????????????????????????????????????????????
    Route::get('tasks/search', 'TaskController@search');

    // タスクの編集画面
    Route::get('/folders/{id}/tasks/{task_id}/edit', 'TaskController@showEditForm')->name('tasks.edit');
    Route::post('/folders/{id}/tasks/{task_id}/edit', 'TaskController@edit');

    // タスクの削除
    Route::delete('/tasks/{id}', 'TaskController@delete')->where('id', '[0-9]+');


    // 筋トレ図鑑のインデックス
    Route::get('/training/index', 'TrainingsController@index')->name('training.index');
    // 筋トレメニューの作成
    Route::get('/training/new', 'TrainingsController@new')->name('training.new');
    Route::post('/training/store', 'TrainingsController@store')->name('training.store');
    // 筋トレメニューの編集画面
    Route::get("training/edit/{id}", "TrainingsController@edit");
    Route::post("training/update/{id}", "TrainingsController@update")->name('training.update');

    // 筋トレメニューの詳細
    Route::get('/training/show/{id}', 'TrainingsController@show')->name('training.show');

    // 筋トレメニューの削除
    Route::get('/training/delete/{id}', 'TrainingsController@delete')->name('training.show');





});



Auth::routes();
