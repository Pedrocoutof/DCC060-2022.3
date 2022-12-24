@extends('components.base_html')
@section('content')
    <div class="grid-container">
        <header>
            <form action="">
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
            <p>SELECT * FROM produtos</p>
            <p>SELECT * FROM clientes</p>
        </nav>
    </div>



@endsection
