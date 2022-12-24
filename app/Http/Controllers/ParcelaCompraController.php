<?php

namespace App\Http\Controllers;

use App\Models\Parcela_compra;
use App\Http\Requests\StoreParcela_compraRequest;
use App\Http\Requests\UpdateParcela_compraRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParcelaCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request['inputSearch'] ?? "";

        //if($search)
        //{
        //    $query = DB::select('SELECT * FROM parcela_compras
        //                                WHERE parcela_compras LIKE "'.$search.'%"');
        //}
        //else{
            $query = DB::select('SELECT * FROM parcela_compras');
        //}

        return view('parcela_compra.index')->with([
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
     * @param  \App\Http\Requests\StoreParcela_compraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParcela_compraRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parcela_compra  $parcela_compra
     * @return \Illuminate\Http\Response
     */
    public function show(Parcela_compra $parcela_compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parcela_compra  $parcela_compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Parcela_compra $parcela_compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateParcela_compraRequest  $request
     * @param  \App\Models\Parcela_compra  $parcela_compra
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParcela_compraRequest $request, Parcela_compra $parcela_compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parcela_compra  $parcela_compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::select('DELETE FROM produtos WHERE id_produto = '. $id);
        return redirect("produto");
    }
}
