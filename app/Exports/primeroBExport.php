<?php

namespace App\Exports;

use App\alumno;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class primeroBExport implements FromView, WithDrawings
{
    public function drawings()
    {
        $draw_ceneae = new Drawing();
        $draw_ceneae->setName('Logo');
        $draw_ceneae->setDescription('This is my logo');
        $draw_ceneae->setPath(public_path('/img/logo_centro_educativo.png'));
        $draw_ceneae->setHeight(100);
        $draw_ceneae->setCoordinates('A2');
    
        
        $draw_segey = new Drawing();
        $draw_segey->setName('Logo');
        $draw_segey->setDescription('This is my logo');
        $draw_segey->setPath(public_path('/img/segeey.png'));
        $draw_segey->setHeight(100);
        $draw_segey->setCoordinates('G2');
    
        return [$draw_ceneae, $draw_segey];
       
    
        
    }
        /**
        * @return \Illuminate\Support\Collection
        */
        public function view(): View
        {
            
            return view('download.pdf.listaGrupos', [
                'alumnos' => DB::table('alumnos')->where('grado', '=', '1')
                ->where('grupo', '=', 'B')
                ->get(),
               
            ]);
        }
}
