<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 1fr;
            grid-gap: 15px 0;
            height: 70vh;
        }

        header {
            margin: 10px;
            grid-column: 1;
            grid-row: 1
        }

        nav {
            background-color: #edf2f7;
            grid-column: 1;
            grid-row: 3;
            overflow: auto;
        }

        h3{
            margin-top: 10px;
            margin-left: 10px;
        }
        p{
            margin-left: 25px;
        }

        @media only screen and (orientation: landscape) {
            .grid-container {
                grid-template-columns: 5fr 4fr;
                grid-template-rows: 1fr 1fr 1fr;
            }
            nav {
                grid-column: 2;
                grid-row: 1 / span 3;
            }
            footer {
                grid-row: 3;
            }
        }
    </style>
    <title>Trabalho BD</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Trabalho BD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/produto">Produtos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/compra">Compra</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/venda">Vendas</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/pessoas">Pessoas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/cliente">Clientes</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/funcionarios">Funcionarios</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/entregador">Entregadores</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!--
<form-inline>
    @csrf
    <div class="input-group mb-3 px-5 py-4">
        <input type="text" class="form-control" name="search" placeholder="Pesquisa" onsubmit="">
        <a href={{Request::url()}}/search?= type="submit" class="btn btn-primary">Pesquisar</a>
    </div>
</form-inline>
-->
<div class="card px-5 py-5">
    <div class="card-body">
        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
