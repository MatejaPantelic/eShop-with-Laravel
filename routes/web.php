<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'MainController@index')->name('main');

// Route::get('/products','ProductsController@index')->name('products.index');
// Route::get('/show/{product}','ProductsController@show')->name('products.show');
// Route::get('products/create','ProductsController@create')->name('products.create');
// Route::post('products','ProductsController@store')->name('products.store');
// Route::get('products/{product}/edit','ProductsController@edit')->name('products.edit');
// Route::match(['patch', 'put'], '/products/{product}','ProductsController@update')->name('products.update');
// Route::delete('products/{product}', 'ProductsController@destroy')->name('products.destroy');

Route::resource('products', 'ProductsController'); //kreira automatski rute ya sve metode iz navedenog kontrolera
Route::resource('carts', 'CartController')->only(['index']);
Route::resource('products.carts','ProductCartController')->only(['store','destroy']);
Route::resource('orders', 'OrderController')->only(['create','store']);

Route::get('/test','MainController@index')->name('main.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
