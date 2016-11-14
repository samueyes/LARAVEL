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

	Route::get($uri, $callback);
	Route::post($uri, $callback);
	Route::put($uri, $callback);
	Route::patch($uri, $callback);
	Route::delete($uri, $callback);
	Route::options($uri, $callback);

*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('foo', function () {
    return 'Hello World';
});


Route::get('/samu', function () {
    return view('samu_home');
});

//Membatasi hanya dari post
Route::match([ 'post'], '/match', function () {
    echo 'match';
});

//Membatasi hanya dari post / GET
Route::match([ 'post','get'], '/samu_post', function () {
    return view('samu_post');
});

//Ambil Value dari URI segment
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});
Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'posts '.$postId.' comments '.$commentId;
});

//Optional URI segment set return default
Route::get('user/{name?}', function ($name = 'John') {
    return $name;
});