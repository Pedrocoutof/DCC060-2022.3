@extends('components.base_html')
@section('content')

    <form action="/create_funcionario">
        @csrf
        <div class="row">
            <input type="number" class="form-control"  placeholder="ID" name="id" required>
            <input type="text" class="form-control"  placeholder="Nome completo" name="nome" required>
            <input type="date"class="form-control"  placeholder="Data nascimento" name="data_nascimento" required>
            <input type="number" class="form-control"  placeholder="salario" name="salario" required>
            <input type="email" class="form-control"  placeholder="email" name="email" required>
            <input type="password" class="form-control"  placeholder="senha" name="senha" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
    </form>

@endsection
