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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function(){

    return view('admin/index');
    

});








Route::group(['prefix'=> 'admin'], function(){

    Route::group(['prefix' => 'users'], function(){
        
        Route::get('create',['as'=>'admin-user-create', 'uses'=> 'AdminUsersController@create']);
        Route::post('create', ['as'=>'admin-user-save','uses'=>'AdminUsersController@store']);

        Route::get('edit/{id}', ['as'=>'admin-user-edit', 'uses' => 'AdminUsersController@edit']);
        Route::patch('{id}', ['as' => 'admin-user-update', 'uses'=>'AdminUsersController@update']);

        //Route::get('{$id}', ['as'=>'admin-user-delete', 'uses'=>'AdminUsersController@destroy']);
    });
    

});


Route::group(['prefix'=>'admin'], function(){
    Route::group(['prefix'=>'posts'], function(){
        Route::get('create',['as'=>'admin-post-create', 'uses'=> 'AdminPostsController@create']);
        Route::post('create', ['as'=>'admin-post-save','uses'=>'AdminPostsController@store']);

        Route::get('edit/{id}', ['as'=>'admin-post-edit', 'uses' => 'AdminPostsController@edit']);
        Route::patch('{id}', ['as' => 'admin-post-update', 'uses'=>'AdminPostsController@update']);
    });
});

Route::group(['prefix'=>'admin'], function(){
    Route::group(['prefix'=>'categories'], function(){
        Route::get('create',['as'=>'admin-category-create', 'uses'=> 'AdminCategoriesController@create']);
        Route::post('create', ['as'=>'admin-category-save','uses'=>'AdminCategoriesController@store']);

        Route::get('edit/{id}', ['as'=>'admin-category-edit', 'uses' => 'AdminCategoriesController@edit']);
        Route::patch('{id}', ['as' => 'admin-category-update', 'uses'=>'AdminCategoriesController@update']);
    });
});




//middleware
Route::group(['middleware'=>'admin'], function(){
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/categories', 'AdminCategoriesController');
});