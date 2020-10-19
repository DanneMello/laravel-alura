<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use App\Temporada;
use Illuminate\Http\Request;
class SeriesController extends Controller
{
    public function index(Request $request) {
        $series = Serie::query()
            ->orderBy('nome')
            ->get(); // Método hall, busca todos os registros inseridos no banco de dados
            $mensagem = $request->session()->get('mensagem');   // Buscando mensagem

            return view('series.index', compact('series', 'mensagem')); // Passando por parâmetro a mensagem
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(
        SeriesFormRequest $request,
        CriadorDeSerie $criadorDeSerie
    ) {
        $serie = $criadorDeSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_por_temporada
        );

        $request->session()
            ->flash(
                'mensagem',
                "Série {$serie->id} e suas temporadas e episódios criados com sucesso {$serie->nome}"
            );  // Define uma serie

            return redirect()->route('listar_series'); // Retornando usuário para lista
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        $nomeSerie = $removedorDeSerie->removerSerie($request->id); // Remove a série através do id
        $request->session()
            ->flash(
                'mensagem',
                "Série $nomeSerie removida com sucesso"
            ); // Mensagem informativa
        return redirect()->route('listar_series'); // Retornando usuário para lista
    }
}
