<?php
use Illuminate\Http\Request;
use App\Products;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
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
/*
Route::get('/signin', function(){
    return view('signin', compact('products', 'sales'));
});
*/
Route::get('/products', function(){
    return view('products');
});

Auth::routes();
Route::post('/signup','SessionsController@postSignup');
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
Route::get('/c', 'CartController@index')->name('cart.index');


Route::get('search', 'ProductsController@searchByName')->name('search');

Route::get('audio', 'ProductsController@audio')->name('audio');

Route::get('image', 'ProductsController@image')->name('image');

Route::get("api/products" , function(){

    $data = \App\Products::all();
    return response()->json($data);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
