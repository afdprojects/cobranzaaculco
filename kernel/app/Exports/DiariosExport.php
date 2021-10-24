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

class DiariosExport implements FromView, WithDrawings
{


     public function view(): View
    {
        $queryDate = date('Y')."-".date('m')."-".date('d');
        $arrayDiarios = Diarios::where('fecha', $queryDate.'')->get();
        
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

    /**
    * @return \Illuminate\Support\Collection
    */
   /* public function collection()
    {
        return Diarios::where('fecha', '2021-10-11')->get();
    }


    public function startCell(): String
    { 
        return 'A5';
    }

    public function headings(): array
    {
        return [
            'id_ingresos',
            'Cuenta',
            'Recibo',
            'Fecha',
            'Nombre',
            'Domicilio',
            'Concepto',
            'Periodo',
            'Nombre Cuenta',
            'Importe',
            'Recargos',
            'IVA',
            'Rezagos',
            'Gastos de Ejecución',
            'Multas',
            'Descuentos',
            'Total',
            'Mes Periodo',
          
        ];
    }
*/


}
