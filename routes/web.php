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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Com autentição

//Cliente
Route::group(['prefix'=>'cliente','where'=>['id'=>'[0-9]+']], function() {
	Route::get('', ['as'=>'cliente', 'uses'=>'ClienteController@index', 'middleware' => 'auth']);
	Route::get('novo', ['as'=>'cliente.create', 'uses'=>'ClienteController@create', 'middleware' => 'auth']);
	Route::post('store', ['as'=>'cliente.store', 'uses'=>'ClienteController@store', 'middleware' => 'auth']);
	Route::get('edit/{id}', ['as'=>'cliente.edit', 'uses'=>'ClienteController@edit', 'middleware' => 'auth']);
	Route::post('update/{id}', ['as'=>'cliente.update', 'uses'=>'ClienteController@update', 'middleware' => 'auth']);
	Route::get('destroy/{id}', ['as'=>'cliente.destroy', 'uses'=>'ClienteController@destroy', 'middleware' => 'auth']);
	Route::get('show/{id}', ['as'=>'cliente.show', 'uses'=>'ClienteController@show', 'middleware' => 'auth']);
});

//Projeto
Route::group(['prefix'=>'projeto','where'=>['id'=>'[0-9]+']], function() {
	Route::get('', ['as'=>'projeto', 'uses'=>'ProjetoController@index', 'middleware' => 'auth']);
	Route::get('novo', ['as'=>'projeto.create', 'uses'=>'ProjetoController@create', 'middleware' => 'auth']);
	Route::post('store', ['as'=>'projeto.store', 'uses'=>'ProjetoController@store', 'middleware' => 'auth']);
	Route::get('edit/{id}', ['as'=>'projeto.edit', 'uses'=>'ProjetoController@edit', 'middleware' => 'auth']);
	Route::post('update/{id}', ['as'=>'projeto.update', 'uses'=>'ProjetoController@update', 'middleware' => 'auth']);
	Route::get('destroy/{id}', ['as'=>'projeto.destroy', 'uses'=>'ProjetoController@destroy', 'middleware' => 'auth']);
	Route::get('show/{id}', ['as'=>'projeto.show', 'uses'=>'ProjetoController@show', 'middleware' => 'auth']);
});

//Tarefa
Route::group(['prefix'=>'tarefa','where'=>['id'=>'[0-9]+']], function() {
	Route::get('{projetoid}', ['as'=>'tarefa', 'uses'=>'TarefaController@index', 'middleware' => 'auth']);
	Route::get('novo/{projetoid}', ['as'=>'tarefa.create', 'uses'=>'TarefaController@create', 'middleware' => 'auth']);
	Route::post('store', ['as'=>'tarefa.store', 'uses'=>'TarefaController@store', 'middleware' => 'auth']);
	Route::get('edit/{id}', ['as'=>'tarefa.edit', 'uses'=>'TarefaController@edit', 'middleware' => 'auth']);
	Route::post('update/{id}', ['as'=>'tarefa.update', 'uses'=>'TarefaController@update', 'middleware' => 'auth']);
	Route::get('/tarefa/destroy/{id}', ['as'=>'tarefa.destroy', 'uses'=>'TarefaController@destroy', 'middleware' => 'auth']);
	Route::get('show/{id}', ['as'=>'tarefa.show', 'uses'=>'TarefaController@show', 'middleware' => 'auth']);
});