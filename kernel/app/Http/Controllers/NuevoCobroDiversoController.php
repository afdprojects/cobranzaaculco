<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Diarios;
use Barryvdh\DomPDF\Facade as PDF;


class NuevoCobroDiversoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrayRecargos = DB::table('recargos')->get();
        $arrayDB = DB::table('catalogo_cuentas')
                ->get();
        

        $arrayPagos = DB::table('diarios')->get();//aqui se realiza la consulta a la tabla diarios
        $contarPagos=count($arrayPagos);
        $nuevoCode="";
        $totalPagos=0;
        $esSubir=true;
        $NuevoCodeID="";
        if ($contarPagos == 0) {
            $nuevoCode = 375013;
            $NuevoCodeEdit=0;
            $totalPagos=0;
        }
        else{
            $arrayPagos = $arrayPagos;
            
            $nuevoCode=$arrayPagos[$contarPagos-1]->recibo+1;
            $NuevoCodeEdit=0;
            $totalPagos=$contarPagos;

        }
        $date=date('Y-m-d');
        

        return Inertia::render('Registros/NuevoCobroDiverso', ['arrayCatalogo' => $arrayDB,
            'arrayRecargos'=>$arrayRecargos, 'arrayPagos'=>$arrayPagos, 'nuevoCode'=>$nuevoCode, 'totalPagos' => $totalPagos, 'esSubir'=>$esSubir , 'NuevoCodeEdit'=>$NuevoCodeEdit, 'arregloDate'=>$date ] );



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


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
                 

                    $arrayDB = DB::table('catalogo_cuentas')->where('nombrecuenta','=',$request->input('nombrecuenta'))->get();
                 

               DB::table('diarios')->insert([
                    
                        'cuenta'=> $arrayDB[0]->cuenta,
                        'recibo' => $request->input('recibo'),
                        'fecha' => $request->input('fecha'),
                        'nombre' => $request->input('nombre'),
                        'rfc' => $request->input('rfc'),
                        'clavecat' => $request->input('clavecat'),
                        'concepto' => $request->input('concepto'),
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
                        'cuentaRecibo'=>$request->input('cuentaRecibo'),
                        'iduser' =>$request->input('iduser')

                
                ]);

            $arrayDBDiarios = DB::table('diarios')->get()->last();

                    $periodo=date('y');
                    $mes=date('m');

            DB::table($mes.'_'.$periodo.'_diarios')->insert([
                        'id_ingresos' =>$arrayDBDiarios->id_ingresos,
                        'cuenta'=> $arrayDB[0]->cuenta,
                        'recibo' => $request->input('recibo'),
                        'fecha' => $request->input('fecha'),
                        'nombre' => $request->input('nombre'),
                        'rfc' => $request->input('rfc'),
                        'clavecat' => $request->input('clavecat'),
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
                        'cuentaRecibo'=>$request->input('cuentaRecibo'),
                        'iduser' =>$request->input('iduser')

                
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
            $nuevoCode = 375013;
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
                        'fecha' => $request->input('fecha'),
                        'nombre' => $request->input('nombre'),
                        'rfc' => $request->input('rfc'),
                        'clavecat' => $request->input('clavecat'),
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
                        'cuentaRecibo'=>$request->input('cuentaRecibo'),
                        'iduser' =>$request->input('iduser')

                
                ]);

            $arrayDBDiarios = DB::table('diarios')->get()->last();



            DB::table($mes.'_'.$periodo.'_diarios')->insert([
                        'id_ingresos' =>$arrayDBDiarios->id_ingresos,
                        'cuenta'=> $arrayDB[0]->cuenta,
                        'recibo' => $request->input('recibo'),
                        'fecha' => $request->input('fecha'),
                        'nombre' => $request->input('nombre'),
                        'rfc' => $request->input('rfc'),
                        'clavecat' => $request->input('clavecat'),
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
                        'cuentaRecibo'=>$request->input('cuentaRecibo'),
                        'iduser' =>$request->input('iduser')

                
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
            $nuevoCode = 375013;
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

    echo "<center><br><br><br><br><br><h1>Error #1001 Actualización ó Carga POS-Refresh input('recibo')</h1><br><br><span style='background-color:rgb(192,57,43);'><p style='color:rgb(192,57,43); fontsize:25px;'>Este error se debe a que no diste enter despues de actualizar o subir un recibo al sistema. El sistema se protege y corrige lo siguiente:</p></span>
        </center>
        <ul>
            <li>No se genero la actualización del recibo</li>
            <li>No se genero un nuevo folio o número de recibo</li>
            <li>El sistema no puede forzar a subir un nuevo folio de acuerdo a las soluciones</li>
        </ul><br>
        <b><center>Soluciones:</center>
        <ul>
        <li>a) Debes dar clic al input('recibo') (Numero de Recibo) y dar enter.</li>
        <li>b) Actualiza el sistema con el botón cancelar Registro</li>
        <li>c) Trata de revisar en la esquina superior derecha el ultimo folio obligatorio e ingresalo, presiona enter y puedes crear ó actualizar un nuevo registro.</li>
        <li> Este error conocido como #1001 se puede presentar al eliminar o actualizar el registro, trata de dar enter tras ingresar el número de recibo para que hacer un POS-Refresh</li>
        </b></ul>
        ";
    
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
                

                

                DB::table('diarios')
                  ->where('recibo', $updateID)
                  ->update([

                        'cuenta'=> $arrayDB[0]->cuenta,
                        //'recibo' => $request->input('recibo'),
                        //'fecha' => $fecha,
                        
                        'fecha' => $request->input('fecha'),
                        'nombre' => $request->input('nombre'),
                        'rfc' => $request->input('rfc'),
                        'clavecat' => $request->input('clavecat'),

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
                        'cuentaRecibo'=>$request->input('cuentaRecibo'),
                        'iduser' =>$request->input('iduser')
                        //'MesPeriodo'=>$fecha2



                  ]);

                  DB::table($mes.'_'.$periodo.'_diarios')
                  ->where('recibo', $updateID)
                  ->update([

                        'cuenta'=> $arrayDB[0]->cuenta,
                        //'recibo' => $request->input('recibo'),
                        //'fecha' => $fecha,
                        'fecha' => $request->input('fecha'),
                        'nombre' => $request->input('nombre'),
                        'rfc' => $request->input('rfc'),
                        'clavecat' => $request->input('clavecat'),

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
                        'cuentaRecibo'=>$request->input('cuentaRecibo'),
                        'iduser' =>$request->input('iduser')
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
            $nuevoCode = 375013;
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
                        'fecha' => $request->input('fecha'),
                        'nombre' => $request->input('nombre'),
                        'rfc' => $request->input('rfc'),
                        'clavecat' => $request->input('clavecat'),

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
                        'cuentaRecibo'=>$request->input('cuentaRecibo'),
                        'iduser' =>$request->input('iduser')
                        //'MesPeriodo'=>$fecha2



                  ]);

                  DB::table($mes.'_'.$periodo.'_diarios')
                  ->where('recibo', $updateID)
                  ->update([

                        'cuenta'=> $arrayDB[0]->cuenta,
                        //'recibo' => $request->input('recibo'),
                        //'fecha' => $fecha,

                        'fecha' => $request->input('fecha'),
                        'nombre' => $request->input('nombre'),
                        'rfc' => $request->input('rfc'),
                        'clavecat' => $request->input('clavecat'),

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
                        'cuentaRecibo'=>$request->input('cuentaRecibo'),
                        'iduser' =>$request->input('iduser')
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
            $nuevoCode = 375013;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
