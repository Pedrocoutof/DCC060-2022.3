<?php

namespace App\Http\Controllers;

use App\Models\Parcela_venda;
use App\Http\Requests\StoreParcela_vendaRequest;
use App\Http\Requests\UpdateParcela_vendaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParcelaVendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = $request['inputSearch'] ?? "";

        //if($search)
        //{
        //    $query = DB::select('SELECT * FROM parcela_compras
        //                                WHERE parcela_compras LIKE "'.$search.'%"');
        //}
        //else{
        $query = DB::select('SELECT * FROM parcela_vendas');
        //}

        return view('parcela_venda.index')->with([
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreParcela_vendaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParcela_vendaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parcela_venda  $parcela_venda
     * @return \Illuminate\Http\Response
     */
    public function show(Parcela_venda $parcela_venda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parcela_venda  $parcela_venda
     * @return \Illuminate\Http\Response
     */
    public function edit(Parcela_venda $parcela_venda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParcela_vendaRequest  $request
     * @param  \App\Models\Parcela_venda  $parcela_venda
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParcela_vendaRequest $request, Parcela_venda $parcela_venda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parcela_venda  $parcela_venda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::select('DELETE FROM parcela_vendas WHERE id_venda = '. $id);
        return redirect("parcela_venda");
    }
}
