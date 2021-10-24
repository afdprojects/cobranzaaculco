<?php

namespace App\Http\Controllers;

use App\Models\CatalogoCuentas;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Routing;
use Barryvdh\DomPDF\Facade as PDF;

class CatalogoCuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $CatalogoCuentas=CatalogoCuentas::all();
        return Inertia::render('CatalogoDeCuentas',['catalogo_cuentas'=>$CatalogoCuentas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('FormCrearNuevaCuenta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombrecuenta'=>'required',
            'cuenta'=>'required'
        ]);

        CatalogoCuentas::create($request->all());
        $CatalogoCuentas=CatalogoCuentas::all();
        return Redirect::route('catalogodecuentas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CatalogoCuentas  $catalogoCuentas
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $catalogoCuentas=CatalogoCuentas::all();


        $pdf = PDF::loadView('CatalogoCuentas',['catalogoCuentas'=>$catalogoCuentas]);

         return $pdf->stream('archivo.pdf');

    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     *
     */
    public function edit(Request $request)
    {

        //$sinCatalogoCuentas = str_replace("http://127.0.0.1:8000/catalogodecuentas/", "",$request->url());

       $sinCatalogoCuentas =  str_replace("catalogodecuentas/", "",$request->path());

        $sinEdit = str_replace("/edit", "",$sinCatalogoCuentas);


        $arrayDB = DB::table('catalogo_cuentas')
                ->where('id_cuenta', '=', $sinEdit)
                ->get();


        return Inertia::render('FormEditarCuenta', ['arrayDB' => $arrayDB]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CatalogoCuentas  $catalogoCuentas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $Catalogos = CatalogoCuentas::find($request->input('id_cuenta'));
        $Catalogos->cuenta = $request->input('cuenta');
        $Catalogos->nombrecuenta = $request->input('nombrecuenta');
        $Catalogos->save();


        return Redirect::route('catalogodecuentas.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CatalogoCuentas  $catalogoCuentas
     * @return \Illuminate\Http\Response
     */
    public function destroy(CatalogoCuentas $catalogoCuentas)
    {
        //
    }
}
