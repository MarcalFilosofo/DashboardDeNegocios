<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Produto;

use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $vendas = Venda::with('produto')->get();
        $vendas = Venda::all();

        
        return view('venda.index', [
            'vendas' => $vendas
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
        $produtos = Produto::all();

        return view('venda.create', [
            'produtos' => $produtos
        ]);

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
        Venda::create($request->all());

        $produtos = Produto::all();

        return view('venda.create', [
            'msg' => "Venda cadastrada com sucesso",
            'produtos' => $produtos
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function show(Venda $venda)
    {
        //

        return view('venda.show', ['venda' => $venda]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function edit(Venda $venda)
    {
        //
        $produtos = Produto::all();

        return view('venda.edit', [
            'venda' => $venda,
            'produtos' => $produtos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venda $venda)
    {
        //

        $venda->update($request->all());
        $produtos = Produto::all();

        return redirect()->route('venda.edit', [
            'venda' => $venda,
            'produtos' => $produtos 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venda $venda)
    {
        //
        $venda->delete();
        return redirect()->route('venda.index');
    }
}
