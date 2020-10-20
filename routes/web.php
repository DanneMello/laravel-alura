<?php

#Criando rotas.

use Illuminate\Support\Facades\Auth;

Route::get('/series', 'SeriesController@index')
    ->name('listar_series');

Route::get('/series/criar', 'SeriesController@create')
    ->name('form_criar_serie')
    ->middleware('autenticador');

Route::post('/series/criar', 'SeriesController@store')
    ->middleware('autenticador'); // Rota para inserir série

Route::delete('/series/{id}', 'SeriesController@destroy')
    ->middleware('autenticador'); // Rota para remover série

Route::post('/series/{id}/editaNome', 'SeriesController@editaNome')
    ->middleware('autenticador'); // Rota para atualizar série

Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');

Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')
    ->middleware('autenticador');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrar', 'EntrarController@index');

Route::post('/entrar', 'EntrarController@entrar');

Route::get('/registrar', 'RegistroController@create');

Route::post('/registrar', 'RegistroController@store');

Route::get('/sair',
    function () {
        Auth::logout(); return redirect('/entrar');
    }
); // Faz logout


