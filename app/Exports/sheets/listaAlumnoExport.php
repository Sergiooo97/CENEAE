<?php

namespace App\Exports\sheets;

use App\alumno;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
class listaAlumnoExport implements FromView, WithDrawings, WithTitle,  WithEvents, ShouldAutoSize
{
    protected $alumnos;
    public function __construct($alumnos=null)
    {
        $this->alumnos=$alumnos;
    }
    public function view(): View {
        $alumnos=$this->alumnos;
        return view("role.admin.download.pdf.listaGrupos",compact("alumnos"));
    }

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

        public function title(): string
    {
        return 'primer grado ';
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A8:W1000'; // All headers
                $event->sheet->getDelegate()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(9);
                $event->sheet->getStyle('A8:G1000')->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                    ]
                ]);

            },


        ];
    }
}
