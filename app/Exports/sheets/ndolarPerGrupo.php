<?php

namespace App\Exports\sheets;
use App\ndolar_lista;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Excel\Sheet;

class ndolarPerGrupo implements FromQuery, WithTitle, WithHeadings,ShouldAutoSize, WithEvents
{
   
    private $grado;
    private $year;

    public function __construct(int $year, int $grado)
    {
        $this->grado = $grado;
        $this->year  = $year;
    }

    /**
     * @return Builder
     */
    public function query()
    {
        return ndolar_lista
            ::query()
            ->OrderBy('grupo')
            ->where('grado', $this->grado);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->grado . '°' . ' grado' ;
    }
    public function headings(): array
    {
        return [
            '#',
            'Matricula',
            'Nombres',
            'Grado',
            'Grupo',
            'Cantidad $'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers             
                $event->sheet->getDelegate()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $event->sheet->getStyle('D2:F1000')->applyFromArray([       
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                    ]
                ]);
              
            },
            
            
        ];
    }
}
