<?php
Route::group(['middleware'=>'auth','namespace'=>'Reglamento'], function() {

	Route::get('reglamento','ReglamentoController@index')->name('reglamento.index');

});

