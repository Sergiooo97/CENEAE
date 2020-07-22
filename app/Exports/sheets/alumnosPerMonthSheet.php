<?php

namespace App\Exports\sheets;
use App\alumno;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class alumnosPerMonthSheet implements FromQuery, WithTitle, WithHeadings,ShouldAutoSize, WithEvents
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
        return alumno
            ::query()
            ->where('grado', $this->grado);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'grado ' . $this->grado;
    }
    public function headings(): array
    {
        return [
            '#',
            'Matricula',
            'Nombres',
            'Apellido Paterno',
            'Apellido Materno',
            'Edad',
            'Fecha de nacimiento',
            'CURP',
            'Grado',
            'Grupo',
            'municipio',
            'cp',
            'dirección',
            'Quiero ser..',
            'Ndolares',
            'Nombres de tutor',
            'Apellido paterno de tutor',
            'Apellido materno de tutor',
            'dirección del tutor',
            'escolaridad del tutor',
            'curp del tutor',
            'telefono del tutor',
            'Created at',
            'Updated at'
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);
                
            },
        ];
    }
}
