<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Fazer pedido</title>
        <!-- Bootstrap !--->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    </head>
    <body>

        @php
            $table = \App\Http\Controllers\OrderController::getTable(1);

            $price = \App\Http\Controllers\OrderController::returnPrice();
        @endphp

        <div class="container">
            <br>
            <br>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <p class="h5">Cardápio Online</p>
                            </div>
                            <div>
                                <p class="h4">Mesa #1</p>
                            </div>
                        </div>
                        <form action="{{route("request")}}" method="GET">
                            <div class="card-body">
                                <input type="hidden" id="table_number" name="table_number" value="{{$table}}">

                                    <div class="card">
                                        <div class="card-header bg-light">
                                            <p class="h5">Pedido Enviado!</p>
                                        </div>
                                        <div class="card-body" id="card">
                                            <p class="h4"> Pedido feito! No total de R$ {{$price}}.</p>
                                        </div>
                                    </div>
                                    <br>


                                <input type="hidden" id="total_price" name="total_price" value="{{$price}}">
                                <input type="hidden" id="delivered" name="delivered" value="0">
                                <div class="container justify-content-center">
                                    <button type="submit" class="btn btn-primary" id="">Fazer outro pedido</button>
                                </div>
                            </div>
                        </form>
                        <br>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap --->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!--- Ajax --->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    </body>
</html>

