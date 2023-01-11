<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Http\Requests\StoreVendaRequest;
use App\Http\Requests\UpdateVendaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request['inputSearch'] ?? "";

        if($search)
        {
            $query = DB::select('SELECT * FROM vendas
                                        WHERE valor LIKE "%'.$search.'%"');
        }
        else{
            $query = DB::select('SELECT * FROM vendas');
        }

        return view('venda.index')->with([
            "arrObj" => $query
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nome_clientes = DB::select("SELECT id_pessoa, nome
                                           FROM clientes INNER JOIN pessoas
                                           ON (clientes.id_pessoa = pessoas.id)");

        $produtos = DB::select("SELECT id, nome
                                FROM produtos");

        return view('venda.create', ['clientes' => $nome_clientes, "produtos" => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVendaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $quantidade = $request->quantidade;
        $id_cliente = $request->cliente[0];
        $id_venda = $request->id_venda;
        $produto = $request->produto[0];
        $valor = $request->valor;
        $forma_pagamento = $request->forma_pagamento;
        $data_inicio_pagamento = $request->data_inicio_pagamento;
        $data_final_pagamento = $request->data_final_pagamento;

        $quantidade_em_estoque = DB::select("SELECT quantidade_estoque
                                            FROM produtos
                                            WHERE id = ".$produto);

        DB::select("UPDATE produtos
                    SET quantidade_estoque = quantidade_estoque - ".$quantidade."
                    WHERE id = ". $produto);

        DB::select("INSERT INTO `vendas`(`id`, `id_cliente`,  `valor`, `forma_pagamento`, `data_inicio_pagamento`, `data_final_pagamento`) VALUES
                                            ('.$id_venda.','.$id_cliente.','.$valor.','.$forma_pagamento.','.$data_inicio_pagamento.', NULL)");

        return redirect('/');
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendaRequest  $request
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVendaRequest $request, Venda $venda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::select('DELETE FROM vendas WHERE id_venda = '. $id);
        return redirect("venda");
    }
}
