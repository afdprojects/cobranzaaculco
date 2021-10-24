<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Diarios;
use App\Models\Configuraciones;
class ImpresionCobrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $queryDate = date('Y')."-".date('m')."-".date('d');
        $arrayTodosLosCobros = Diarios::where('fecha', $queryDate.'')->get();
        $arregloConfiguracion = Configuraciones::all()->first();
        return view('CobrosDiversosMensual',['arrayTodosLosCobros'=>$arrayTodosLosCobros, 'arregloConfiguraciones'=>$arregloConfiguracion ,'formatoFecha'=>null]);
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //$sinCatalogoCuentas = str_replace("http://127.0.0.1:8000/catalogodecuentas/", "",$request->url());
        //$sinEdit = str_replace("/edit", "",$sinCatalogoCuentas);http://127.0.0.1:8000/imprimircobrosdiversos/
        $rangoFecha = str_replace("impresiondecobros/", "",$request->path());

        $fechas=explode('.', $rangoFecha);

        $fechaini=$fechas[0];
        $fechafin=$fechas[1];

        $arrayTodosLosCobros = Diarios::whereBetween('fecha',[$fechaini,$fechafin])->get();
        $arregloConfiguracion = Configuraciones::all()->first();
        $formatoFecha=$fechaini.' a <br> '.$fechafin;
        
        return view('CobrosDiversosMensual',['arrayTodosLosCobros'=>$arrayTodosLosCobros,
        'arregloConfiguraciones'=>$arregloConfiguracion,
        'formatoFecha'=>$formatoFecha
        ]);
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
