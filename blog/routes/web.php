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

//Pages
Route::get('/', 'PagesController@getIndex');
Route::get('/home', 'PagesController@getIndex');
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');
Route::post('/contact', 'PagesController@postContact');

//Blog
Route::get('blog/{slug}', ['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
Route::get('blog', ['as'=>'blog.index','uses'=>'BlogController@getIndex']);

// Posts 
Route::Resource('posts','PostController');
Route::Resource('tags','TagController',['except'=>'create']);
Route::Resource('categories','CategoryController',['except'=>'create']);

//Comments
Route::post('comments/{post_id}',['uses'=>'CommentController@store','as'=>'comments.store']);
Route::get('comments/{post_id}/edit',['uses'=>'CommentController@edit','as'=>'comments.edit']);
Route::put('comments/{post_id}',['uses'=>'CommentController@update','as'=>'comments.update']);
Route::delete('comments/{post_id}',['uses'=>'CommentController@destroy','as'=>'comments.destroy']);
Route::get('comments/{post_id}/delete',['uses'=>'CommentController@delete','as'=>'comments.delete']);
