

                <table class="table table-striped">
                    <thead>
                        <tr>
                                <th scope="row">
                                    
                                </th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                            </tr>
                        
<tr>
                                <th scope="row">
                                    
                                </th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    
                                </th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                     <td style="font-weight: bold; font-size: 16px;">ACULCO, ESTADO DE MEXICO RFC MAC-850101-VB6</td>
                                    <td></td>
                                   
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                            </tr>
<tr>
                                <th scope="row">
                                    
                                </th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="font-weight: bold;">PLAZA  DE LA CONSTITUCIÓN NO.1</td>
                                    <td></td>
                                    
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                            </tr>

<tr>
                                <th scope="row">
                                    
                                </th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                            </tr>

                        <tr>
                                <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                            </tr>
                        <tr >
                        <th style="background-color: gray; color: white; font-weight: bold;" scope="col">Cuenta</th>
                        <th style="background-color: gray; color: white; font-weight: bold;" scope="col">Recibo</th>
                        <th style="background-color: gray; color: white; font-weight: bold;" scope="col">Fecha</th>
                        <th style="background-color: gray; color: white; font-weight: bold;" scope="col">Nombre</th>
                        <th style="background-color: gray; color: white; font-weight: bold;" scope="col">Domicilio</th>
                        <th style="background-color: gray; color: white; font-weight: bold;" scope="col">Concepto</th>
                        <th style="background-color: gray; color: white; font-weight: bold;" scope="col">Periodo</th>
                        <th style="background-color: gray; color: white; font-weight: bold;" scope="col">Nom de Cuenta</th>
                        <th style="background-color: gray; color: white; font-weight: bold;" scope="col">Importe</th>
                        <th style="background-color: gray; color: white; font-weight: bold;" scope="col">Recargos</th>
                        <th style="background-color: gray; color: white; font-weight: bold;" scope="col">IVA</th>
                        <th style="background-color: gray; color: white; font-weight: bold;" scope="col">Rezagos</th>
                        <th style="background-color: gray; color: white; font-weight: bold;" scope="col">Gastos Ejec</th>
                        <th style="background-color: gray; color: white; font-weight: bold;" scope="col">Multas</th>
                        <th style="background-color: gray; color: white; font-weight: bold;" scope="col">Desc</th>
                        <th style="background-color: gray; color: white; font-weight: bold;" scope="col">Total</th>

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
                        @foreach ($Diarios as $array)
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

      