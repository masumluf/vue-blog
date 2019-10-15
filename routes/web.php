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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/testCo', 'HomeController@contactTest');
// Route::get('/dash', 'HomeController@dash');
// Route::get('/posts', 'PostController@get_all_post');

//Route::get('/{anypath}', 'HomeController@index')->where('path', '.*');
Route::post('/addcat', 'CatController@addcat');
Route::get('/catagory', 'CatController@get_all_catagory');
Route::get('/deletecatagory/{id}', 'CatController@deleteCatagory');
Route::post('/editcat/{id}', 'CatController@editcat');

//post related

Route::get('/posts', 'PostsController@get_all_posts');
Route::post('/savepost', 'PostsController@save_post');

Route::get('/categories', 'CatController@all_category');
