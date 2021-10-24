<?php

namespace App\Exports;

use App\Models\Diarios;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportarExcel1 implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
    use Exportable;

    public $formatoFecha;

    public function getFecha(String $formatoFecha)
    {

        $this->formatoFecha = $formatoFecha;
        
        return $this;
    }

    public function query()
    {
        return Diarios::query()->where('MesPeriodo',"=", $this->formatoFecha);
    }
}
