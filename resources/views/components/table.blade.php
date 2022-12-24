@extends('components.base_html')
@section('content')

    <form class="form-inline" action="">
        <div class="form-group py-2">
            <input name="inputSearch" class="form-control" id="exampleFormControlTextarea1" rows="3"></input>
        </div>
        <button class="btn btn-primary"> Pesquisar </button>
    </form>



    <table class="table">
        <thead>
        <tr>
            @foreach($headerTitles as $headerTitle)
                <th scope="col">{{$headerTitle}}</th>
            @endforeach
            <th>
                Opcoes
            </th>
        </tr>
        </thead>
        <tbody>

        @foreach($arrObj as $obj)
        <tr>
            @foreach($headerTitles as $headerTitle)
                <td>{{$obj->$headerTitle}}</td>
            @endforeach

            <td>
                <a type="button" class="btn btn-primary" href="{{$typeObj}}/{{$obj->$namePrimaryKey}}/visualizar"><i>Visualizar</i></a>
                <a type="button" class="btn btn-warning" href="{{$typeObj}}/{{$obj->$namePrimaryKey}}/editar"><i>Editar</i></a>
                <a type="button" class="btn btn-danger" href="{{$typeObj}}/{{$obj->$namePrimaryKey}}/deletar"><i>Deletar</i></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection
