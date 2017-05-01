<?php

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


Route::get('/', 'ProductsController@index')->name('home');
Route::get('about', function () {
    return view('about');
});
//Products
Route::get('/products', 'ProductsController@index');
Route::get('/products/create', 'ProductsController@create');
Route::post('/products', 'ProductsController@store');
Route::get('/products/{product}', 'ProductsController@show');
//Attachements
Route::get('/attachements', 'AttachementsController@index');
Route::get('/attachements/create/{product}', 'AttachementsController@create');
Route::post('/attachements', 'AttachementsController@store');
Route::get('/attachements/{attachement}', 'AttachementsController@show');

//comments
Route::post('/products/{product}/comments', 'CommentsController@store');

//Users
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionController@create');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');

Route::get('login/google', 'Auth\LoginController@redirectToProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

// Auth::routes();
//
// Route::get('/home', 'HomeController@index');


Route::get('map','ItemsController@map');

//stores
Route::get('/stores', 'StoresController@index');
Route::get('/stores/{city}', 'StoresController@search');
//api
Route::get('api/stores', 'StoresController@json');
Route::get('api/stores/{city}', 'StoresController@json');
Route::get('api/stores/near/{item}', 'StoresController@near');
