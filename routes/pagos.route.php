<?php
Route::group(['middleware'=>'auth','namespace'=>'Pago'], function() {

	Route::get('pagos/{id?}','PagoController@index')->name('pagos.index');
	Route::get('pagos-pdf/{id?}','PagoController@pdf')->name('pagos.pdf');


});

