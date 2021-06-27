<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Venda;
use App\Models\EstatisticaProduto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();

        return view('produto.index', [
            'produtos' => $produtos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('produto.create');
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
        // dd($request->all());
        $produto = new Produto();
        
        $produto->nome = $request->nome;
        $produto->preco_venda = $request->preco_venda;
        $produto->descricao = $request->descricao;
        $produto->custo = $request->custo;
        $produto->estoque = $request->estoque;
        $produto->user_id = $request->user_id;

        $produto->save();
        
        return view('produto.create', [
            'msg' => 'Produto criado com sucesso'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $vendas = Venda::where('produto_id', $id)->get();

        $quantidadeDeProdutosVendidos = 0;
        $totalValorVendas = 0;
        $produto = Produto::find($id);

        foreach ($vendas as $venda) {
            $quantidadeDeProdutosVendidos += $venda->quantidade;
            $totalValorVendas += $venda->quantidade * $produto->preco_venda;
        }

        $totalCusto = $produto->custo * $quantidadeDeProdutosVendidos;

        // dd($quantidadeDeProdutosVendidos, $totalValorVendas, $totalCusto);
        // $produto = Produto::with(['estatistica', 'vendas'])->find($id);

        $estatisticasProduto = EstatisticaProduto::where('produto_id', $produto->id)->get();
        // $estatisticasProduto = EstatisticaProduto::all();

        if(!isset($estatisticasProduto[0])){
            $estatisticasProduto  = new EstatisticaProduto();
            
            $estatisticasProduto->produto_id = $produto->id;
            $estatisticasProduto->balanco =  $totalValorVendas - $totalCusto;
            $estatisticasProduto->ltv = 5;
            $estatisticasProduto->cac = 40;
            $estatisticasProduto->ticket_medio = $totalValorVendas / $quantidadeDeProdutosVendidos;
            $estatisticasProduto->ROI = 1.2;
            $estatisticasProduto->NPS = 7;
            $estatisticasProduto->taxa_convercao = 0.09;
            
            $estatisticasProduto->save();

        } else{
            $estatisticasProduto[0]->produto_id = $produto->id;
            $estatisticasProduto[0]->balanco =  $totalValorVendas - $totalCusto;
            $estatisticasProduto[0]->ltv = 5;
            $estatisticasProduto[0]->cac = 40;
            $estatisticasProduto[0]->ticket_medio = $totalValorVendas / $quantidadeDeProdutosVendidos;
            $estatisticasProduto[0]->ROI = 1.2;
            $estatisticasProduto[0]->NPS = 7;
            $estatisticasProduto[0]->taxa_convercao = 0.09;
            
            $estatisticasProduto[0]->save();
            

        }

        return view('produto.show', [
            'produto' => $produto
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $produto = Produto::find($id);
        return view('produto.edit', [
            'produto' => $produto
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $produto = Produto::find($id);
  
        $produto->nome = $request->nome;
        $produto->preco_venda = $request->preco_venda;
        $produto->descricao = $request->descricao;
        $produto->custo = $request->custo;
        $produto->estoque = $request->estoque;
        $produto->user_id = $request->user_id;

        $produto->save();

        return redirect()->route('produto.show', [
            'produto' => $produto->id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
        $produto->delete();
        return redirect()->route('produto.index');
    }
}
