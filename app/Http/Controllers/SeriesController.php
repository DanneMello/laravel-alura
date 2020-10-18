<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use Illuminate\Http\Request;
class SeriesController extends Controller
{
    public function index(Request $request) {
        $series = Serie::query()->orderby('nome')->get(); # Método hall, busca todos os registros inseridos no banco de dados
        $mensagem = $request->session()->get('mensagem');   # Buscando mensagem

        return view('series.index', compact('series', 'mensagem')); # Passando por parâmetro a mensagem
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create($request->all()); # Inserindo os dados no DB
        $request->session()->flash('mensagem', "Série {$serie->id} criada com sucesso {$serie->nome}");   # Definindo que existe uma mensagem nessa sessão.
        return redirect()->route('listar_series'); # Retornando usuário para lista
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id) ; # removendo série
        $request->session()->flash('mensagem', "Série removida com sucesso");   # Mensagem informativa
        return redirect()->route('listar_series'); # Retornando usuário para lista
    }
}
