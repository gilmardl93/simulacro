<?php
Route::group(['prefix' => 'admin','namespace'=>'Admin'], function() {
	require __DIR__.'/admin/admin.route.php';
	Route::get('listado-pago','PagosController@listado');

});