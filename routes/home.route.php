<?php

Route::get('/', [
 'uses' => 'HomeController@index',
 'as' => 'home.index'
]);

