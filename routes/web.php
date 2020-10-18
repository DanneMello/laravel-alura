<?php
/*
|------------------
| Web Routes
|------------------
*/
#Criando rotas.
Route::get('/series', 'SeriesController@index')
    ->name('listar_series');
Route::get('/series/criar', 'SeriesController@create')
    ->name('form_criar_serie');

Route::post('/series/criar', 'SeriesController@store'); # Definindo rota para quanto for acessado via método post
Route::delete('/series/{id}', 'SeriesController@destroy'); # Remove série


