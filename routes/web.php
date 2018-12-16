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
    return view('welcome');
});

Route::get('/about', function () {
    return view('pages.about');
});*/

/*
//dynamic routes with dynamic variables
Route::get('/users/{id}', function ($id) {
    return 'This is user '.$id;
});

//dynamic routes with dynamic variables 2
Route::get('/users/{id}/{name}', function ($id, $name) {
    return 'This is user '.$name.', ID number: '.$id;
});*/

Route::get('/', 'PagesController@index');
//PagesController class from the Pages controller file
//index means that it is accessing index method from
//PagesController class
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/download_posts', 'PostsController@download'); // for db to excel exportation
//shortcut
Route::resource('posts', 'PostsController');
Auth::routes();
Route::get('/home', 'HomeController@index');
//Route::get('/home', 'HomeController@index')->name('home');
