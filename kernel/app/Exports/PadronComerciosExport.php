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

class PadronComerciosExport implements FromView, WithDrawings
{


     public function view(): View
    {
        $queryDate = date('Y')."-".date('m')."-".date('d');
        $arrayTodosLosCobros = padrondecomercios::where('fecha', $queryDate.'')->get();
        
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
