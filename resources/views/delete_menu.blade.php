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
                                        <a class="nav-link" href="{{route('request_closed')}}">PEDIDOS FECHADOS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('menu_creater')}}">CRIAR CARDÁPIO</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('menu_edit')}}">EDITAR CARDÁPIO</a>
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
                                <p class="h3">Excluindo cardápio</p>
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
                                        <p class="h5">Excluir prato</p>
                                    </div>
                                    <div class="card-body" id="card">
                                        <form action="{{route('delete_menu.delete_item', ['id' => $prato->id])}}" method="POST">
                                            @csrf
                                            <table class="table">
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Preço</th>
                                                    <th>Tipo</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$prato->product_name}}</td>
                                                    <td>R$ {{$prato->product_price}}</td>
                                                    <td>{{$prato->product_type}}</td>
                                                </tr>
                                            </table>
                                            <div class="container justify-content-center">
                                                <input type="submit" class="btn btn-danger" id="add_card" value="Excluir">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                            @foreach ($bebidas as $bebida)
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <p class="h5">Excluir bebida</p>
                                    </div>
                                    <div class="card-body" id="card">
                                        <form action="{{route('delete_menu.delete_item', ['id' => $bebida->id])}}" method="POST">
                                            @csrf
                                            <table class="table">
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Preço</th>
                                                    <th>Tipo</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$bebida->product_name}}</td>
                                                    <td>R$ {{$bebida->product_price}}</td>
                                                    <td>{{$bebida->product_type}}</td>
                                                </tr>
                                            </table>
                                            <div class="container justify-content-center">
                                                <input type="submit" class="btn btn-danger" id="add_card" value="Excluir">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                            @foreach ($sobremesas as $sobremesa)
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <p class="h5">Excluir sobremesa</p>
                                    </div>
                                    <div class="card-body" id="card">
                                        <form action="{{route('delete_menu.delete_item', ['id' => $sobremesa->id])}}" method="POST">
                                            @csrf
                                            <table class="table">
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Preço</th>
                                                    <th>Tipo</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$sobremesa->product_name}}</td>
                                                    <td>R$ {{$sobremesa->product_price}}</td>
                                                    <td>{{$sobremesa->product_type}}</td>
                                                </tr>
                                            </table>
                                            <div class="container justify-content-center">
                                                <input type="submit" class="btn btn-danger" id="add_card" value="Excluir">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                            @endforeach
                            @foreach ($extras as $extra)
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <p class="h5">Excluir extra</p>
                                    </div>
                                    <div class="card-body" id="card">
                                        <form action="{{route('delete_menu.delete_item', ['id' => $extra->id])}}" method="POST">
                                            @csrf
                                            <table class="table">
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Preço</th>
                                                    <th>Tipo</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$extra->product_name}}</td>
                                                    <td>R$ {{$extra->product_price}}</td>
                                                    <td>{{$extra->product_type}}</td>
                                                </tr>
                                            </table>
                                            <div class="container justify-content-center">
                                                <input type="submit" class="btn btn-danger" id="add_card" value="Excluir">
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
