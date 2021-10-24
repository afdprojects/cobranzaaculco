<?php

namespace App\Http\Controllers;

use App\Models\Diarios;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DiariosFechaExport;

class ExportadorDiariosFechaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diarios  $diarios
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $recibo = str_replace("exportadordiariosfecha/", "",$request->path());
        $formatoFecha=$recibo;
       $arrayFecha=explode('.',$recibo);

       return Excel::download(new DiariosFechaExport($formatoFecha), $arrayFecha[0].'_'.$arrayFecha[1].'reporte.xlsx');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diarios  $diarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Diarios $diarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diarios  $diarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diarios $diarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diarios  $diarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diarios $diarios)
    {
        //
    }
}
