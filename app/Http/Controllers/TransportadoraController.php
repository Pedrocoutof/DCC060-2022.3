<?php

namespace App\Http\Controllers;

use App\Models\Transportadora;
use App\Http\Requests\StoreTransportadoraRequest;
use App\Http\Requests\UpdateTransportadoraRequest;
use Illuminate\Support\Facades\DB;

class TransportadoraController extends Controller
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
            $query = DB::select('SELECT * FROM transportadoras
                                        WHERE nome LIKE "%'.$search.'%"');
        }
        else{
            $query = DB::select('SELECT * FROM transportadoras');
        }

        return view('transportadora.index')->with([
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
     * @param  \App\Http\Requests\StoreTransportadoraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransportadoraRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transportadora  $transportadora
     * @return \Illuminate\Http\Response
     */
    public function show(Transportadora $transportadora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transportadora  $transportadora
     * @return \Illuminate\Http\Response
     */
    public function edit(Transportadora $transportadora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransportadoraRequest  $request
     * @param  \App\Models\Transportadora  $transportadora
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransportadoraRequest $request, Transportadora $transportadora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transportadora  $transportadora
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transportadora $transportadora)
    {
        //
    }
}
