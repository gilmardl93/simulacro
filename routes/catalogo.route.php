<?php

Route::group(['namespace'=>'Catalogo','middleware'=>'auth'], function() {
	Route::resource('catalogo','CatalogoController');
	Route::get('gestion/{table}', [
		 'uses' => 'CatalogoController@index',
		 'as' => 'catalogo.gestion'
		]);
	Route::get('active/{catalogo}', [
		 'uses' => 'CatalogoController@active',
		 'as' => 'catalogo.active'
		]);
});