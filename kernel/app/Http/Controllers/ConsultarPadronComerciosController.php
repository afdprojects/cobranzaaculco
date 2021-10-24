<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class ConsultarPadronComerciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Registros/CalendarSelectionCobros');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mes=$request->input('mes');
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
            $ConsultaMensual = DB::table($mes."_".$periodo."_padrondecomercios")
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
            $nombreTabla=$mes."_".$periodo."_padrondecomercios";
          }

          return Inertia::render("Registros/TodosLosPadronesDeComercioMes",['arrayTodo'=>$arrayTodosLosCobros,'nombreTabla'=>$nombreTabla]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(String $padrondecomercios)
    {
        $query=$padrondecomercios;
        $arrayTodosLosCobros = DB::table($query)
        ->get();
        return Inertia::render('Registros/TodosLosPadronesDeComercio',['arrayTodo'=>$arrayTodosLosCobros]);
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
