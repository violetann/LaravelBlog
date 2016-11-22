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

//any users, admins or none logged in.
//Pages
Route::get('/', ['as'=>'index','uses'=>'PagesController@getIndex']);
Route::get('/home', ['as'=>'home','uses'=>'PagesController@getIndex']);
Route::get('/about', ['as'=>'about','uses'=>'PagesController@getAbout']);
Route::get('/contact', 'PagesController@getContact');
Route::post('/contact', 'PagesController@postContact');

//Blog
Route::get('blog/{slug}', ['as'=>'blog.single','uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
Route::get('blog', ['as'=>'blog.index','uses'=>'BlogController@getIndex']);


//Admins only
Route::group(['prefix' => '', 'middleware' => 'auth:administrator'], function()
{
    // Posts 
    Route::Resource('posts','PostController');
    Route::Resource('tags','TagController',['except'=>'create']);
    Route::Resource('categories','CategoryController',['except'=>'create']);

    //Comments
    Route::get('comments/{post_id}/edit',['uses'=>'CommentController@edit','as'=>'comments.edit']);
    Route::put('comments/{post_id}',['uses'=>'CommentController@update','as'=>'comments.update']);
    Route::delete('comments/{post_id}',['uses'=>'CommentController@destroy','as'=>'comments.destroy']);
    Route::get('comments/{post_id}/delete',['uses'=>'CommentController@delete','as'=>'comments.delete']);
});

//Logged in accounts only
Route::group(['prefix' => '', 'middleware' => 'auth:loggedin'], function()
{
    Route::post('comments/{post_id}',['uses'=>'CommentController@store','as'=>'comments.store']);
});   

//all users and guests
Route::group(['middleware' => 'auth:all'], function()
{
    $a = 'authenticated.';
    Route::get('/logout', ['as' => $a . 'logout', 'uses' => 'Auth\LoginController@logout']);
    Route::get('/activate/{token}', ['as' => $a . 'activate', 'uses' => 'ActivateController@activate']);
    Route::get('/activate', ['as' => $a . 'activation-resend', 'uses' => 'ActivateController@resend']);
    Route::get('not-activated', ['as' => 'not-activated', 'uses' => function () {
        return view('errors.not-activated');
    }]);
});