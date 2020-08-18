<?php

namespace App\Exports\sheets\ndolar;

use App\ndolarTransacciones;
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

class ndolarInfoExport implements FromView, WithDrawings, WithTitle,  WithEvents,ShouldAutoSize
{
    protected $alumnos;
    protected $alumno_n;

    public function __construct($alumnos=null, $alumno_n=null)
  {
      $this->alumnos=$alumnos;
      $this->alumno_n=$alumno_n;
  }
  public function view(): View {
      $alumnos=$this->alumnos;
      $alumno_n=$this->alumno_n;
      return view("role.admin.download.ndolar.info",compact("alumnos", "alumno_n"));
  }

    public function drawings()
    {
        $draw_ceneae = new Drawing();
        $draw_ceneae->setName('Logo');
        $draw_ceneae->setDescription('This is my logo');
        $draw_ceneae->setPath(public_path('/img/logo_centro_educativo.png')); //Logotipo de centro edsucativo natanael
        $draw_ceneae->setHeight(90);
        $draw_ceneae->setCoordinates('A2');

        $draw_segey = new Drawing();
        $draw_segey->setName('Logo');
        $draw_segey->setDescription('This is my logo');
        $draw_segey->setPath(public_path('/img/segeey.png')); //Logotipo de seegey
        $draw_segey->setHeight(90);
        $draw_segey->setCoordinates('F2');

        return [$draw_ceneae, $draw_segey];
    }
        /**
        * @return \Illuminate\Support\Collection
        */
        public function title(): string
    {
        return 'Ndolar historial';
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:E6'; // All headers
                $event->sheet->getDelegate()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(9);
                $event->sheet->getStyle('B2:F1000')->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                    ]
                ]);
            },
        ];
    }
}
