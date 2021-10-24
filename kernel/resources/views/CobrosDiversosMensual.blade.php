<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href= "{{ asset('css/bootstrap/dist/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-icons/font/bootstrap-icons.css') }} ">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <style type="text/css">
            *{
                font-size: 12px;
            }
        </style>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ asset('js/app.js')}} " defer></script>
        <script src="{{ asset('js/jquery/dist/jquery.js') }}" ></script>
        <script src="{{ asset('js/js/bootstrap.js') }}" ></script>
    </head>
    <body class="font-sans antialiased">
        <div class="container-fluid">
            <div class="row">


                    <div class="col-md-1">

                    </div>
                    <div class="col-md-1">
                        <img src="{{ asset('images/logo.png') }}">
                    </div>

                    <div class="col-md-8">
                        <center style="margin-top: 40px;">
                        <span class="alert alert-secondary" role="alert" style="padding-top:20px !important; padding-bottom
                        :20px !important; padding-right:30px; padding-left:30px;">
                            <b style="font-size: 15px;">{{ $arregloConfiguraciones->nombremunicipio }}</b> || Control de Cobros Diversos
                        </span>
                        </center>
                    </div>
                    <div class="col-md-2">
                        <?php 

                            if($formatoFecha==null){

                            }else{
                                echo "<br><p class='alert alert-secondary' style='font-size:11px;'>".$formatoFecha."</p>";
                            }

                        ?>
                    </div>
                    </div>


    


            <div class="row">

                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Cuenta</th>
                        <th scope="col">Recibo</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Domicilio</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Periodo</th>
                        <th scope="col">Nom de Cuenta</th>
                        <th scope="col">Importe</th>
                        <th scope="col">Recargos</th>
                        <th scope="col">IVA</th>
                        <th scope="col">Rezagos</th>
                        <th scope="col">Gastos Ejec</th>
                        <th scope="col">Multas</th>
                        <th scope="col">Desc</th>
                        <th scope="col">Total</th>

                        </tr>
                    </thead>
                    <tbody>
 <?php 
                        $sumatoria1=0;
                        $sumatoria2=0;
                        $sumatoria3=0;
                        $sumatoria4=0;
                        $sumatoria5=0;
                        $sumatoria6=0;
                        $sumatoria7=0;
                        $sumatoria8=0; ?>

                        @foreach ($arrayTodosLosCobros as $array)
                            <tr >
                                <th scope="row">{{ $array->cuenta }}</th>
                                    <td>{{ $array->recibo }}</td>
                                    <td>{{ $array->fecha }}</td>
                                    <td>{{ $array->nombre }}</td>
                                    <td>{{ $array->domicilio }}</td>
                                    <td>{{ $array->concepto }}</td>
                                    <td>{{ $array->periodo }}</td>
                                    <td>{{ $array->nombrecuenta }}</td>
                                    <td>{{ $array->importe }}</td>
                                    <td>{{ $array->recargos }}</td>
                                    <td>{{ $array->iva }}</td>
                                    <td>{{ $array->rezagos }}</td>
                                    <td>{{ $array->gastosejec }}</td>
                                    <td>{{ $array->multas }}</td>
                                    <td>{{ $array->descuentos }}</td>
                                    <td>{{ $array->total }}</td>
                                </tr>
                                 <?php 
                        $sumatoria1=$sumatoria1+$array->importe;
                        $sumatoria2=$sumatoria2+$array->recargos;
                        $sumatoria3=$sumatoria3+$array->iva;
                        $sumatoria4=$sumatoria4+$array->rezagos;
                        $sumatoria5=$sumatoria5+$array->gastosejec;
                        $sumatoria6=$sumatoria6+$array->multas;
                        $sumatoria7=$sumatoria7+$array->descuentos;
                        $sumatoria8=$sumatoria8+$array->total;
                            ?>
                        @endforeach


<tr>
                                <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Totales:</td>
                                    <td style="font-weight: bold;">{{ $sumatoria1 }}</td>
                                    <td style="font-weight: bold;">{{ $sumatoria2 }}</td>
                                    <td style="font-weight: bold;">{{ $sumatoria3 }}</td>
                                    <td style="font-weight: bold;">{{ $sumatoria4 }}</td>
                                    <td style="font-weight: bold;">{{ $sumatoria5 }}</td>
                                    <td style="font-weight: bold;">{{ $sumatoria6 }}</td>
                                    <td style="font-weight: bold;">{{ $sumatoria7 }}</td>
                                    <td style="font-weight: bold;">{{ $sumatoria8 }}</td>
                            </tr>
                    </tbody>
                    </table>

            </div>

        </div>


    </body>




</html>
