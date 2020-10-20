<?php

#Criando rotas.
Route::get('/series', 'SeriesController@index')
    ->name('listar_series');
Route::get('/series/criar', 'SeriesController@create')
    ->name('form_criar_serie');

Route::post('/series/criar', 'SeriesController@store'); // Rota para inserir série
Route::delete('/series/{id}', 'SeriesController@destroy'); // Rota para remover série
Route::post('/series/{id}/editaNome', 'SeriesController@editaNome'); // Rota para atualizar série
Route::get('/series/{serieId}/temporadas', 'TemporadasController@index');

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir');

