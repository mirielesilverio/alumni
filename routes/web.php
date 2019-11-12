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
 

//================================================================================================
//==================					  ROTAS DE EVENTO 						==================
//================================================================================================
Route::get('eventos', 'ControllerEvento@index')->name('evento.index');
Route::get('eventos/visualizar/{id}', 'ControllerEvento@show')->name('evento.ver');
Route::get('evento/criar', 'ControllerEvento@create')->name('evento.criar');
Route::post('evento/salvar', 'ControllerEvento@store')->name('evento.salvar');
Route::get('evento/{id}/editar', 'ControllerEvento@edit')->name('evento.editar');
Route::post('evento/{id}/atualizar', 'ControllerEvento@update')->name('evento.atualizar');
Route::get('evento/{id}/deletar', 'ControllerEvento@destroy')->name('evento.deletar');


//================================================================================================
//==================					  ROTAS DE NOTICIA 						==================
//================================================================================================
Route::get('noticias', 'NoticiaController@index')->name('noticia.index');
Route::get('noticia/{id}/ler', 'NoticiaController@show')->name('noticia.ler');
Route::get('noticia/criar', 'NoticiaController@create')->name('noticia.criar');
Route::post('noticia/salvar', 'NoticiaController@store')->name('noticia.salvar');
Route::get('noticia/{id}/editar', 'NoticiaController@edit')->name('noticia.editar');
Route::get('noticia/{id}/deletar', 'NoticiaController@destroy')->name('noticia.deletar');
Route::post('noticia/{id}/atualizar', 'NoticiaController@update')->name('noticia.atualizar');

//================================================================================================
//==================				 ROTAS DE CADASTRO ALUNO  					==================
//================================================================================================
Route::get('egresso', 'EgressoController@index')->name('egresso.index');
Route::get('egresso/criar', 'EgressoController@create')->name('egresso.criar');
Route::get('egresso/{cpf}/editar', 'EgressoController@edit')->name('egresso.editar');
Route::post('egresso/salvar', 'EgressoController@store')->name('egresso.salvar');
Route::post('egresso/atualizar', 'EgressoController@update')->name('egresso.atualizar');
Route::get('egresso/{cpf}/deletar', 'EgressoController@destroy')->name('egresso.deletar');

//================================================================================================
//==================					 ROTAS DE CAMPUS  						==================
//================================================================================================
Route::get('curso', 'CursosController@index')->name('curso.index');
Route::get('curso/criar', 'CursosController@create')->name('curso.criar');
Route::get('curso/deletar/{id}', 'CursosController@destroy')->name('curso.apagar');
Route::post('curso/salvar', 'CursosController@store')->name('curso.salvar');

//================================================================================================
//==================					 ROTAS DE QUESTIONARIO  				==================
//================================================================================================
Route::get('questionario', 'QuestionarioController@index')->name('questionario.index');
Route::get('questionario/criar', 'QuestionarioController@create')->name('questionario.criar');
Route::post('questionario/salvar', 'QuestionarioController@store')->name('questionario.salvar');
Route::get('questionario/{id}/editar', 'QuestionarioController@edit')->name('questionario.editar');

Route::get('questionario/pergunta/criar', 'PerguntaController@create')->name('pergunta.criar');



