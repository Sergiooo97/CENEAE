<?php

namespace App\Exports\sheets;
use App\curso;
use App\alumno;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class calificacionesExport implements FromView, WithTitle,  WithEvents,ShouldAutoSize
{

    protected $promedio;
    protected $periodos;
    protected  $ns;
    protected  $cursos;
    protected  $cursos_nombre;






    public function __construct($promedio=null, $periodos=null, $ns=null,$cursos=null, $cursos_nombre=null)
    {
        $this->cursos_nombre=$cursos_nombre;
        $this->cursos=$cursos;
        $this->ns=$ns;
        $this->periodos=$periodos;
        $this->promedio=$promedio;

    }
    public function view(): View {

        $promedio=$this->promedio;
        $periodos=$this->periodos;
        $ns=$this->ns;
        $cursos=$this->cursos;
        $cursos_nombre=$this->cursos_nombre;
        return view("role.admin.download.pdf.calificaciones",compact("promedio", "periodos", "ns", "cursos", "cursos_nombre"));
        //'periodos','promedioFIN','bimestres_total', 'promedioFINAL', 'ns', 'promedio','cursos', 'cursos_nombre', 'alumno'
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
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(11);
                $event->sheet->getStyle('A8:G1000')->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                    ]
                ]);

            },


        ];
    }
}
