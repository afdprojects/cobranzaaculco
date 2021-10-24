<?php

namespace App\Http\Controllers;

use App\Models\padrondecomercios;
use Illuminate\Http\Request;
use App\Exports\PadronComerciosExport;
use App\Exports\PadronComerciosFechaExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcelPadronController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

         return Excel::download(new PadronComerciosExport, 'corte.xlsx');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\padrondecomercios  $padrondecomercios
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $recibo = str_replace("exportarpadroncomercioxls/", "",$request->path());
        $formatoFecha=$recibo;
       $arrayFecha=explode('.',$recibo);

       return Excel::download(new PadronComerciosFechaExport($formatoFecha), $arrayFecha[0].'_'.$arrayFecha[1].'reporte.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\padrondecomercios  $padrondecomercios
     * @return \Illuminate\Http\Response
     */
    public function edit(padrondecomercios $padrondecomercios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\padrondecomercios  $padrondecomercios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, padrondecomercios $padrondecomercios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\padrondecomercios  $padrondecomercios
     * @return \Illuminate\Http\Response
     */
    public function destroy(padrondecomercios $padrondecomercios)
    {
        //
    }
}
