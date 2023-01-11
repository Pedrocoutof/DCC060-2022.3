@extends('components.base_html')
@section('content')

    <form action="/store_venda">
        @csrf
        <div class="row">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Selecione um cliente</label>
                <select class="form-control" id="exampleFormControlSelect1" name="cliente">
                    @foreach($clientes as $cliente)
                        <option>{{$cliente->id_pessoa}} - {{$cliente->nome}}</option>
                    @endforeach
                </select>
            </div>
            <input type="number" class="form-control"  placeholder="ID venda" name="id_venda" required>
            <input type="text" class="form-control"  placeholder="valor" name="valor" required>
            <select class="form-control" id="exampleFormControlSelect3" name="produto">
                @foreach($produtos as $produto)
                    <option>{{$produto->id}} - {{$produto->nome}}</option>
                @endforeach
            </select>
            <input type="number" class="form-control"  placeholder="quantidade" name="quantidade" required>

            <select class="form-control" id="exampleFormControlSelect2" name="forma_pagamento">
                <option>à vista</option>
                <option>parcelado</option>
            </select>

            <input type="date"class="form-control"  placeholder="Data inicio pagamento" name="data_inicio_pagamento" required>
            <input type="date"class="form-control"  placeholder="Data final pagamento" name="data_final_pagamento">
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
    </form>

@endsection
