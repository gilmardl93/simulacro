<?php
Route::group(['middleware'=>'auth','namespace'=>'Recursos'], function() {

	Route::get('ubigeo','UbigeoController@ubigeo')->name('ubigeo.index');
	Route::get('colegio','ColegioController@colegio')->name('colegio.index');
	Route::resource('colegios','ColegioController',['names'=>'admin.colegios','only'=>['index','store']]);
	Route::get('admin/colegios-lista','ColegioController@lista')->name('admin.colegios.list');

});

