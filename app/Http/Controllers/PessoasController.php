<?php

namespace App\Http\Controllers;

use App\Models\Pessoas;
use App\Http\Requests\StorePessoasRequest;
use App\Http\Requests\UpdatePessoasRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PessoasController extends Controller
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
            $query = DB::select('SELECT * FROM pessoas
                                        WHERE nome LIKE "%'.$search.'%"');
        }
        else{
            $query = DB::select('SELECT * FROM pessoas');
        }

        return view('pessoas.index')->with([
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
     * @param  \App\Http\Requests\StorePessoasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePessoasRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoas $pessoas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function edit(Pessoas $pessoas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePessoasRequest  $request
     * @param  \App\Models\Pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePessoasRequest $request, Pessoas $pessoas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pessoas  $pessoas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoas $pessoas)
    {
        //
    }
}
