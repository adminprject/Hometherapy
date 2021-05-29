<?php

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

Route::get('/', 'welcomeController@homeCliente');
Route::get('producto/{id}', 'welcomeController@detalleProducto');

Route::prefix('foro')->group(function(){
    Route::get('/', 'foroController@index');
    Route::get('/{category}', 'foroController@index');
    Route::get('/login', 'foroController@login');
    Route::post('/postLogin', 'foroController@postLogin');
    Route::get('/register', 'foroController@registerUser');
    Route::post('/postRegister', 'foroController@postRegisterUser');
    Route::get('/registerDiscusion', 'foroController@registerDiscusion');
    Route::post('/postRegisterDiscusion', 'foroController@postRegisterDiscusion');
    Route::get('/discussion/{slug}', 'foroController@detalleDiscussion');
    Route::get('/logout', 'foroController@logout');
    Route::post('/discusion/post', 'foroController@registerPost');
});

Route::get('auth/{provider}', 'Auth\SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Route::prefix('admin')->group(function(){
    Route::get('/','Auth\LoginController@showLogin');
    Route::get('login', 'Auth\LoginController@showLogin');
    Auth::routes();
    Route::get('logout', 'Auth\LoginController@logout');
    Route::get('home', 'HomeController@index')->name('home');
    Route::resource('categories/forum','categoriesForoController');
});

