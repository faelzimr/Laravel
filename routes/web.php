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

Route::group(['prefix'=>'article'],function(){
	Route::get('',['uses'=>'ArticlesController@allArticles']);
	Route::get('{id}',['uses'=>'ArticlesController@getArticle']);
	Route::post('',['uses'=>'ArticlesController@saveArticle']);
	Route::put('{id}',['uses'=>'ArticlesController@updateArticle']);
	Route::delete('{id}',['uses'=>'ArticlesController@deleteArticle']);
});








