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

        // Produtos
        DB::select("INSERT INTO `produtos` (`id_produto`, `nome`, `tipo`, `marca`, `valor_venda`, `modelo`, `categoria`, `descrição`) VALUES
                            (NULL, 'Violão Tagima Dallas', 'Corda', 'Tagima', '599.00', 'Dallas', 'Cordas', 'Violão de corda de aço.'),
                            (NULL, 'Violão Giannini GF1D', 'Folk', 'Giannini', '944.00', 'Folk eletro-acustico', 'Cordas', 'Tampo: Sapele\r\nFaixa e fundo: Sapele\r\nBraço: Nato\r\nEscala: Rosewood\r\nTrastes: 20 em Alpaca\r\nMarcação: Madrepérola artificial (escala) e bolinhas brancas (lateral)\r\nTarraxas: Blindadas cromadas, 3 + 3 com botões plásticos pretos\r\nCaptador(es): K-8100 para '),
                            (NULL, 'Guitarra Gibson Les Paul', 'Corda', 'Gibson', '17490.00', ' Les Paul Tribute', 'Cordas', 'A Les Paul Tribute incorporou a vibe, o toque e os tons das Les Paul tradicionais. Seu braço de perfil arredondado e seu corpo ultramoderno de peso reduzido proporcionam um incrível prazer ao tocar.');");

        // Clientes
        DB::select("INSERT INTO `clientes` (`id_cliente`, `nome_completo`, `data_nascimento`) VALUES
                            (NULL, 'Alice Ferreira', '2012-03-27'),
                            (NULL, 'Jorge Jesus', '2022-12-25'),
                            (NULL, 'Gabriel Barbosa Almeida', '1998-05-13'),
                            (NULL, 'Bruno Henrique Pinto', '1990-12-30'),
                            (NULL, 'Neymar Junior', '1986-12-30')");

        // Telefones
        DB::select("INSERT INTO `telefones` (`id_telefone`, `id_cliente`, `numero_telefone`) VALUES (NULL, '4', '272727272727')");

        // Compras
        DB::select("INSERT INTO `compras` (`id_compra`, `id_produto`, `quantidade`, `valor`, `data_inicio_pagamento`, `data_final_pagamento`, `forma_pagamento`) VALUES
                                (NULL, '1', '20', '299.00', '2022-12-01', '2022-12-01', 'a vista'),
                                (NULL, '2', '30', '350.99', '2022-12-01', '2023-04-01', 'parcelado')");

        // Enderecos
        DB::select("INSERT INTO `enderecos` (`id_cliente`, `rua`, `numero`, `cidade`, `logradouro`) VALUES
                                ('2', 'José Lourenço Kelmer', '100', 'Juiz de Fora', '-'),
                                ('4', 'Sgt. Carlos da Silva', '98', 'Bicas', 'Prédio')");

        // Entregadores
        DB::select("INSERT INTO `entregadores` (`id_entregador`, `nome_completo`, `placa_veiculo`) VALUES
                            (NULL, 'Andreas Pereira', 'FLPA-2021'),
                            (NULL, 'João Carlos da Silva', 'PCFD-2022');");

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
    public function dropAllTables()
    {
        /*
            DB::select('DROP TABLE telefones');
            DB::select('DROP TABLE enderecos');
            DB::select('DROP TABLE clientes');
            DB::select('DROP TABLE produtos');
            DB::select('DROP TABLE compras');
        */
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
