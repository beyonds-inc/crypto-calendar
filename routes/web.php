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

Route::get('/posts', function () {
    return redirect('/');
});

//管理画面
Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'roles'], 'roles' => ['admin']], function () {
    Route::get('/', 'Admin\AdminController@index');
    Route::get('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
    Route::post('generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
    Route::resource('roles', 'Admin\RolesController');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::resource('users', 'Admin\UsersController');
    Route::resource('posts', 'Admin\\PostsController');
    Route::resource('contacts', 'Admin\\ContactsController');
});

//Posts
Route::get('/', 'PostsController@index');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/posts/create','PostsController@create');
    Route::post('/','PostsController@store');
    Route::get('posts/{id}','PostsController@show')->where('id', '[0-9]+');
    Route::get('/post/{post}/edit', 'PostsController@edit');
    Route::patch('/posts/{id}','PostsController@update')->where('id', '[0-9]+');
    Route::get('/post/{post}/delete', 'PostsController@destroy');
    Route::post('posts/search', 'PostsController@search');
});

//通報
Route::group(['prefix' => 'contacts','middleware' => ['auth']], function () {
    Route::get('/', 'ContactsController@index');
    Route::post('/confirm', 'ContactsController@confirm');
    Route::get('/complete', 'ContactsController@complete');
});
