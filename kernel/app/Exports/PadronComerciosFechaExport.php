<?php

namespace App\Exports;

use App\Models\padrondecomercios;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings; 

use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\Exportable;

use PhpOffice\PhpSpreadsheet\Cell\DataType;

class PadronComerciosFechaExport implements FromView, WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
public $formatoFecha;
public $arreglo;





     public function __construct(String $formatoFecha)
    {
        $this->formatoFecha = $formatoFecha;
        

         $this->arreglo = explode('.', $this->formatoFecha);
        
        

        return $this;
    }

     public function view(): View
    {
        $fechaini=$this->arreglo[0];
        $fechafin=$this->arreglo[1];

        $arrayTodosLosCobros = padrondecomercios::whereBetween('fecha',[$fechaini,$fechafin])->get();
        
        return view('PadronDeComercios', [
            'arrayTodosLosCobros' => $arrayTodosLosCobros
        ]);
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/images/logo.png'));
        $drawing->setHeight(90);
        $drawing->setCoordinates('B2');

        return $drawing;
    }
}
