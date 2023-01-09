<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexPageController extends Controller
{
    public function index(Request $request)
    {
        $inputSql = $request['inputSql'] ?? "";

        if ($inputSql) {
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
                'response' => '...'
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function makeCharge(Request $request)
    {

        // Produtos
        DB::select("INSERT INTO `produtos` (`id_produto`, `nome`, `tipo`, `marca`, `valor_venda`, `modelo`, `categoria`, `descrição`) VALUES
                            (1, 'Violão Tagima Dallas', 'Corda', 'Tagima', '599.00', 'Dallas', 'Cordas', 'Violão de corda de aço.'),
                            (2, 'Violão Giannini GF1D', 'Folk', 'Giannini', '944.00', 'Folk eletro-acustico', 'Cordas', 'Tampo: Sapele\r\nFaixa e fundo: Sapele\r\nBraço: Nato\r\nEscala: Rosewood\r\nTrastes: 20 em Alpaca\r\nMarcação: Madrepérola artificial (escala) e bolinhas brancas (lateral)\r\nTarraxas: Blindadas cromadas, 3 + 3 com botões plásticos pretos\r\nCaptador(es): K-8100 para '),
                            (3, 'Guitarra Gibson Les Paul', 'Corda', 'Gibson', '17490.00', ' Les Paul Tribute', 'Cordas', 'A Les Paul Tribute incorporou a vibe, o toque e os tons das Les Paul tradicionais. Seu braço de perfil arredondado e seu corpo ultramoderno de peso reduzido proporcionam um incrível prazer ao tocar.');");

        // Clientes
        DB::select("INSERT INTO `clientes` (`id_cliente`, `nome_completo`, `data_nascimento`) VALUES
                            (1, 'Alice Ferreira', '2012-03-27'),
                            (2, 'Jorge Jesus', '2022-12-25'),
                            (3, 'Gabriel Barbosa Almeida', '1998-05-13'),
                            (4, 'Bruno Henrique Pinto', '1990-12-30'),
                            (5, 'Neymar Junior', '1986-12-30')");

        // Telefones
        DB::select("INSERT INTO `telefones` (`id_telefone`, `id_cliente`, `numero_telefone`) VALUES (1, '4', '272727272727')");

        // Compras
        DB::select("INSERT INTO `compras` (`id_compra`, `id_produto`, `quantidade`, `valor`, `data_inicio_pagamento`, `data_final_pagamento`, `forma_pagamento`) VALUES
                                (1, '1', '20', '299.00', '2022-12-01', '2022-12-01', 'a vista'),
                                (2, '2', '30', '350.99', '2022-12-01', '2023-04-01', 'parcelado')");

        // Enderecos
        DB::select("INSERT INTO `enderecos` (`id_cliente`, `rua`, `numero`, `cidade`, `logradouro`) VALUES
                                ('2', 'José Lourenço Kelmer', '100', 'Juiz de Fora', '-'),
                                ('4', 'Sgt. Carlos da Silva', '98', 'Bicas', 'Prédio')");

        // Entregadores
        DB::select("INSERT INTO `entregadores` (`id_entregador`, `nome_completo`, `placa_veiculo`) VALUES
                            (1, 'Andreas Pereira', 'FLPA-2021'),
                            (2, 'João Carlos da Silva', 'PCFD-2022');");

        // Parcela compras
        DB::select("INSERT INTO `parcela_compras` (`id_parcela`, `id_compra`, `pago`, `valor`, `data_pagamento`, `data_vencimento`) VALUES
                                                                                                    ('1', '2', '1', '116,6', '2023-01-08', '2023-01-16'),
                                                                                                    ('2', '2', '1', '116,6', '2023-02-08', '2023-02-14'),
                                                                                                    ('3', '2', '0', '116,6', '', '');");

        // Transportadoras
        DB::select("INSERT INTO `transportadoras` (`id_transportadora`, `nome_transportadora`) VALUES
                                                                               ('1', 'Sedex'),
                                                                               ('2', 'Entregas Pereira'),
                                                                               ('3', 'Expresso');");

        // Usuarios
        DB::select("INSERT INTO `usuarios` (`id_usuario`, `email`, `senha`) VALUES
                                                            ('1', 'pedrohenrique@gmail.com', 'ph123456'),
                                                            ('2', 'marcusvinicius@gmail.com', '12345678'),
                                                               ('3', 'pedrocouto@gmail.com', 'couto123');");

        // Vendas
        DB::select("INSERT INTO `vendas` (`id_venda`, `id_cliente`, `id_entrega`, `valor`, `forma_pagamento`, `data_inicio_pagamento`, `data_final_pagamento`) VALUES
                        ('1', '3', '', '500', 'à vista', '', ''),
                        ('2', '2', '1', '699,59', 'parcelado', '2023-01-08', '2023-04-30');");

        // Entregas
        DB::select("INSERT INTO `entregas` (`id_venda`, `id_transportadora`, `codigo`, `valor_frete`, `data_entrega_prevista`, `entregue`) VALUES
                                                ('2', '2', '1', '19,90', '2023-01-25', '0'),
                                                ('1', '1', '2', '0', '2023-01-11', '1');");

        // Parcela vendas
        DB::select("INSERT INTO `parcela_vendas` (`id_parcela`, `id_venda`, `pago`, `valor`, `data_pagamento`, `data_vencimento`) VALUES
                                                    ('1', '2', '0', '299,00', '2023-01-08', '2023-01-17'),
                                                    ('2', '2', '0', '400', '2023-02-08', '2023-02-17');");

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function createTables()
    {
        // region Create
        DB::select("
                CREATE TABLE `clientes` (
                `id_cliente` bigint(20) UNSIGNED NOT NULL,
                `nome_completo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                `data_nascimento` date NOT NULL
                )
            ");

        DB::select("CREATE TABLE `compras` (
                      `id_compra` bigint(20) UNSIGNED NOT NULL,
                      `id_produto` bigint(20) UNSIGNED NOT NULL,
                      `quantidade` int(11) NOT NULL,
                      `valor` decimal(8,2) NOT NULL,
                      `data_inicio_pagamento` date NOT NULL,
                      `data_final_pagamento` date NOT NULL,
                      `forma_pagamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
                )");

        DB::select("CREATE TABLE `enderecos` (
                  `id_cliente` bigint(20) UNSIGNED NOT NULL,
                  `rua` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                  `numero` int(11) NOT NULL,
                  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                  `logradouro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
                )");

        DB::select("CREATE TABLE `entregadores` (
                  `id_entregador` bigint(20) UNSIGNED NOT NULL,
                  `nome_completo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                  `placa_veiculo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
)");

        DB::select("CREATE TABLE `entregas` (
                          `id_venda` bigint(20) UNSIGNED NOT NULL,
                          `id_transportadora` bigint(20) UNSIGNED NOT NULL,
                          `codigo` int(11) NOT NULL,
                          `valor_frete` decimal(8,2) NOT NULL,
                          `data_entrega_prevista` date NOT NULL,
                          `entregue` tinyint(1) NOT NULL
)");

        DB::select("CREATE TABLE `parcela_compras` (
                          `id_parcela` bigint(20) UNSIGNED NOT NULL,
                          `id_compra` bigint(20) UNSIGNED NOT NULL,
                          `pago` tinyint(1) NOT NULL DEFAULT 0,
                          `valor` decimal(8,2) NOT NULL,
                          `data_pagamento` date NOT NULL,
                          `data_vencimento` date NOT NULL
)");

        DB::select("CREATE TABLE `parcela_vendas` (
                  `id_parcela` bigint(20) UNSIGNED NOT NULL,
                  `id_venda` bigint(20) UNSIGNED NOT NULL,
                  `pago` tinyint(1) NOT NULL DEFAULT 0,
                  `valor` decimal(8,2) NOT NULL,
                  `data_pagamento` date NOT NULL,
                  `data_vencimento` date NOT NULL
                )");

        DB::select("CREATE TABLE `produtos` (
                      `id_produto` bigint(20) UNSIGNED NOT NULL,
                      `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                      `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                      `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                      `quantidade` int(11) NOT NULL DEFAULT 0,
                      `valor_venda` decimal(8,2) NOT NULL,
                      `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                      `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                      `descrição` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ");

        DB::select("CREATE TABLE `telefones` (
                      `id_telefone` bigint(20) UNSIGNED NOT NULL,
                      `id_cliente` bigint(20) UNSIGNED NOT NULL,
                      `numero_telefone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
            )");

        DB::select("CREATE TABLE `trabalha_em` (
                      `id_transportadora` bigint(20) UNSIGNED NOT NULL,
                      `id_entregador` bigint(20) UNSIGNED NOT NULL
            )");

        DB::select("CREATE TABLE `transportadoras` (
              `id_transportadora` bigint(20) UNSIGNED NOT NULL,
              `nome_transportadora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ");

        DB::select("CREATE TABLE `usuarios` (
              `id_usuario` bigint(20) UNSIGNED NOT NULL,
              `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
              `senha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
)");

        DB::select("CREATE TABLE `vendas` (
              `id_venda` bigint(20) UNSIGNED NOT NULL,
              `id_cliente` bigint(20) UNSIGNED NOT NULL,
              `id_entrega` bigint(20) UNSIGNED NOT NULL,
              `valor` decimal(8,2) NOT NULL,
              `forma_pagamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
              `data_inicio_pagamento` date NOT NULL,
              `data_final_pagamento` date NOT NULL
)");

        DB::select("CREATE TABLE `venda_produtos` (
              `id_venda` bigint(20) UNSIGNED NOT NULL,
              `id_produto` bigint(20) UNSIGNED NOT NULL
)");
    // endregion

        // region Alters

        DB::select("ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);
");
        DB::select("ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `compras_id_produto_foreign` (`id_produto`);");
        DB::select("ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id_cliente`);");
        DB::select("ALTER TABLE `entregadores`
  ADD PRIMARY KEY (`id_entregador`);");
        DB::select("ALTER TABLE `entregas`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `entregas_codigo_unique` (`codigo`),
  ADD KEY `entregas_id_transportadora_foreign` (`id_transportadora`);
");

        DB::select("ALTER TABLE `parcela_compras`
  ADD PRIMARY KEY (`id_parcela`),
  ADD KEY `parcela_compras_id_compra_foreign` (`id_compra`);");
        DB::select("ALTER TABLE `parcela_vendas`
  ADD PRIMARY KEY (`id_parcela`),
  ADD KEY `parcela_vendas_id_venda_foreign` (`id_venda`);");

        DB::select("ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);");

        DB::select("ALTER TABLE `telefones`
  ADD PRIMARY KEY (`id_telefone`),
  ADD UNIQUE KEY `telefones_numero_telefone_unique` (`numero_telefone`),
  ADD KEY `telefones_id_cliente_foreign` (`id_cliente`);
");
        DB::select("ALTER TABLE `trabalha_em`
  ADD KEY `trabalha_em_id_transportadora_foreign` (`id_transportadora`),
  ADD KEY `trabalha_em_id_entregador_foreign` (`id_entregador`);");

        DB::select("ALTER TABLE `transportadoras`
  ADD PRIMARY KEY (`id_transportadora`);
");
        DB::select("ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);");

        DB::select("ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `vendas_id_cliente_foreign` (`id_cliente`);");

        DB::select("ALTER TABLE `venda_produtos`
  ADD KEY `venda_produtos_id_venda_foreign` (`id_venda`),
  ADD KEY `venda_produtos_id_produto_foreign` (`id_produto`);");
// endregion

        // region FK

        DB::select("ALTER TABLE `compras`
  ADD CONSTRAINT `compras_id_produto_foreign` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`) ON UPDATE CASCADE;");

        DB::select("
ALTER TABLE `enderecos`
  ADD CONSTRAINT `enderecos_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);");

        DB::select("
ALTER TABLE `entregas`
  ADD CONSTRAINT `entregas_id_transportadora_foreign` FOREIGN KEY (`id_transportadora`) REFERENCES `transportadoras` (`id_transportadora`);");

        DB::select("
ALTER TABLE `parcela_compras`
  ADD CONSTRAINT `parcela_compras_id_compra_foreign` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE;");

        DB::select("
ALTER TABLE `parcela_vendas`
  ADD CONSTRAINT `parcela_vendas_id_venda_foreign` FOREIGN KEY (`id_venda`) REFERENCES `vendas` (`id_venda`) ON DELETE CASCADE ON UPDATE CASCADE;");

        DB::select("
ALTER TABLE `telefones`
  ADD CONSTRAINT `telefones_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;");

        DB::select("
ALTER TABLE `trabalha_em`
  ADD CONSTRAINT `trabalha_em_id_entregador_foreign` FOREIGN KEY (`id_entregador`) REFERENCES `entregadores` (`id_entregador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trabalha_em_id_transportadora_foreign` FOREIGN KEY (`id_transportadora`) REFERENCES `transportadoras` (`id_transportadora`) ON DELETE CASCADE ON UPDATE CASCADE;
");

        DB::select("
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);");

        DB::select("
ALTER TABLE `venda_produtos`
  ADD CONSTRAINT `venda_produtos_id_produto_foreign` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id_produto`),
  ADD CONSTRAINT `venda_produtos_id_venda_foreign` FOREIGN KEY (`id_venda`) REFERENCES `vendas` (`id_venda`);
");

        // endregion

        // region View

        DB::select("CREATE VIEW numero_clientes AS
            SELECT nome_completo, numero_telefone
            FROM clientes
            INNER JOIN telefones
            ON ( clientes.id_cliente = telefones.id_cliente )

");

        //endregion

        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function dropAllTables()
    {
        DB::select("
        DROP TABLE
            `enderecos`,
            `entregas`, `parcela_compras`,
            `parcela_vendas`,
            `telefones`, `trabalha_em`,
            `transportadoras`, `usuarios`,
            `venda_produtos`;
        ");

        DB::select("DROP TABLE `compras`, `entregadores`, `produtos`, `vendas`;");

        DB::select("DROP TABLE `clientes`");

        return redirect('/');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
