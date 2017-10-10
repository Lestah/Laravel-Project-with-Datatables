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

Route::get('about', function () {
    return view('about');
});

Route::get('contact', function () {
    return view('contact');
});

Route::post('items', function () {
    return view('ajax-crud-2');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('posts', 'PostController');
Route::get('posts', 'PostController@index');
Route::get('show/{id}', 'PostController@show');
Route::post('posts/create', 'PostController@create');
Route::post('posts', 'PostController@store')->name('insert');
//Route::match(['get', 'post'], '/post/edit/{id}', 'PostController@edit');
Route::get('posts/edit/{id}', 'PostController@edit'); 
Route::put('posts/update/{id}', 'PostController@update');
Route::delete('posts/delete/{post}', 'PostController@destroy');

Route::get('datatable', 'PostController@datatable_test');
Route::get('datatableserverside', 'PostController@datatable_server_side_view');
Route::get('jsonview', 'PostController@json_data_to_pass');
Route::resource('items', 'AjaxCrudController');
Route::get('manage-item-ajax', 'AjaxCrudController@index');
Route::post('/editItem', 'AjaxCrudController@editItem');
Route::get('items/{item}/edit', 'AjaxCrudController@edit');
Route::get('ajax/crud/2','AjaxCrudController@getAjaxCrud2');
