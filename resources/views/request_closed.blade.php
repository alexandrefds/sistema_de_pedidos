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

                            @php
                                $count = 0;
                                $orders = \App\Http\Controllers\OrderController::showOrdersDelivered();
                            @endphp

                            <br>

                            <div class="card">
                                <div class="card-header bg-light">
                                    <p class="h5">Pedidos em espera</p>
                                </div>

                                <div class="card-body" id="card">
                                        <div class="form-group row justify-content-center">
                                            <div class="col-sm-7">

                                                @foreach($orders as $order)
                                                    {{! $count = $count + 1}}
                                                    @php
                                                        $ordersAux = $order['order'];
                                                        $orderString = '';
                                                        $countAux = 0;

                                                        foreach ($ordersAux as $orderAux) {
                                                            $orderString = $orderString.$orderAux;
                                                            $countAux += 1;
                                                            if($countAux < sizeof($ordersAux)) {
                                                                $orderString = $orderString.', ';
                                                            }
                                                            $totalPrice = $order['total_price'];
                                                            $table = $order["table_number"];
                                                            $id = $order["id"];
                                                        }
                                                    @endphp

                                                    <br>

                                                    <div class="card">

                                                        <div class="card-header bg-light">
                                                            <p class="h5">Pedidos mesa #{{$table}}</p>
                                                        </div>
                                                        <div class="card-body" id="card">
                                                            <table class="table">
                                                                <tr>
                                                                    <th>Pedidos</th>
                                                                    <th>R$</th>
                                                                </tr>
                                                                <tr>
                                                                    <td id="name_{{$count}}">{{$orderString}}</td>
                                                                    <td id="price_{{$count}}">{{$totalPrice}}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>



                                                @endforeach
                                            </div>
                                        <br>

                                @if($count == 0)
                                <br>
                                <div align="center">
                                    <p class="h5">Não há pedidos em espera.</p>
                                </div>
                                @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
