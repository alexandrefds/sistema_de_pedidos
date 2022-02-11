@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <a class="navbar-brand" href="{{ route('home') }}">PEDIDOS</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('request_closed')}}">PEDIDOS FECHADOS</a>
                                        </li>
                                        <a class="nav-link" href="{{route('menu_creater')}}">CRIAR CARDÁPIO</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('menu_delete')}}">EXCLUIR CARDÁPIO</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">SAIR</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div>
                                <p class="h3">Editando cardápio</p>
                            </div>
                            <br>
                            @php
                                $pratos = \App\Http\Controllers\MenuController::seenItem('prato');
                                $bebidas = \App\Http\Controllers\MenuController::seenItem('bebida');
                                $sobremesas = \App\Http\Controllers\MenuController::seenItem('sobremesa');
                                $extras = \App\Http\Controllers\MenuController::seenItem('extra');
                            @endphp
                            @foreach ($pratos as $prato)
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <p class="h5">Editar prato</p>
                                    </div>
                                    <div class="card-body" id="card">
                                        <form action="{{route('edit_menu.update_item', ['id' => $prato->id])}}" method="POST">
                                            @csrf
                                            <table class="table">
                                                <tr>
                                                    <th>Nome original</th>
                                                    <th>Preço original</th>
                                                    <th>Tipo original</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$prato->product_name}}</td>
                                                    <td>R$ {{$prato->product_price}}</td>
                                                    <td>{{$prato->product_type}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nome novo</th>
                                                    <th>Preço novo</th>
                                                    <th>Tipo Novo</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" id="product_item" name='product_name'>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="product_item" name='product_price' pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                                                         name="null">
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="product_type" name="product_type" value="Prato">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                            Prato
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="product_type" name="product_type" value="Bebida">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                            Bebida
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="product_type" name="product_type" value="Sobremesa">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                            Sobremesa
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="product_type" name="product_type" value="Extra">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                            Extra
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="container justify-content-center">
                                                <input type="submit" class="btn btn-primary" id="add_card" value="Salvar">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                            @foreach ($bebidas as $bebida)
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <p class="h5">Editar bebida</p>
                                    </div>
                                    <div class="card-body" id="card">
                                        <form action="{{route('edit_menu.update_item', ['id' => $bebida->id])}}" method="POST">
                                            @csrf
                                            <table class="table">
                                                <tr>
                                                    <th>Nome original</th>
                                                    <th>Preço original</th>
                                                    <th>Tipo original</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$bebida->product_name}}</td>
                                                    <td>R$ {{$bebida->product_price}}</td>
                                                    <td>{{$bebida->product_type}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nome novo</th>
                                                    <th>Preço novo</th>
                                                    <th>Tipo Novo</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" id="product_item" name='product_name'>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="product_item" name='product_price' pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                                                         name="null">
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="product_type" name="product_type" value="Prato">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                            Prato
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="product_type" name="product_type" value="Bebida">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                            Bebida
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="product_type" name="product_type" value="Sobremesa">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                            Sobremesa
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="product_type" name="product_type" value="Extra">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                            Extra
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="container justify-content-center">
                                                <input type="submit" class="btn btn-primary" id="add_card" value="Salvar">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                            @foreach ($sobremesas as $sobremesa)
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <p class="h5">Editar sobremesa</p>
                                    </div>
                                    <div class="card-body" id="card">
                                        <form action="{{route('edit_menu.update_item', ['id' => $sobremesa->id])}}" method="POST">
                                            @csrf
                                            <table class="table">
                                                <tr>
                                                    <th>Nome original</th>
                                                    <th>Preço original</th>
                                                    <th>Tipo original</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$sobremesa->product_name}}</td>
                                                    <td>R$ {{$sobremesa->product_price}}</td>
                                                    <td>{{$sobremesa->product_type}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nome novo</th>
                                                    <th>Preço novo</th>
                                                    <th>Tipo Novo</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" id="product_item" name='product_name'>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="product_item" name='product_price' pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                                                         name="null">
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="product_type" name="product_type" value="Prato">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                            Prato
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="product_type" name="product_type" value="Bebida">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                            Bebida
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="product_type" name="product_type" value="Sobremesa">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                            Sobremesa
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="product_type" name="product_type" value="Extra">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                            Extra
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="container justify-content-center">
                                                <input type="submit" class="btn btn-primary" id="add_card" value="Salvar">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                            @foreach ($extras as $extra)
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <p class="h5">Editar extra</p>
                                    </div>
                                    <div class="card-body" id="card">
                                        <form action="{{route('edit_menu.update_item', ['id' => $extra->id])}}" method="POST">
                                            @csrf
                                            <table class="table">
                                                <tr>
                                                    <th>Nome original</th>
                                                    <th>Preço original</th>
                                                    <th>Tipo original</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$extra->product_name}}</td>
                                                    <td>R$ {{$extra->product_price}}</td>
                                                    <td>{{$extra->product_type}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nome novo</th>
                                                    <th>Preço novo</th>
                                                    <th>Tipo Novo</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control" id="product_item" name='product_name'>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" id="product_item" name='product_price' pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                                                         name="null">
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="product_type" name="product_type" value="Prato">
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                            Prato
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="product_type" name="product_type" value="Bebida">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                            Bebida
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="product_type" name="product_type" value="Sobremesa">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                            Sobremesa
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" id="product_type" name="product_type" value="Extra">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                            Extra
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="container justify-content-center">
                                                <input type="submit" class="btn btn-primary" id="add_card" value="Salvar">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
