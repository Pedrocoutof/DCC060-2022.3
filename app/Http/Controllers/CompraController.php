<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Http\Requests\StoreCompraRequest;
use App\Http\Requests\UpdateCompraRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = $request['inputSearch'] ?? "";

        if($search)
        {
            $query = DB::select('SELECT * FROM compras
                                        WHERE nome LIKE "'.$search.'%"');
        }
        else{
            $query = DB::select('SELECT * FROM compras');
        }

        return view('compra.index')->with([
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
        $produtos = DB::select("SELECT nome, id
                                      FROM produtos");

        return view('compra.create', ['produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::select("UPDATE produtos
                    SET quantidade_estoque = quantidade_estoque + ". $request->quantidade."
                    WHERE id = ".$request->produto[0]);

        DB::select("INSERT INTO `compras`(`id`, `id_produto`, `quantidade`, `valor`, `forma_pagamento`, `data_inicio_pagamento`) VALUES
                                            (".$request->id_compra.",".$request->produto[0].",".$request->quantidade.",".$request->valor.",'".$request->forma_pagamento."','".$request->data_inicio_pagamento."')");

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompraRequest  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompraRequest $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::select('DELETE FROM compras WHERE id_compra = '. $id);
        return redirect("compra");
    }
}
