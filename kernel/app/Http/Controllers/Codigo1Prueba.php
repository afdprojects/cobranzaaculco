<?   
//aqui vamos a hacer una condicion logica de un valor request->input('valoracion') adquirido:
        //Para esto vamos a visualizar un boton en la anterior ruta = sdca.com/nuevocobrodiverso
        if($request->input("valoracion")==true){


//aqui empieza la valoracion verdadera

$queryIDExist = DB::table('diarios')->where('recibo',$request->input('recibo'))->get();

$contador=count($queryIDExist);

if($contador == 0){
   
  


        //En este if vamos a guardar e imprimir la informacion
//aqui vamos a hacer una condicion logica para saber si se selecciono o se ingreso un numero de cuenta.
            if($request->input('numerocuenta')==null || $request->input('numerocuenta'=="")){
                 $periodo=date('y');
                    $mes=date('m');
                    $fecha=date('Y-m-d');

                    $fecha2=date('m-y');

                    $arrayDB = DB::table('catalogo_cuentas')->where('nombrecuenta','=',$request->input('nombrecuenta'))->get();
                 

               DB::table('diarios')->insert([
                    
                        'cuenta'=> $arrayDB[0]->cuenta,
                        'recibo' => $request->input('recibo'),
                        'fecha' => $fecha,
                        'nombre' => $request->input('nombre'),
                        'domicilio' => $request->input('domicilio'),
                        'concepto' => $request->input('concepto'),
                        'periodo' => $request->input('periodo'),
                        'nombrecuenta'=>$request->input('nombrecuenta'),
                        'importe'=> $request->input('importe'),
                        'recargos'=>$request->input('recargos'),
                        'iva'=>$request->input('iva'),
                        'rezagos'=>$request->input('rezagos'),
                        'gastosejec'=>$request->input('ejecucion'),
                        'multas'=>$request->input('multa'),
                        'descuentos'=>$request->input('descuento'),
                        'total'=>$request->input('total'),
                        'MesPeriodo'=>$fecha2

                
                ]);

            $arrayDBDiarios = DB::table('diarios')->get()->last();



            DB::table($mes.'_'.$periodo.'_diarios')->insert([
                        'id_ingresos' =>$arrayDBDiarios->id_ingresos,
                        'cuenta'=> $arrayDB[0]->cuenta,
                        'recibo' => $request->input('recibo'),
                        'fecha' => $fecha,
                        'nombre' => $request->input('nombre'),
                        'domicilio' => $request->input('domicilio'),
                        'concepto' => $request->input('concepto'),
                        'periodo' => $request->input('periodo'),
                        'nombrecuenta'=>$request->input('nombrecuenta'),
                        'importe'=> $request->input('importe'),
                        'recargos'=>$request->input('recargos'),
                        'iva'=>$request->input('iva'),
                        'rezagos'=>$request->input('rezagos'),
                        'gastosejec'=>$request->input('ejecucion'),
                        'multas'=>$request->input('multa'),
                        'descuentos'=>$request->input('descuento'),
                        'total'=>$request->input('total')

                
                ]);
                    //Despues de el ingreso de la consulta

            $arrayRecargos = DB::table('recargos')->get();
        $arrayDB = DB::table('catalogo_cuentas')
                ->get();

        $arrayPagos = DB::table('diarios')->get();//aqui se realiza la consulta a la tabla diarios
        $contarPagos=count($arrayPagos);
        $nuevoCode="";
        $totalPagos=0;
        $NuevoCodeEdit=0;
        $esSubir=false;
        if ($contarPagos == 0) {
            $nuevoCode = 700000;
            $NuevoCodeEdit=0;
            $totalPagos=0;
        }
         else{
            $arrayPagos = $arrayPagos;
            
            $nuevoCode=$arrayPagos[$contarPagos-1]->recibo+1;
            $NuevoCodeEdit=0;
            $totalPagos=$contarPagos;

        }

        return Inertia::render('Registros/NuevoCobroDiverso', ['arrayCatalogo' => $arrayDB,
            'arrayRecargos'=>$arrayRecargos, 'arrayPagos'=>$arrayPagos, 'nuevoCode'=>$nuevoCode, 'totalPagos' => $totalPagos, 'esSubir'=>$esSubir , 'NuevoCodeEdit'=>$NuevoCodeEdit] );

           

            }elseif($request->input('numerocuenta')!=null || $request->input('numerocuenta')!=""){



                $periodo=date('y');
                    $mes=date('m');
                    $fecha=date('Y-m-d');

                    $fecha2=date('m-y');

                    $arrayDB = DB::table('catalogo_cuentas')->where('nombrecuenta','=',$request->input('nombrecuenta2'))->get();
                 

               DB::table('diarios')->insert([
                    
                        'cuenta'=> $arrayDB[0]->cuenta,
                        'recibo' => $request->input('recibo'),
                        'fecha' => $fecha,
                        'nombre' => $request->input('nombre'),
                        'domicilio' => $request->input('domicilio'),
                        'concepto' => $request->input('concepto'),
                        'periodo' => $request->input('periodo'),
                        'nombrecuenta'=>$request->input('nombrecuenta2'),
                        'importe'=> $request->input('importe'),
                        'recargos'=>$request->input('recargos'),
                        'iva'=>$request->input('iva'),
                        'rezagos'=>$request->input('rezagos'),
                        'gastosejec'=>$request->input('ejecucion'),
                        'multas'=>$request->input('multa'),
                        'descuentos'=>$request->input('descuento'),
                        'total'=>$request->input('total'),
                        'MesPeriodo'=>$fecha2

                
                ]);

            $arrayDBDiarios = DB::table('diarios')->get()->last();



            DB::table($mes.'_'.$periodo.'_diarios')->insert([
                        'id_ingresos' =>$arrayDBDiarios->id_ingresos,
                        'cuenta'=> $arrayDB[0]->cuenta,
                        'recibo' => $request->input('recibo'),
                        'fecha' => $fecha,
                        'nombre' => $request->input('nombre'),
                        'domicilio' => $request->input('domicilio'),
                        'concepto' => $request->input('concepto'),
                        'periodo' => $request->input('periodo'),
                        'nombrecuenta'=>$request->input('nombrecuenta2'),
                        'importe'=> $request->input('importe'),
                        'recargos'=>$request->input('recargos'),
                        'iva'=>$request->input('iva'),
                        'rezagos'=>$request->input('rezagos'),
                        'gastosejec'=>$request->input('ejecucion'),
                        'multas'=>$request->input('multa'),
                        'descuentos'=>$request->input('descuento'),
                        'total'=>$request->input('total')

                
                ]);
                


                //Despues de el ingreso de la consulta

            $arrayRecargos = DB::table('recargos')->get();
        $arrayDB = DB::table('catalogo_cuentas')
                ->get();

        $arrayPagos = DB::table('diarios')->get();//aqui se realiza la consulta a la tabla diarios
        $contarPagos=count($arrayPagos);
        $nuevoCode="";
        $NuevoCodeEdit=0;
        $totalPagos=0;
        $esSubir=false;
        if ($contarPagos == 0) {
            $nuevoCode = 700000;
            $NuevoCodeEdit=0;
            $totalPagos=0;
        }
       else{
            $arrayPagos = $arrayPagos;
            
            $nuevoCode=$arrayPagos[$contarPagos-1]->recibo+1;
            $NuevoCodeEdit=0;
            $totalPagos=$contarPagos;

        }

        return Inertia::render('Registros/NuevoCobroDiverso', ['arrayCatalogo' => $arrayDB,
            'arrayRecargos'=>$arrayRecargos, 'arrayPagos'=>$arrayPagos, 'nuevoCode'=>$nuevoCode, 'totalPagos' => $totalPagos, 'esSubir'=>$esSubir , 'NuevoCodeEdit'=>$NuevoCodeEdit] );

           
//Aqui termina la logica para revisar que numerocuenta2 no venga vacio

            }




}else{

    echo "<center><br><br><br><br><br><br><h1>Error #1204 Actualización POS-Refresh input('recibo')</h1><br><br><span style='background-color:rgb(192,57,43);'><p style='color:rgb(192,57,43); fontsize:25px;'>No lo olvides, si quieres dar click en el botón Actualizar recuerda que debes dar Enter en el folio del recibo, esto hará un POS-Refresh en el input del recibo, esto hará que actualice el cache y la aplicación actualizará la <b>DATA INPUT REQUEST</b>, No te preocupes, no pasa nada, solo si quieres editar un error de este recibo debes Hacer esto siempre antes de realizar un cambio.</p></span></center>";
    
}
//Aqui termina la valoracion verdadera
        }





        elseif($request->input("valoracion")==false){ //Apartado para hacer UPDATE

            //Aqui vamos a reutilizar el mismo controlador unicamente para poder hacer una actualizacion en el softwre
            //para ello debemos de dar clic en ACEPTAR / en el modal eliminarRegistro y en Actualizar

            //Se realizarn las consultas pertinentes.



            $updateID=$request->input('recibo');
            $periodo=date('y');
            $mes=date('m');
            //MesPeriodo
            $arrayDBPeriodo = DB::table('diarios')->where('recibo','=',$request->input('recibo'))->get();

            if($arrayDBPeriodo[0]->MesPeriodo == ''.$mes.'-'.$periodo){

            if($request->input('numerocuenta')==null || $request->input('numerocuenta'=="")){
            //asignamos el numero a entrar a la base de datos




            /*  DB::table('diarios')->insert([
                    
                        'cuenta'=> $arrayDB[0]->cuenta,
                        'recibo' => $request->input('recibo'),
                        'fecha' => $fecha,
                        'nombre' => $request->input('nombre'),
                        'domicilio' => $request->input('domicilio'),
                        'concepto' => $request->input('concepto'),
                        'periodo' => $request->input('periodo'),
                        'nombrecuenta'=>$request->input('nombrecuenta2'),
                        'importe'=> $request->input('importe'),
                        'recargos'=>$request->input('recargos'),
                        'iva'=>$request->input('iva'),
                        'rezagos'=>$request->input('rezagos'),
                        'gastosejec'=>$request->input('ejecucion'),
                        'multas'=>$request->input('multa'),
                        'descuentos'=>$request->input('descuento'),
                        'total'=>$request->input('total'),
                        'MesPeriodo'=>$fecha2

                
                ]);
*/

                //Lo comentado es como se ve una insert; para este caso usaremos un UPDATE
                
                $arrayDB = DB::table('catalogo_cuentas')->where('nombrecuenta','=',$request->input('nombrecuenta'))->get();     
                

                 $periodo=date('y');
                    $mes=date('m');
                    $fecha=date('Y-m-d');

                DB::table('diarios')
                  ->where('recibo', $updateID)
                  ->update([

                        'cuenta'=> $arrayDB[0]->cuenta,
                        //'recibo' => $request->input('recibo'),
                        //'fecha' => $fecha,
                        'nombre' => $request->input('nombre'),
                        'domicilio' => $request->input('domicilio'),
                        'concepto' => $request->input('concepto'),
                        //'periodo' => $request->input('periodo'),
                        'nombrecuenta'=>$request->input('nombrecuenta'),
                        'importe'=> $request->input('importe'),
                        'recargos'=>$request->input('recargos'),
                        'iva'=>$request->input('iva'),
                        'rezagos'=>$request->input('rezagos'),
                        'gastosejec'=>$request->input('ejecucion'),
                        'multas'=>$request->input('multa'),
                        'descuentos'=>$request->input('descuento'),
                        'total'=>$request->input('total'),
                        //'MesPeriodo'=>$fecha2



                  ]);

                  DB::table($mes.'_'.$periodo.'_diarios')
                  ->where('recibo', $updateID)
                  ->update([

                        'cuenta'=> $arrayDB[0]->cuenta,
                        //'recibo' => $request->input('recibo'),
                        //'fecha' => $fecha,
                        'nombre' => $request->input('nombre'),
                        'domicilio' => $request->input('domicilio'),
                        'concepto' => $request->input('concepto'),
                        //'periodo' => $request->input('periodo'),
                        'nombrecuenta'=>$request->input('nombrecuenta'),
                        'importe'=> $request->input('importe'),
                        'recargos'=>$request->input('recargos'),
                        'iva'=>$request->input('iva'),
                        'rezagos'=>$request->input('rezagos'),
                        'gastosejec'=>$request->input('ejecucion'),
                        'multas'=>$request->input('multa'),
                        'descuentos'=>$request->input('descuento'),
                        'total'=>$request->input('total'),
                        //'MesPeriodo'=>$fecha2



                  ]);



            //Se vuelve a meter en la vista NuevoCobroDiverso.vue con el mismo proposito
        $arrayRecargos = DB::table('recargos')->get();
         $arrayDB = DB::table('catalogo_cuentas')
                ->get();
        $arrayPagos = DB::table('diarios')->get();//aqui se realiza la consulta a la tabla diarios
        $contarPagos=count($arrayPagos);
        $nuevoCode="";
        $NuevoCodeEdit=$request->input('nuevoCodeEdit');
        $totalPagos=0;
        $esSubir=false;
        if ($contarPagos == 0) {
            $nuevoCode = 700000;
            $NuevoCodeEdit=0;
            $totalPagos=0;
        }
        else{
            $arrayPagos = $arrayPagos;
            
            $nuevoCode=$arrayPagos[$contarPagos-1]->recibo+1;
            $NuevoCodeEdit=$request->input('nuevoCodeEdit');
            $totalPagos=$contarPagos;

        }




        return Inertia::render('Registros/NuevoCobroDiverso', ['arrayCatalogo' => $arrayDB,
            'arrayRecargos'=>$arrayRecargos, 'arrayPagos'=>$arrayPagos, 'nuevoCode'=>$nuevoCode, 'totalPagos' => $totalPagos, 'esSubir'=>$esSubir , 'NuevoCodeEdit'=>$NuevoCodeEdit] );
        






        }elseif($request->input('numerocuenta')!=null || $request->input('numerocuenta')!=""){
            $arrayDB = DB::table('catalogo_cuentas')->where('nombrecuenta','=',$request->input('nombrecuenta2'))->get();     
                

                 $periodo=date('y');
                    $mes=date('m');
                    $fecha=date('Y-m-d');

                DB::table('diarios')
                  ->where('recibo', $updateID)
                  ->update([

                        'cuenta'=> $arrayDB[0]->cuenta,
                        //'recibo' => $request->input('recibo'),
                        //'fecha' => $fecha,
                        'nombre' => $request->input('nombre'),
                        'domicilio' => $request->input('domicilio'),
                        'concepto' => $request->input('concepto'),
                        //'periodo' => $request->input('periodo'),
                        'nombrecuenta'=>$request->input('nombrecuenta'),
                        'importe'=> $request->input('importe'),
                        'recargos'=>$request->input('recargos'),
                        'iva'=>$request->input('iva'),
                        'rezagos'=>$request->input('rezagos'),
                        'gastosejec'=>$request->input('ejecucion'),
                        'multas'=>$request->input('multa'),
                        'descuentos'=>$request->input('descuento'),
                        'total'=>$request->input('total'),
                        //'MesPeriodo'=>$fecha2



                  ]);

                  DB::table($mes.'_'.$periodo.'_diarios')
                  ->where('recibo', $updateID)
                  ->update([

                        'cuenta'=> $arrayDB[0]->cuenta,
                        //'recibo' => $request->input('recibo'),
                        //'fecha' => $fecha,
                        'nombre' => $request->input('nombre'),
                        'domicilio' => $request->input('domicilio'),
                        'concepto' => $request->input('concepto'),
                        //'periodo' => $request->input('periodo'),
                        'nombrecuenta'=>$request->input('nombrecuenta'),
                        'importe'=> $request->input('importe'),
                        'recargos'=>$request->input('recargos'),
                        'iva'=>$request->input('iva'),
                        'rezagos'=>$request->input('rezagos'),
                        'gastosejec'=>$request->input('ejecucion'),
                        'multas'=>$request->input('multa'),
                        'descuentos'=>$request->input('descuento'),
                        'total'=>$request->input('total'),
                        //'MesPeriodo'=>$fecha2



                  ]);



            //Se vuelve a meter en la vista NuevoCobroDiverso.vue con el mismo proposito
        $arrayRecargos = DB::table('recargos')->get();
         $arrayDB = DB::table('catalogo_cuentas')
                ->get();
        $arrayPagos = DB::table('diarios')->get();//aqui se realiza la consulta a la tabla diarios
        $contarPagos=count($arrayPagos);
        $nuevoCode="";
        $NuevoCodeEdit=$request->input('nuevoCodeEdit');
        $totalPagos=0;
        $esSubir=false;
        if ($contarPagos == 0) {
            $nuevoCode = 700000;
            $NuevoCodeEdit=0;
            $totalPagos=0;
        }
        else{
            $arrayPagos = $arrayPagos;
            
            $nuevoCode=$arrayPagos[$contarPagos-1]->recibo+1;
            $NuevoCodeEdit=$request->input('nuevoCodeEdit');
            $totalPagos=$contarPagos;

        }




        return Inertia::render('Registros/NuevoCobroDiverso', ['arrayCatalogo' => $arrayDB,
            'arrayRecargos'=>$arrayRecargos, 'arrayPagos'=>$arrayPagos, 'nuevoCode'=>$nuevoCode, 'totalPagos' => $totalPagos, 'esSubir'=>$esSubir , 'NuevoCodeEdit'=>$NuevoCodeEdit] );
        






        }//aqui termina la valoracion falsa











        }



    }


       
?>