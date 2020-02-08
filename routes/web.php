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

Route::get('/', function () {
    return view('scraping');
});

Route::view('/pesquisa','scraping');

Route::view('/lista','list');

Route::post('/pesquisatitulo','ScrapingController@pesqScraping');

Route::view('/singin','user_register');

Route::get('lista','ScrapingController@returnData');


// Auth::routes();

//Route::get('/teste', 'HomeController@index')->name('home');

Route::post('/registerUserForm','UsersController@registerUser');

Route::post('/validaUserForm','UsersController@validaUser');

