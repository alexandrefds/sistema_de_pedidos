@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <a class="navbar-brand" href="{{route('home')}}">PEDIDOS</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('request_closed')}}">PEDIDOS FECHADOS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('menu_edit')}}">EDITAR CARDÁPIO</a>
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
                                    {{session('status')}}
                                </div>
                            @endif

                            <div>
                                <p class="h3">Criando cardápio</p>
                            </div>
                            <br>
                            <div class="card">
                                <div class="card-header bg-light">
                                    <p class="h5">Criar item</p>
                                </div>
                                <div class="card-body" id="card">
                                    <form action="{{route("menu_creater.save_item")}}" method="POST">
                                        @csrf
                                        <div class="form-group row justify-content-center">
                                            <div class="col-sm-7">
                                                <span>Nome do item</span>
                                                <input type="text" class="form-control" id="product_item" name='product_name'>
                                                <span>Preço do item</span>
                                                <input type="number" class="form-control" id="product_item" name='product_price' pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                                                name="null">
                                                <span>Tipo do produto</span>
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
                                            </div>
                                        </div>
                                        <div class="container justify-content-center">
                                        <input type="submit" class="btn btn-primary" id="add_card" value="Salvar">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
