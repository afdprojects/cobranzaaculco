<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Configuraciones;
use App\Models\Diarios;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Registros/BusquedaEspecial');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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

        $nombre = $request->input("nombre");
        $arrayTodosLosCobros = DB::table('diarios')
           ->where('nombre',"like","%".$nombre."%")
           ->orderByDesc('fecha')
           ->get();
           $arregloConfiguracion = Configuraciones::all()->first();
            return view('CobrosDiversosPorNombre',['arrayTodosLosCobros'=>$arrayTodosLosCobros, 'arregloConfiguraciones'=>$arregloConfiguracion ,'formatoFecha'=>null]);



      /*  $mes=$request->input('mes');
        $periodo=$request->input('periodo');
        $conteomes=strlen($mes);

        //poner 0 si lo requiere el mes
        if($conteomes==1){
            $mes= '0'.$mes;
        }else{
            $mes = $mes;
        }

        //quitar 4 cifras
        $periodo = str_replace("20", "",$periodo);

        $nombreTabla="";
        //vamos a realizar un try el cual controlara que no aparezca el error
        //de crear la migración, si comentaramos esta linea
        //arroja este error, para crear dicha migracion
        try {
            $ConsultaMensual = DB::table($mes."_".$periodo."_diarios")
            ->get();

          } catch(\Illuminate\Database\QueryException $ex){
            $ConsultaMensual = null;

          }


          //aqui vamos a hacer una asignacion a un array
          //el cual llevara toda la informacion para
          //llenar el listado de la vista VUE

          $arrayTodosLosCobros=null;

          if($ConsultaMensual==null){
            $arrayTodosLosCobros = null;
          }else{
            $arrayTodosLosCobros = $ConsultaMensual;
            $nombreTabla=$mes."_".$periodo."_diarios";
          }

          return Inertia::render("Registros/TodosLosCobrosPorMes",['arrayTodo'=>$arrayTodosLosCobros,'nombreTabla'=>$nombreTabla]);
*/



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        

        /*
        $query=$diarios;
        $arrayTodosLosCobros = DB::table($query)
        ->get();
        return Inertia::render('Registros/TodosLosCobros',['arrayTodo'=>$arrayTodosLosCobros]);
        */

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
