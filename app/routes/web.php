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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'Admin\AdminController@index');

// Route::group([ 'middleware' => ['auth', 'roles'], 'roles' => 'admin'], function () {
Route::resource('admin/roles', 'Admin\RolesController');
Route::resource('admin/permissions', 'Admin\PermissionsController');
Route::resource('admin/users', 'Admin\UsersController');
Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
// });

Route::get('/posts/create','PostsController@create')->name('post.create');
Route::post('/posts','PostsController@store')->name('post.store');

Route::patch('/posts/{id}','PostsController@update')->name('post.update');

Route::get('post/{post}/delete', [
    'as'   => 'post.delete',
    'uses' => 'PostsController@destroy',
]);

Route::get('post/{post}/edit', [
    'as'   => 'post.edit',
    'uses' => 'PostsController@edit',
]);

Route::get('posts', 'PostsController@index');

Route::get('posts/{id}', [
    'as'   => 'post.show',
    'uses' => 'PostsController@show',
]);

Route::post('posts/search', 'PostsController@search');

Route::get('sample/mailable/preview', function () {
  return new App\Mail\SampleNotification();
});

//お問い合わせ
Route::get('contacts', 'ContactsController@index');
Route::post('contacts/confirm', 'ContactsController@confirm');
Route::get('contacts/complete', 'ContactsController@complete');

Route::resource('sample/laravel', 'sample\\laravelController');
