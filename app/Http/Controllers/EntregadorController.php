<?php

namespace App\Http\Controllers;

use App\Models\Entregador;
use App\Http\Requests\StoreEntregadorRequest;
use App\Http\Requests\UpdateEntregadorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntregadorController extends Controller
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
            $query = DB::select('SELECT * FROM entregadores
                                        WHERE nome_completo LIKE "%'.$search.'%"');
        }
        else{
            $query = DB::select('SELECT * FROM entregadores');
        }

        return view('entregador.index')->with([
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
     * @param  \App\Http\Requests\StoreEntregadorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntregadorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entregador  $entregador
     * @return \Illuminate\Http\Response
     */
    public function show(Entregador $entregador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entregador  $entregador
     * @return \Illuminate\Http\Response
     */
    public function edit(Entregador $entregador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEntregadorRequest  $request
     * @param  \App\Models\Entregador  $entregador
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEntregadorRequest $request, Entregador $entregador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entregador  $entregador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        DB::select('DELETE FROM entregadores WHERE id_entregador = '. $id);
        return redirect("entregadores");
    }
}
