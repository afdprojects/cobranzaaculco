<?php

namespace App\Exports;


use App\Models\Diarios;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings; 

use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\Exportable;

use PhpOffice\PhpSpreadsheet\Cell\DataType;


class DiariosFechaExport implements FromView, WithDrawings
{
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

        $arrayDiarios = Diarios::whereBetween('fecha',[$fechaini,$fechafin])->get();
        
        return view('CobrosDiversos', [
            'Diarios' => $arrayDiarios
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