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
    return view('welcome');
});

//================================================================================================
//==================					ROTAS DE CADASTRO 						==================
//================================================================================================
Route::get('cadastro', 'CadastroController@index')->name('cadastro');
Route::post('cadastro/validar', 'CadastroController@valida')->name('cadastro.validar');
Route::post('cadastro/salvar', 'CadastroController@store')->name('cadastro.salvar');

//================================================================================================
//==================					  ROTAS DE LOGIN 						==================
//================================================================================================
Route::get('login', 'LoginController@index')->name('login');
Route::post('logar', 'LoginController@login')->name('logar');



Route::get('/home', 'HomeController@index')->name('home');
