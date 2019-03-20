<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cadastrar', 'CadastrarController@index')->name('cadastrar');
Route::post('/armazena', 'CadastrarController@store')->name('armazena');
Route::post('/editar', 'CadastrarController@edit')->name('editar');
Route::get('/busca','BuscaController@index')->name('busca');
Route::get('/buscar','BuscaController@buscar')->name('buscar');
Route::get('/buscar2','BuscaController@buscar2')->name('buscar2');
Route::get('/edit/{id}','BuscaController@editar')->name('edit');
Route::get('/saida/{id}','SaidaController@index')->name('saida');
Route::post('/baixar', 'SaidaController@baixar')->name('baixar');
Route::get('/relatorio','RelatorioController@index')->name('relatorio');
Route::get('/buscarSaida','BuscaController@buscarSaida')->name('buscarSaida');
Route::get('/edit/saida/{id}','SaidaController@editar')->name('edit.saida');
Route::get('/remove/saida/{id}','SaidaController@remove')->name('remove.saida');
Route::post('/update','SaidaController@update')->name('update');
Route::get('/pdf','BuscaController@pdf')->name('pdf');

Route::get('/saidaRegistro','BuscaController@indexsaida')->name('saidaRegistro');

Route::get('/relatorioPDF','RelatorioController@createPDF')->name('relatorioPDF');