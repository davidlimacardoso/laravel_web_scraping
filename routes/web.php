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
//PÁGINA INICIAL
Route::get('/', function () {
    return view('/access');
});

//PERMISSOES DA MIDDLEWARE
Route::group(['middleware' => ['permission']], function () {
    //
    //ROTA PÁGINA DE PESQUISA
    Route::view('/pesquisa','scraping');

    //ROTA PÁGINA LISTA
    Route::view('/lista','list');
});


//FORMULÁRIO DE PESQUISA
Route::post('/pesquisatitulo','ScrapingController@pesqScraping');

//PÁGINA ACESSO
Route::view('/sign','access');

//FORMULARIO LISTA
Route::get('lista','ScrapingController@returnData');

//FORMULARIO REGISTRAR USUÁRIO
Route::post('/registerUserForm','UsersController@registerUser');

//FOMRULÁRIO VALIDA ACESSO
Route::get('/validaUserForm','UsersController@validaUser');

Route::get('/logout','UsersController@getSignOut');




