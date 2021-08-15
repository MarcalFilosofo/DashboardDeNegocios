<?php

namespace App\Http\Controllers;

use App\Models\Estatistica;
use App\Models\Venda;
use App\Models\Produto;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EstatisticaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quantidade = $_GET['quantidade'] ?? 5;
        $quantidade = $quantidade == "" || $quantidade == 'null' ? 5 : $quantidade;

        $produtosMaisVendidos = Venda::
            selectRaw('SUM(quantidade) as quantidade_vendas, produto_id')
            ->groupBy('produto_id')
            ->orderBy('quantidade_vendas', 'DESC')
            ->limit($quantidade)
            ->get();

        $produtos = array();
        foreach($produtosMaisVendidos as $vendas){
            array_push($produtos, array(
                'quantidadeVendas' => $vendas->quantidade_vendas,
                'produto' => $vendas->produto->nome,
                'lucro' => $vendas->quantidade_vendas * ($vendas->produto->preco_venda - $vendas->produto->custo),
                'faturamento' => $vendas->quantidade_vendas * $vendas->produto->preco_venda,
            ));
        }

        $quantidadeVendas = Venda::
            selectRaw('SUM(quantidade) as quantidade_vendas, produto_id')->groupBy('produto_id')->get();

        // $produtoMaisVendoPorHora = Venda::
        //     selectRaw('hour(horario_venda) AS horario_venda')->groupByRaw('hour(horario_venda)')->orderBy('horario_venda')->get();
        $produtosMaisVendoPorHora = array();
        for ($i=0; $i <= 23 ; $i++) { 
            $produtoHora = Venda::
                select('produto_id', DB::raw('SUM(quantidade) as quantidade'))
                ->groupBy('produto_id')
                ->whereRaw("hour(horario_venda) = $i")
                ->orderByDesc('quantidade')
                ->first();
            
            if($produtoHora == null){
                array_push($produtosMaisVendoPorHora, array(
                    'produto' => "Sem vendas",
                    'quantidade' => "0"
                ));
            }else{
                array_push($produtosMaisVendoPorHora, array(
                    'produto' => $produtoHora->produto->nome,
                    'quantidade' => $produtoHora->quantidade
                ));
            }
        }
        
        $somatorioValorVendas = 0;
        $totalVendas = 0;
        foreach ($quantidadeVendas as $quantidade){
            $somatorioValorVendas += $quantidade->produto->preco_venda * $quantidade->quantidade_vendas;
            $totalVendas += $quantidade->quantidade_vendas;
        }

        $produtosCadastrados = Produto::count('id');
        $mediaNps = Produto::avg('nps');

        return response()->json([
            'produtosMaisVendoPorHora' => $produtosMaisVendoPorHora,
            'mediaNps' => $mediaNps,
            'produtosCadastrados' => $produtosCadastrados,
            'somatorioValorVendas' => $somatorioValorVendas,
            'totalVendas' => $totalVendas,
            'produtos' => $produtos
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estatistica  $estatistica
     * @return \Illuminate\Http\Response
     */
    public function show(Estatistica $estatistica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estatistica  $estatistica
     * @return \Illuminate\Http\Response
     */
    public function edit(Estatistica $estatistica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estatistica  $estatistica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estatistica $estatistica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estatistica  $estatistica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estatistica $estatistica)
    {
        //
    }
}
