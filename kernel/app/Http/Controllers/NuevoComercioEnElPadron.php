<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class NuevoComercioEnElPadron extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function index(){

       

$arrayDBTableComercios;

         try {
            $arrayDBTableComercios = DB::table('padrondecomercios')
                ->get();

          } catch(\Illuminate\Database\QueryException $ex){
            $arrayDBTableComercios = null;

          }

          $tamañoArray=count($arrayDBTableComercios);

//aqui vamos a pasar algo al grupo de propiedades que existen en nuestra aplicacion.
               if($tamañoArray==0){
                    $arrayDBTableComercios=0;
               }else{
                    $arrayDBTableComercios=$arrayDBTableComercios;
               }


        $date=date('d-m-Y');
        return Inertia::render("Registros/PadronComercios",['date'=>$date,'arrayDBTableComercios'=>$arrayDBTableComercios]);
    }


    public function store(Request $request){
        $periodo=date('y');
        $mes=date('m');
        $fecha=date('Y-m-d');
$fecha2=date('m-y');
       
        
              //Subes Información pero creando el primer registro de la tabla


             DB::table('padrondecomercios')->insert([
        
            
            'registromunicipal' => $request->input('registromunicipal'),
            'rfc' => $request->input('rfc'),
            'nombre' => $request->input('nombre'),
            'apellidopaterno' => $request->input('apellidopaterno'),
            'apellidomaterno' => $request->input('apellidomaterno'),
            'poblacion' => $request->input('poblacion'),
            'domicilio' => $request->input('domicilio'),
            'giro'=>$request->input('giro'),
            'razonsocial'=> $request->input('razonsocial'),
            'domicilionegocio'=>$request->input('domicilionegocio'),
            'fechainioperacion'=>$request->input('fechainioperacion'),
            'superficiedeterreno'=>$request->input('superficiedeterreno'),
            'tipodemovimiento'=>$request->input('tipodemovimiento'),
            'periododepago'=>$request->input('periododepago'),
            'importe'=>$request->input('importe'),
            'horarioapertura'=>$request->input('horarioapertura'),
            'horariocierre'=>$request->input('horariocierre'),
            'fecha'=>$fecha,
            'MesPeriodo'=>$fecha2

    
    ]);

$arrayDBPadronComercios = DB::table('padrondecomercios')->get()->last();



DB::table($mes.'_'.$periodo.'_padrondecomercios')->insert([
            'id_padron_comercios' =>$arrayDBPadronComercios->id_padron_comercios,
            'registromunicipal' => $request->input('registromunicipal'),
            'rfc' => $request->input('rfc'),
            'nombre' => $request->input('nombre'),
            'apellidopaterno' => $request->input('apellidopaterno'),
            'apellidomaterno' => $request->input('apellidomaterno'),
            'poblacion' => $request->input('poblacion'),
            'domicilio' => $request->input('domicilio'),
            'giro'=>$request->input('giro'),
            'razonsocial'=> $request->input('razonsocial'),
            'domicilionegocio'=>$request->input('domicilionegocio'),
            'fechainioperacion'=>$request->input('fechainioperacion'),
            'superficiedeterreno'=>$request->input('superficiedeterreno'),
            'tipodemovimiento'=>$request->input('tipodemovimiento'),
            'periododepago'=>$request->input('periododepago'),
            'importe'=>$request->input('importe'),
            'horarioapertura'=>$request->input('horarioapertura'),
            'horariocierre'=>$request->input('horariocierre'),
            'fecha'=>$fecha

    
    ]);      
      return Redirect::route('dashboard');

        
                
    }


    public function __invoke(Request $request)
    {
        //
    }
}
