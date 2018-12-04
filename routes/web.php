<?php

Route::group(['middleware' => 'checkuser'], 
	function(){
			Route::get('/logout', 'LoginController@logout');


			Route::get('/admin/outlet', 'AdminController@outlet');
			Route::delete('/admin/deleteOutlet', 'AdminController@deleteOutlet');
			Route::post('/admin/add_user', 'AdminController@add_user');
			Route::put('/admin/edit_user', 'AdminController@edit_user');

			// smack 1.1
			Route::put('/admin/confirm_user', 'AdminController@confirm_user');
			Route::put('/admin/reject_user', 'AdminController@reject_user');

			Route::get('/outlet' , 'OutletController@menu');
			Route::post('/outlet/addMenu' , 'OutletController@addmenu');
			Route::put('/outlet/updateMenu' , 'OutletController@updatemenu');
			Route::delete('/outlet/deleteMenu' , 'OutletController@deletemenu');

			Route::get('/outlet/order' , 'OutletController@order');
			Route::put('/outlet/confirmOrder' , 'OutletController@confirmOrder');
			Route::post('/pemesanan' , 'HomeController@pemesanan');

		});


Route::get('/login', 'LoginController@login');
Route::post('/loginCheck', 'LoginController@loginCheck');


// smack 1.1
Route::get('/register', 'LoginController@register');
Route::post('/input_register', 'LoginController@input_register');

Route::get('/', 'HomeController@home');
Route::get('/product_detail/{id}', 'HomeController@product_detail');
