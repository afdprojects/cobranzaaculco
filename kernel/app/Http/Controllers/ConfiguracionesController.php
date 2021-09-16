<?php

namespace App\Http\Controllers;

use App\Models\Configuraciones;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class ConfiguracionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arregloConfiguracion = Configuraciones::all()->first();
        return Inertia::render('Configuraciones',['arregloConfiguracion'=>
        $arregloConfiguracion
            ]);
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
     * @param  \App\Models\Configuraciones  $configuraciones
     * @return \Illuminate\Http\Response
     */
    public function show(Configuraciones $configuraciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Configuraciones  $configuraciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Configuraciones $configuraciones)
    {
        $arregloConfiguracion = Configuraciones::all()->first();
        return Inertia::render('Modificar',['arregloConfiguracion'=> $arregloConfiguracion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Configuraciones  $configuraciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Configuraciones $configuraciones)
    {

        //dd($request->file('logo'));
        $name = $request->file('logo')->getClientOriginalName();
        $path = $request->file('logo')->storeAs(
            'public', $name
        );
        $arregloConfiguracion = Configuraciones::all()->first();
        //Configuraciones::update('update configuraciones set nombremunicipio = "storage/'.$request->input('nombremunicipio').'" and logo="'.$name.'" where id = '.$arregloConfiguracion['id'].' ;');
        $arregloConfiguracion->nombremunicipio = $request->input('nombremunicipio');
        $arregloConfiguracion->logo = "/storage/".$name;
        $arregloConfiguracion->save();
        $arregloConfiguracion = Configuraciones::all()->first();
        return Inertia::render('Configuraciones',['arregloConfiguracion'=>
        $arregloConfiguracion
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Configuraciones  $configuraciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configuraciones $configuraciones)
    {
        //
    }
}
