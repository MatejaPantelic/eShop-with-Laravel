<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
Admin PanelRoutes
|--------------------------------------------------------------------------
*/

Route::get('panel','PanelController@indes')->name('panel');
Route::resource('products', 'ProductsController');

