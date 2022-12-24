<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexPageController extends Controller
{
    public function index(Request $request)
    {
        $inputSql = $request['inputSql'] ?? "";

        if($inputSql){
            return view('index')->with(
                [
                    'request' => $inputSql,
                    'response' => json_encode(DB::select($inputSql))
                ]
            );
        }

        return view('index')->with(
            [
                'request' => "ex. SELECT * FROM entregadores",
                'response' =>  '...'
            ]
        );

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function makeCharge(Request $request)
    {
        DB::select("INSERT INTO `clientes` (`id_cliente`, `nome_completo`, `data_nascimento`) VALUES
                            (NULL, 'Alice Ferreira', '2012-03-27'),
                            (NULL, 'Jorge Jesus', '2022-12-25'),
                            (NULL, 'Gabriel Barbosa Almeida', '1998-05-13'),
                            (NULL, 'Bruno Henrique Pinto', '1990-12-30'),
                            (NULL, 'Neymar Junior', '1986-12-30')");



        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createTables($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dropAllTables($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
