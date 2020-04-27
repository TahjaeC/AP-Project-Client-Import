<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', function () {
    return view('welcome');
});
Route::get('/manager', function () {
    return view('manager');
});
Route::get('/searchfunc', function(){
    return view('searchfunc');
});
Route::get('/edit', function(){
    return view('edit');
});
Route::get('/signup', function(){
    return view('signup');
});
Route::get('/products', function(){
    return view('products');
});

Auth::routes();
Route::post('/signup','SessionController@postSignup');
Route::get('/allItems', 'ProductsController@disp');
Route::get('/searchfunc', 'ProductsController@search');
Route::post('/edit', 'ProductsController@update');
Route::get('/create', 'ProductsController@create');
Route::post('/create', 'ProductsController@store');
Route::delete('/allItems/{id}', 'ProductsController@destroy');
Route::get('/signin', 'SessionsController@create');
//Route::post('/signin', 'SessionsController@store1');
Route::post('/signin', 'CartController@store')->middleware("throttle:3,2");
Route::get('/report', 'ChartController@index');

Route::get('/products', 'ProductsController@display');
Route::post('/products/{product}', 'ProductsController@display')->name('cart.add');
Route::get('cart', function(){
    return view('cart');
});

Route::get('/c-add/{product}', 'CartController@add')->name('cart.add');
Route::get('/c-destroy/{itemId}', 'CartController@destroy')->name('cart.destroy');
Route::get('/c-confirm/{itemId}', 'CartController@confirm')->name('cart.confirm');
Route::get('/c-update/{itemId}', 'CartController@update')->name('cart.update');
Route::get('/c-clearCart', 'CartController@clearCart')->name('cart.clearCart');
Route::get('/c-checkout', 'CartController@checkout')->name('cart.checkout');
Route::get('/c', 'CartController@index')->name('cart.index');