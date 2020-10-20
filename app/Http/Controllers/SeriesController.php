<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use Illuminate\Http\Request;
class SeriesController extends Controller
{
    public function index(Request $request) {
        $series = Serie::query()->orderby('nome')->get(); // Método hall, busca todos os registros inseridos no banco de dados
        $mensagem = $request->session()->get('mensagem');   // Buscando mensagem

        return view('series.index', compact('series', 'mensagem')); // Passando por parâmetro a mensagem
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create(['nome' => $request->nome]); // Insere a serie no banco
        $qtdTemporadas = $request->qtd_temporadas; // Pega número de temporadas

        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]); // $i incrementa o número de temporas

            for($j = 1; $j <= $request->ep_por_temporada; $j++) {
                $temporada->episodios()->create(['numero' => $j]);
            }
        }

        $request->session()
            ->flash(
                'mensagem',
                "Série {$serie->id} e seus episódios foi criada com sucesso {$serie->nome}"
            );   // Define uma serie

        return redirect()->route('listar_series'); // Retornando usuário para lista
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id) ; // removendo série
        $request->session()->flash('mensagem', "Série removida com sucesso");   // Mensagem informativa
        return redirect()->route('listar_series'); // Retornando usuário para lista
    }

    public function editaNome($id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome; // Nome da série é o novo nome
        $serie->save(); // Depois de atualizado, a série será salva
    }


}
