<?php

namespace App\Http\Controllers;

use App\Models\Diarios;
use Illuminate\Http\Request;
use App\Exports\DiariosExport;
use Maatwebsite\Excel\Facades\Excel;


class ExportExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
          return Excel::download(new DiariosExport, 'corte.xlsx');
          
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
     * @param  \App\Models\Diarios  $diarios
     * @return \Illuminate\Http\Response
     */
    public function show(Diarios $diarios)
    {
        //





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
