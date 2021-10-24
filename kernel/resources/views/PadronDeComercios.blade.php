
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
                                    
                            </tr>
                        <tr >



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

            

