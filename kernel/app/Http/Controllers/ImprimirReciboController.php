<?php

namespace App\Http\Controllers;

use App\Models\Diarios;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ImprimirReciboController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\diarios  $diarios
     * @return \Illuminate\Http\Response
     */
    public function show(Request $diarios)
    {
        
        
       
        $recibo = str_replace("imprimirrecibo/", "",$diarios->path());
        $modeloDiarios=Diarios::where('recibo', $recibo)->first();
        $modeloDiarios->importe =number_format($modeloDiarios->importe,2);
        $modeloDiarios->rezagos =number_format($modeloDiarios->rezagos,2);
        $modeloDiarios->iva =number_format($modeloDiarios->iva,2);
        $modeloDiarios->recargos =number_format($modeloDiarios->recargos,2);
        $modeloDiarios->gastosejec =number_format($modeloDiarios->gastosejec,2);
        $modeloDiarios->multas =number_format($modeloDiarios->multas,2);
        $modeloDiarios->descuentos =number_format($modeloDiarios->descuentos,2);
        $modeloDiarios->total =number_format($modeloDiarios->total,2);
        $modeloDiarios->nombrecuenta =strtolower($modeloDiarios->nombrecuenta);

         $pdf = PDF::loadView('ImprimirRecibo',['modeloDiarios'=>$modeloDiarios]);

         return $pdf->stream('archivo.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\diarios  $diarios
     * @return \Illuminate\Http\Response
     */
    public function edit(diarios $diarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\diarios  $diarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, diarios $diarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\diarios  $diarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(diarios $diarios)
    {
        //
    }
}
