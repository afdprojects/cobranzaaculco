<?php

namespace App\Exports;

use App\Models\padrondecomercios;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportarExcel2 implements FromQuery
{
    use Exportable;
   public $formatoFecha;

    public function getFecha(String $formatoFecha)
    {

        $this->formatoFecha = $formatoFecha;
        
        return $this;
    }

    public function query()
    {
        return padrondecomercios::query()->where('MesPeriodo',"=", $this->formatoFecha);
    }
}
