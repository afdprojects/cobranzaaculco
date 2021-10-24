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
                        <center style="margin-top: 35px;">
                        <span class="alert alert-secondary" role="alert" style="padding-top:20px !important; padding-bottom
                        :20px !important; padding-right:30px; padding-left:30px;">
                            {{ $arregloConfiguraciones->nombremunicipio }} || Control de Padrón de Comercios
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
                        
                        <th scope="col">RFC</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Domicilio</th>
                        <th scope="col">Población</th>
                        <th scope="col">Giro</th>
                        <th scope="col">Razón Social</th>
                        <th scope="col">Domicilio Negocio</th>
                        <th scope="col">Fecha Ini Oper</th>
                        <th scope="col">Superficie Terreno</th>
                        <th scope="col">Tipo de Movimiento</th>
                        <th scope="col">Periodo de Pago</th>
                        <th scope="col">Importe</th>
                        <th scope="col">Horario de Apertura</th>
                        <th scope="col">Horario Cierre</th>
                        <th scope="col">Fecha</th>

                        </tr>
                    </thead>
                    <tbody>
 <?php 
                        $sumatoria1=0;
                         ?>
                        @foreach ($arrayTodosLosCobros as $array)
                            <tr >
                                
                                    <td scope="row">{{ $array->rfc }}</td>
                                    <td>{{ $array->nombre." ".$array->apellidopaterno." ".$array->apellidomaterno }}</td>
                                    <td>{{ $array->domicilio }}</td>
                                    <td>{{ $array->poblacion }}</td>
                                    <td>{{ $array->giro }}</td>
                                    <td>{{ $array->razonsocial }}</td>
                                    <td>{{ $array->domicilionegocio }}</td>
                                    <td>{{ $array->fechainioperacion }}</td>
                                    <td>{{ $array->superficiedeterreno }}</td>
                                    <td>{{ $array->tipodemovimiento }}</td>
                                    <td>{{ $array->periododepago }}</td>
                                    <td>{{ $array->importe }}</td>
                                    <td>{{ $array->horarioapertura }}</td>
                                    <td>{{ $array->horariocierre }}</td>
                                    <td>{{ $array->fecha }}</td>
                                </tr>
                               <?php 
                        $sumatoria1=$sumatoria1+$array->importe;
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
                                    <td></td>
                                    <td style="font-weight: bold;"></td>
                                    <td style="font-weight: bold;"></td>
                                    <td style="font-weight: bold;">Total</td>
                                    <td style="font-weight: bold;">{{ $sumatoria1 }}</td>
                                    <td style="font-weight: bold;"></td>
                                    <td style="font-weight: bold;"></td>
                                    <td style="font-weight: bold;"></td>
                                    
                            </tr>
                    </tbody>
                    </table>

            </div>

        </div>


    </body>




</html>
