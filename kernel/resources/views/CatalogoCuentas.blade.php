<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
       <style type="text/css">
           *{
    font-family: "Trebuchet MS", Verdana, Arial, Helvetica, sans-serif;
    font-size: 11px;    
    font-weight: normal;

}
    table {
  width: 100%;
  border-collapse: collapse; /* Los bordes de la tabla aparecen juntos */
}

.columna1 {
  width: 60%;
   
}
.columna2 {
  width: 40%;
 
}
       </style>
    </head>
    <body class="font-sans antialiased">
        <table>
            <thead>
                <tr>
                    <th width="10%"></th>
                    <th width="20%">
                        <img height="80" width="80" src="{{ asset('images/logo.png') }}">
                    </th>
                    <th width="60%">
                        <h4 style="font-size:15px; font-weight: bold;">MUNICIPIO DE ACULCO</h4>
                            <p>ACULCO, ESTADO DE MEXICO RFC MAC-850101-VB6</p>
                            <p>PLAZA  DE LA CONSTITUCIÓN NO.1</p>
                    </th>
                    <th width="10%"></th>
                </tr>
            </thead>
        </table><br><br>
        <div class="container-fluid">
            <div class="row">


                    <div class="col-md-1">

                    </div>
                    <div class="col-md-1">
                        
                    </div>

                    <div class="col-md-8">
                        <center style="">
                        <span class="alert alert-secondary" role="alert" style="">
                            <b style="font-size: 15px; border-radius: 85px !important; border:1px rgb(0, 0, 0) solid; padding:45px; ">Catalogo de Cuentas</b> 
                        </span>
                        </center>
                    </div>
                    <div class="col-md-2">
                        
                    </div>
                    </div>


    

<br><br>
            <div class="row" style="margin-right: 20px; border:1px solid rgb(0, 0, 0); margin-left: 20px;">

                <table class="table table-striped">
                    <thead style="border-bottom:1px solid rgb(0, 0, 0); ">
                        <tr style="">
                        <th scope="col" style="border-right:1px solid rgb(0, 0, 0);"><b>Número de Cuenta</b></th>
                        <th scope="col"><b>Nombre de Cuenta</b></th>
                        
                        

                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($catalogoCuentas as $array)
                            <tr>
                                <th scope="row" style="border-bottom: 1px solid rgb(0, 0, 0); border-right:1px solid rgb(0, 0, 0);">{{ $array->cuenta }}</th>
                                    <td style="border-bottom: 1px solid rgb(0, 0, 0);"><center>{{ $array->nombrecuenta }}</center></td>
                                    
                                 
                                </tr>
                                
                        @endforeach



                    </tbody>
                    </table>

            </div>

        </div>


    </body>




</html>
