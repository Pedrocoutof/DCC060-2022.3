@extends('components.base_html')
@section('content')
    <div class="grid-container">

        <header>

            <a class="btn btn-danger" href="dropAllTables"> Drop tabelas </a>
            <a class="btn btn-success" href="createTables"> Criar tabelas </a>
            <a class="btn btn-warning" href="carga"> Realizar carga </a>

            <form action="" class="py-4">
                <div class="form-group">
                    <textarea name="inputSql" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$request}}</textarea>
                </div>
                <button class="btn btn-primary"> Consultar </button>
            </form>

            <div class=" py-4"></div>
            <div class="form-floating">
                <textarea disabled class="form-control" id="floatingTextarea2" style="height: 100px">{{$response}}</textarea>
                <label for="floatingTextarea2">Output</label>
            </div>
        </header>

        <nav>
            <h2>Testes e comandos prontos:</h2>
            <hr>
            <p>SELECT nome
                FROM pessoas
            </p>
            <hr>
            <p>SELECT nome
                FROM pessoas
                WHERE id NOT IN (
                SELECT clientes.id_pessoa
                FROM clientes
                INNER JOIN telefones
                ON clientes.id_pessoa = telefones.id_pessoa
                )
            </p>
            <hr>
            <p>SELECT COUNT(*) AS n_entregadores
                FROM transportadora_entregador
                INNER JOIN transportadora
                ON (transportadora_entregador.id_transportadora = transportadora.id)
                WHERE transportadora.nome_transportadora = "Sedex"
            </p>
            <hr>
            <p>SELECT nome
                FROM pessoas
                LEFT JOIN endereco
                ON endereco.id_pessoa = pessoas.id
                WHERE id_pessoa IS NULL
            </p>
            <hr>
            <p>SELECT *
                FROM parcela_compra
                WHERE data_pagamento IS NULL
            </p>
            <hr>
            <p>SELECT *
                FROM entregas
                WHERE entregue = false AND DATEDIFF(data_entrega_prevista, CURRENT_DATE) / 365 < 0
            </p>
            <hr>
            <p>SELECT entregadores.id_pessoa
                FROM entregadores
                INNER JOIN transportadora_entregador
                ON entregadores.id_pessoa = transportadora_entregador.id_entregador
                INNER JOIN transportadora
                ON transportadora_entregador.id_transportadora = transportadora.id
                WHERE Transportadora.nome_transportadora = "Express";
            </p>
            <hr>
            <p>SELECT id_pessoa
                FROM entregadores
                WHERE NOT EXISTS (
                SELECT *
                FROM Transportadora
                WHERE NOT EXISTS (
                SELECT *
                FROM transportadora_entregador
                WHERE transportadora_entregador.id_entregador = Entregadores.id_pessoa
                AND transportadora_entregador.id_transportadora = Transportadora.id
                )
                );
            </p>
            <hr>
            <p>SELECT AVG(salario)
                FROM funcionario
            </p>
            <hr>
            <p>SELECT nome, CAST(DATEDIFF(CURRENT_DATE, data_nascimento) / 365 AS integer) AS idade_arredondada
                FROM pessoas
                INNER JOIN funcionario
                ON (pessoas.id = funcionario.id_pessoa)
            </p>
            <hr>
            <p>SELECT AVG(CAST(DATEDIFF(CURRENT_DATE, data_nascimento) / 365 AS integer)) AS media_idade
                FROM pessoas
                INNER JOIN clientes
                ON (pessoas.id = clientes.id_pessoa)
            </p>
            <hr>
            <p>SELECT *
                FROM pessoas
                WHERE CAST(DATEDIFF(CURRENT_DATE, data_nascimento) / 365 AS integer) > (SELECT AVG(CAST(DATEDIFF(CURRENT_DATE, data_nascimento) / 365 AS integer))
                FROM pessoas
                INNER JOIN clientes
                ON (pessoas.id = clientes.id_pessoa))
            </p>
            <hr>
            <p>SELECT SUM(valor)
                FROM parcela_compra
                WHERE data_pagamento IS NULL
            </p>
            <hr>
            <p>SELECT nome
                FROM pessoas
                WHERE id IN (
                SELECT id_pessoa
                FROM clientes
                LEFT JOIN vendas
                ON clientes.id_pessoa = vendas.id_cliente
                WHERE vendas.id_cliente IS NULL
                )
            </p>
            <hr>
            <p>SELECT nome
                FROM pessoas
                INNER JOIN clientes
                ON clientes.id_pessoa = pessoas.id
                WHERE pessoas.id IN (SELECT vendas.id_cliente
                FROM vendas
                WHERE vendas.forma_pagamento = "à vista")

            </p>
            <hr>
            <h1>Views</h1>
            <hr>
            <p>SELECT * FROM baixo_estoque</p>
            <hr>
            <p>SELECT * FROM clientes_entrega_nao_finalizadas </p>
        </nav>
    </div>



@endsection
