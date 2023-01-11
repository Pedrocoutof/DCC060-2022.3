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
        </tr>
        </thead>
        <tbody>

        @foreach($arrObj as $obj)
        <tr>
            @foreach($headerTitles as $headerTitle)
                <td>{{$obj->$headerTitle}}</td>
            @endforeach
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection
