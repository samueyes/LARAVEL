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

/*VIEW*/
Route::get('/', function () {
    return view('welcome');
});
Route::get('/samu', function () {
    return view('samu_home');
});
//Membatasi hanya dari post / GET
Route::match([ 'post','get'], '/samu_post', function () {
    return view('samu_post');
});

Route::get('foo', function () {
    return 'Hello World';
});

//Membatasi hanya dari post
Route::match([ 'post'], '/match', function () {
    echo 'match';
});

//Ambil Value dari URI segment
Route::get('user/{id}', function ($id) {
    return 'Ambil Value dari URI segment User '.$id;
});
Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'posts '.$postId.' comments '.$commentId;
});

//Optional URI segment set return default
Route::get('user/{name?}', function ($name = 'John') {
    return 'Optional URI segment set return default '.$name;
});

//Where Parameter
Route::get('where/{name}', function ($name) {
    return 'Where Parameter '. $name . ' == [Regular Expression]';
})->where('name', '[A-Za-z]+');
Route::get('where/{id}', function ($id) {
    //
})->where('id', '[0-9]+');
Route::get('where/{id}/{name}', function ($id, $name) {
    //
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
Route::get('has', function () {
   return view('samu_has');
})->name('samu_test');;


/*CONTROLLER*/
Route::get('halo', 'TestController@Index');

Auth::routes();

Route::get('/home', 'HomeController@index');
