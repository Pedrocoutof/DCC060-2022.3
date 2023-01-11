<?php

namespace App\Http\Controllers;

use App\Models\Funcionarios;
use App\Http\Requests\StoreFuncionariosRequest;
use App\Http\Requests\UpdateFuncionariosRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionariosController extends Controller
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
            $query = DB::select('SELECT * FROM funcionario
                                       INNER JOIN pessoas
                                       ON (id_pessoa = id)
                                        WHERE nome LIKE "%'.$search.'%"');
        }
        else{
            $query = DB::select('SELECT * FROM funcionario
                                       INNER JOIN pessoas
                                       ON id_pessoa = id');
        }

        return view('funcionarios.index')->with([
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
        return view('funcionarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFuncionariosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::select("INSERT INTO pessoas VALUES
                        (".$request->id.",'".$request->nome."','".$request->data_nascimento."' )");

        DB::select("INSERT INTO funcionario VALUES
                            (".$request->id.",'".$request->email."','".$request->senha."',".$request->salario.")");

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funcionarios  $funcionarios
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionarios $funcionarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Funcionarios  $funcionarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionarios $funcionarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFuncionariosRequest  $request
     * @param  \App\Models\Funcionarios  $funcionarios
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFuncionariosRequest $request, Funcionarios $funcionarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funcionarios  $funcionarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionarios $funcionarios)
    {
        //
    }
}
