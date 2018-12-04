<?php

Route::group(['middleware' => 'checkuser'], 
	function(){
			Route::get('/logout', 'LoginController@logout');


			Route::get('/admin/outlet', 'AdminController@outlet');
			Route::delete('/admin/deleteOutlet', 'AdminController@deleteOutlet');
			Route::post('/admin/add_user', 'AdminController@add_user');
			Route::put('/admin/edit_user', 'AdminController@edit_user');

		});


Route::get('/login', 'LoginController@login');
Route::post('/loginCheck', 'LoginController@loginCheck');
