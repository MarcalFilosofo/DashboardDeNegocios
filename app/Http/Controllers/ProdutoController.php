<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Venda;
use App\Models\EstatisticaProduto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


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
        
        $produto = Produto::find($id);
        $quantidadeProdutoVendido = Venda::selectRaw('SUM(quantidade) as quantidade')->where('produto_id', $id)->first();
        $horariosVenda = Venda::selectRaw('count(id) as quantidade_venda_media, hour(horario_venda) as horario_venda')->where('produto_id', $id)->groupByRaw('hour(horario_venda)')->orderBy('quantidade_venda_media', 'desc')->paginate(3);
        $margemLucro = $produto->preco_venda - $produto->custo;
        $faturamentoTotal = $quantidadeProdutoVendido->quantidade * $produto->preco_venda;
        $lucroTotal = $margemLucro * $quantidadeProdutoVendido->quantidade;


        if(isset($_GET['API'])){
            return response()->json([
                'produto' => $produto,
                'quantidadeProdutoVendido' => $quantidadeProdutoVendido->quantidade,
                'horariosVenda' => [
                    $horariosVenda[0],
                    $horariosVenda[1],
                    $horariosVenda[2],
                ],
                'margemLucro' => number_format($margemLucro, 2, '.', ''),
                'faturamentoTotal' => number_format($faturamentoTotal, 2, '.', ''),
                'lucroTotal' => number_format($lucroTotal, 2, '.', ''),
            ], 200);
        } else{
            return view('produto.show', [
                'produto' => $produto
            ]);
        }


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
