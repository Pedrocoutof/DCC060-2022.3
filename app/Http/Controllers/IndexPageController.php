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
        DB::select("INSERT INTO `pessoas` (`id`, `nome`, `data_nascimento`) VALUES
('1', 'Bruna Goncalves Ferreira', '1984-08-12'),
('2', 'Estevan Lima Pereira', '1960-08-18'),
('3', 'Leila Pereira Martins', '1980-06-15'),
('4', 'Cauã Silva Correia', '2001-01-05'),
('5', 'Luiza Castro Martins', '1986-05-17'),
('6', 'Paulo Sousa Araujo', '1963-05-12'),
('7', 'Thiago Azevedo Martins', '1995-03-04'),
('8', 'Antônio Oliveira Souza', '1986-08-19'),
('9', 'Luana Carvalho Castro', '2000-09-30'),
('10', 'Matilde Costa Alves', '2001-03-15');
");

        DB::select("INSERT INTO `funcionario` (`id_pessoa`, `email`, `senha`, `salario`) VALUES
('8', 'antonio@gmail.com', '12345678', '1800'),
('1', 'bruna@gmail.com', '87654321', '2200');
");

        DB::select("INSERT INTO `clientes` (`id_pessoa`) VALUES ('2'),
('3'),
('4'),
('5'),
('6'),
('7'),
('8');
");

        DB::select("INSERT INTO `entregadores` (`id_pessoa`, `placa_veiculo`) VALUES
('9', 'PLCA456'),
('10', 'PL4C435');
");

        DB::select("INSERT INTO `endereco` (`id_pessoa`, `nome_cidade`, `rua`, `numero`) VALUES ('1', 'Bicas', 'Nilson Batista', '56'),
('2', 'Juiz de Fora', 'Rio Branco', '93'),
('3', 'Juiz de Fora', 'Itamar Franco', '452'),
('4', 'Juiz de Fora', 'Padre Cafe', '125'),
('5', 'Bicas', 'Antônio Anselmo de Barros', '23'),
('6', 'Juiz de Fora', 'Eduardo Gomes Baião', '65');
");

        DB::select("INSERT INTO `telefones`(`id_pessoa`, `numero`) VALUES
('2','32999999999'),
('3','32888888888'),
('3','32777777777'),
('4','32666666666'),
('5','32555555555'),
('6','32444444444'),
('7','32333333333'),
('7','32222222222'),
('8','32111111111');
");

        DB::select("INSERT INTO `transportadora`(`id`, `nome_transportadora`) VALUES
('1','Sedex'),
('2','Express');

");

        DB::select("INSERT INTO `transportadora_entregador`(`id_entregador`, `id_transportadora`) VALUES
('9','1'),
('9','2'),
('10','2');
");

        DB::select("INSERT INTO `produtos`(`id`, `nome`, `marca`, `categoria`, `modelo`, `descricao`, `preco_venda`, `quantidade_estoque`) VALUES
(1, 'Guitarra Elétrica', 'Fender', 'Guitarra', 'Stratocaster', 'Uma guitarra clássica de corpo sólido, cor preta', 1999.99, 10),
(2, 'Bateria', 'Yamaha', 'Percussão', 'DTX402K', 'Uma bateria eletrônica completa com prato crash, prato ride e bumbo', 1499.99, 5),
(3, 'Teclado', 'Casio', 'Teclado', 'CDP-120', 'Um teclado compacto com 88 teclas e recursos avançados de sons e ritmos', 699.99, 15),
(4, 'Violão', 'Taylor', 'Guitarra', '214ce DLX', 'Um violão de tampa maciça com captador elétrico e afinador incorporado', 2199.99, 8),
(5, 'Saxofone', 'Selmer', 'Metal', 'Paris Series II', 'Um saxofone de ouro lacado com boquilha de metal e case incluído', 2499.99, 2),
(6, 'Gaita', 'Hohner', 'Folclore', 'Marine Band', 'Uma gaita de boca clássica com reeds de metal e case incluído', 99.99, 20),
(7, 'Flauta Traversa', 'Yamaha', 'Madeira', 'YFL-221', 'Uma flauta traversa de madeira de granada com case incluído', 749.99, 3);
");

        DB::select("INSERT INTO `compras`(`id`, `id_produto`, `quantidade`, `valor`, `forma_pagamento`, `data_inicio_pagamento`, `data_final_pagamento`) VALUES
(1, 1, 2, 3999.98, 'parcelado', '2023-01-01', '2023-01-30'),
(2, 2, 1, 1499.99, 'parcelado', '2022-02-01', '2021-02-15'),
(3, 3, 3, 2099.97, 'à vista', '2021-03-01', null);
");

        DB::select("INSERT INTO `parcela_compra`(`id`, `id_compra`, `valor`, `data_pagamento`, `data_vencimento`) VALUES
                            (1,1,999.99,'2023-01-01','2023-01-08'),
                            (2,1,999.99,null,'2023-01-15'),
                            (3,1,999.99,null,'2023-01-22'),
                            (4,1,999.99,null,'2023-01-30'),
                            (5,2,499.99,'2022-02-01','2022-02-05'),
                            (6,2,499.99,'2022-02-05','2022-02-10'),
                            (7,2,499.99,'2022-02-10','2022-02-15');");

        DB::select("INSERT INTO `vendas`(`id`, `id_cliente`, `id_entrega`, `valor`, `forma_pagamento`, `data_inicio_pagamento`, `data_final_pagamento`) VALUES
                                                                                                                                        (1, 3, null, 3999.98, 'à vista', '2023-01-15', '2023-01-15'),
                                                                                                                                        (2, 5, null, 1499.99, 'parcelado', '2022-02-01', '2022-03-01'),
                                                                                                                                        (3, 6, null, 2099.97, 'à vista', '2021-03-01', '2021-03-01'),
                                                                                                                                        (4, 7, null, 5099.99, 'parcelado', '2023-01-01', '2023-02-28');");

        DB::select(" INSERT INTO `parcela_venda`(`id`, `id_venda`, `valor`, `data_pagamento`, `data_vencimento`) VALUES
                                                    (1,1,3999.98,'2023-01-15', '2023-01-15'),
                                                    (2,2,499.99,'2022-02-01', '2022-02-08'),
                                                    (3,2,499.99,'2022-02-08', '2022-02-15'),
                                                    (4,2,499.99,'2022-03-15', '2022-02-15'),
                                                    (5,3,2099.97,'2022-03-01', '2022-03-01'),
                                                    (6,4,1020.99,'2023-01-01', '2023-02-07'),
                                                    (7,4,1020.99,'2023-01-08', '2023-02-15'),
                                                    (8,4,1020.99,'2023-01-16', '2023-02-23'),
                                                    (9,4,1020.99,'2023-01-24', '2023-02-24'),
                                                    (10,4,1020.99,'2023-01-01', '2023-01-1');
");
        DB::select("INSERT INTO `entregas`(`id_venda`, `id_transportadora`, `id`, `valor_frete`, `data_entrega_prevista`, `entregue`) VALUES
                                (1, 1, 1, 30.50, '2023-01-22', true),
                                (2, 2, 2, 45.00, '2022-02-08', false);
");
        DB::select("INSERT INTO `venda_produto`(`id_venda`, `id_produto`) VALUES
                            (1, 1),
                            (1, 4),
                            (2, 2),
                            (3, 3),
                            (3, 7),
                            (3, 6),
                            (4, 3),
                            (4, 4),
                            (4, 5);
");

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
                    CREATE TABLE Pessoas (
                    id INTEGER NOT NULL,
                    nome varchar(255) NOT NULL,
                    data_nascimento date NOT NULL,
                     PRIMARY KEY (id) );");

        DB::select("CREATE TABLE Telefones (
                     id_pessoa INTEGER NOT NULL,
                    numero VARCHAR(14) NOT NULL,
                    FOREIGN KEY (id_pessoa) REFERENCES pessoas(id),
                    PRIMARY KEY (id_pessoa, numero));");

                    DB::select("CREATE TABLE Endereco
                    ( id_pessoa INTEGER NOT NULL,
                    nome_cidade varchar(25) NOT NULL,
                    rua varchar(50) NOT NULL,
                    numero integer NOT NULL,
                    FOREIGN KEY (id_pessoa) REFERENCES pessoas(id),
                    PRIMARY KEY (id_pessoa));");

                    DB::select("CREATE TABLE Funcionario (
                    id_pessoa INTEGER NOT NULL,
                    email varchar(255) NOT NULL,
                    senha varchar(255) NOT NULL,
                    salario decimal NOT NULL,
                    FOREIGN KEY (id_pessoa) REFERENCES pessoas(id),
                     PRIMARY KEY (id_pessoa)  );");

                    DB::select("CREATE TABLE Clientes (
                    id_pessoa INTEGER NOT NULL,
                    FOREIGN KEY (id_pessoa) REFERENCES pessoas(id),
                    PRIMARY KEY (id_pessoa));");

                    DB::select("CREATE TABLE Entregadores (
                    id_pessoa INTEGER NOT NULL,
                    placa_veiculo VARCHAR(7),
                    FOREIGN KEY (id_pessoa) REFERENCES pessoas(id),
                    PRIMARY KEY (id_pessoa));");

                    DB::select("CREATE TABLE Transportadora (
                    id INTEGER NOT NULL,
                    nome_transportadora VARCHAR(7),
                        PRIMARY KEY (id));");

                    DB::select("CREATE TABLE transportadora_entregador (
                    id_entregador INTEGER NOT NULL,
                    id_transportadora INTEGER NOT NULL,
                    FOREIGN KEY (id_entregador) REFERENCES entregadores(id_pessoa),
                    FOREIGN KEY (id_transportadora) REFERENCES transportadora(id),
                    PRIMARY KEY (id_entregador, id_transportadora));");

                    DB::select("CREATE TABLE Entregas (
                    id_venda INTEGER NOT NULL,
                    id_transportadora INTEGER NOT NULL,
                    id INTEGER NOT NULL,
                    valor_frete decimal DEFAULT 0,
                    data_entrega_prevista date,
                    entregue boolean DEFAULT false,
                    FOREIGN KEY (id_transportadora) REFERENCES transportadora(id),
                    PRIMARY KEY (id));");

                    DB::select("CREATE TABLE Vendas (
                    id INTEGER NOT NULL,
                    id_cliente INTEGER NOT NULL,
                    id_entrega INTEGER,
                    valor decimal,
                    forma_pagamento varchar(15),
                    data_inicio_pagamento date NOT NULL,
                    data_final_pagamento date,
                    FOREIGN KEY (id_cliente) REFERENCES clientes(id_pessoa),
                    FOREIGN KEY (id_entrega) REFERENCES entregas(id),
                    PRIMARY KEY (id));");

                    DB::select("ALTER TABLE entregas ADD CONSTRAINT id_vendas
                    FOREIGN KEY(id_venda) REFERENCES vendas(id);");

                    DB::select("CREATE TABLE parcela_venda (
                    id INTEGER NOT NULL,
                    id_venda INTEGER NOT NULL,
                    valor decimal,
                    data_pagamento date,
                    data_vencimento date NOT NULL,
                    FOREIGN KEY (id_venda) REFERENCES vendas(id),
                    PRIMARY KEY (id));");

                    DB::select("CREATE TABLE produtos (
                    id INTEGER NOT NULL,
                    nome varchar(25) NOT NULL,
                    marca varchar(50) NOT NULL,
                    categoria varchar(50) NOT NULL,
                    modelo varchar(50) NOT NULL,
                    descricao varchar(250) NOT NULL,
                    preco_venda DECIMAL NOT NULL,
                    quantidade_estoque INTEGER DEFAULT 0,
                    PRIMARY KEY (id));");

                    DB::select("CREATE TABLE venda_produto (
                    id_venda INTEGER NOT NULL,
                    id_produto INTEGER NOT NULL,
                    FOREIGN KEY (id_venda) REFERENCES vendas(id),
                    FOREIGN KEY (id_produto) REFERENCES produtos(id),
                    PRIMARY KEY (id_venda, id_produto));");

                    DB::select("CREATE TABLE Compras (
                    id INTEGER NOT NULL,
                    id_produto INTEGER NOT NULL,
                    quantidade INTEGER NOT NULL,
                    valor decimal,
                    forma_pagamento varchar(15),
                    data_inicio_pagamento date NOT NULL,
                    data_final_pagamento date,
                    FOREIGN KEY (id_produto) REFERENCES produtos(id),
                    PRIMARY KEY (id));");

                    DB::select("CREATE TABLE parcela_compra (
                    id INTEGER NOT NULL,
                    id_compra INTEGER NOT NULL,
                    valor decimal,
                    data_pagamento date,
                    data_vencimento date NOT NULL,
                    FOREIGN KEY (id_compra) REFERENCES compras(id),
                    PRIMARY KEY (id));");

        // endregion



        // region View

        DB::select("CREATE OR REPLACE VIEW clientes_entrega_nao_finalizadas AS
                            SELECT *
                            FROM pessoas
                            LEFT JOIN telefones
                            ON (pessoas.id = telefones.id_pessoa)
                            WHERE pessoas.id IN (
                                SELECT id_cliente
                                FROM vendas
                                INNER JOIN entregas
                                ON entregas.id_venda = vendas.id
                                WHERE entregas.entregue = false
                                )");

        DB::select("CREATE OR REPLACE VIEW baixo_estoque AS
                            SELECT nome, quantidade_estoque
                            FROM produtos
                            WHERE quantidade_estoque < 5;");

        //endregion

        // region Procedure
/*
        DB::select("DROP PROCEDURE IF EXISTS atualizaEstoqueVenda");
        DB::select("DROP PROCEDURE IF EXISTS atualizaEstoqueCompra");

        DB::select('
        CREATE DEFINER=`root`@`localhost` PROCEDURE `atualizaEstoqueVenda`()
        NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER UPDATE produtos
        SET quantidade = quantidade - (SELECT quantidade FROM vendas WHERE vendas.id_produto = produtos.id_produto)
        WHERE EXISTS (SELECT 1 FROM vendas WHERE vendas.id_produto = produtos.id_produto);'
        );


        DB::select('
        CREATE DEFINER=`root`@`localhost` PROCEDURE `atualizaEstoqueCompra`()
        NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER UPDATE produtos
        SET quantidade = quantidade + (SELECT quantidade FROM compras WHERE compras.id_produto = produtos.id_produto)
        WHERE EXISTS (SELECT 1 FROM compras WHERE compras.id_produto = produtos.id_produto);'
        );*/

        // endregion

        // region Trigger
/*
        DB::select("CREATE TRIGGER `triggerAtualizaEstoqueCompra` AFTER INSERT ON `compras` FOR EACH ROW CALL atualizaEstoqueCompra;");


        DB::select("CREATE TRIGGER `triggerAtualizaEstoqueVenda` AFTER INSERT ON `vendas` FOR EACH ROW CALL atualizaEstoqueVenda;");
*/
        // endregion

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
        DB::select("SET foreign_key_checks = 0;");
        DB::select("DROP VIEW clientes_entrega_nao_finalizadas");
        DB::select("DROP VIEW baixo_estoque");
        DB::select("
        DROP TABLE `clientes`, `compras`,
            `endereco`, `entregadores`,
            `entregas`, `funcionario`,
            `parcela_compra`, `parcela_venda`,
            `pessoas`, `produtos`, `telefones`,
            `transportadora`, `transportadora_entregador`,
            `vendas`, `venda_produto`;
        ");
        DB::select("SET foreign_key_checks = 1;");

        return redirect('/');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAllTables()
    {

        DB::select("DELETE FROM produtos");
        DB::select("DELETE FROM compras");
        DB::select("DELETE FROM parcela_compra");;
        DB::select("DELETE FROM parcela_vendas");
        DB::select("DELETE FROM clientes");
        DB::select("DELETE FROM usuarios");
        DB::select("DELETE FROM telefones");
        DB::select("DELETE FROM endereços");
        DB::select("DELETE FROM entregadores");
        DB::select("DELETE FROM transportadoras");
        DB::select("DELETE FROM usuarios");
        DB::select("DELETE FROM vendas");
        DB::select("DELETE FROM entregas");

        redirect("/");
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
