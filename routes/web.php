<?php

//DB::listen(function($query){
//	var_dump($query->sql);
//});



Route::view('/','home')->name('home');
Route::view('/about','about')->name('about');
/*
Route::get('/portfolio','ProjectController@index')->name('projects.index');
Route::get('/portfolio/crear','ProjectController@create')->name('projects.create');
Route::get('/portfolio/{project}/editar','ProjectController@edit')->name('projects.edit');
Route::patch('/portfolio/{project}','ProjectController@update')->name('projects.update');
Route::post('/portfolio','ProjectController@store')->name('projects.store');
Route::get('/portfolio/{project}','ProjectController@show')->name('projects.show');
Route::delete('/portfolio/{project}','ProjectController@destroy')->name('projects.destroy');
*/
Route::resource('portafolio','ProjectController')->names('projects')->parameters(['portafolio'=>'project']);
Route::patch('portafolio/{project}/restore','ProjectController@restore')->name('projects.restore');
Route::delete('portafolio/{project}/forceDelete','ProjectController@forceDelete')->name('projects.forceDelete');
Route::view('/contact','contact')->name('contact');
Route::post('contact','MessageController@store')->name('messages.store');

Route::get('categorias/{category}','CategoryController@show')->name('categories.show');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
