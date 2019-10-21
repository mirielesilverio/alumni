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

Route::get('perfil', function () {
    return view('perfil.index');
});

//================================================================================================
//==================					ROTAS DE PERFIL 						==================
//================================================================================================
Route::get('perfil', 'AlunoController@index')->name('perfil.aluno');
Route::get('perfil/editar', 'AlunoController@edit')->name('perfil.aluno.editar');
Route::post('perfil/atualizar/{cpf}', 'AlunoController@update')->name('perfil.aluno.atualizar');

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
Route::get('logout', 'LoginController@logout')->name('logout');



Route::get('/home', 'HomeController@index')->name('home');
