<?php

Auth::routes();

Route::get('/', 'PostController@index')->name('post_list');
Route::get('/post/{id}', 'PostController@single')->name('post_single');
Route::get('/postForm/{id?}', 'PostController@form')->name('post_form');
Route::post('/addNewPost', 'PostController@add')->name('post_add');
Route::get('/post/{id}/delete', 'PostController@delete')->name('post_delete');
Route::post('/post/{id}/edit', 'PostController@edit')->name('post_edit');

Route::post('/comment/addToPost/{postId}', 'CommentController@add')->name('comment_add');
Route::get('/comment/delete/{commentId}', 'CommentController@delete')->name('comment_delete');

Route::get('/home', 'HomeController@index')->name('home');
