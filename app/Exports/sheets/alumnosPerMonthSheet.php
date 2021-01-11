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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithDrawings;

class alumnosPerMonthSheet implements FromQuery, WithTitle, WithHeadings,ShouldAutoSize, WithEvents, WithDrawings
{

    public function drawings()
    {
        $draw_ceneae = new Drawing();
        $draw_ceneae->setName('Logo');
        $draw_ceneae->setDescription('This is my logo');
        $draw_ceneae->setPath(public_path('/img/logo_centro_educativo.png'));
        $draw_ceneae->setHeight(100);
        $draw_ceneae->setCoordinates('B2');


        $draw_segey = new Drawing();
        $draw_segey->setName('Logo');
        $draw_segey->setDescription('This is my logo');
        $draw_segey->setPath(public_path('/img/segeey.png'));
        $draw_segey->setHeight(100);
        $draw_segey->setCoordinates('I2');

        return [$draw_ceneae, $draw_segey];
    }
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
            ::select(
                'alumnos.matricula as matricula',
                DB::raw("CONCAT(alumnos.nombres, ' ', alumnos.apellido_paterno, ' ', alumnos.apellido_materno) as nombres"),
                'alumnos.edad as edad',
                'alumnos.fecha_de_nacimiento as nacimiento',
                'alumnos.curp as curp',
                DB::raw("CONCAT(alumnos.grado, '°', alumnos.grupo) as grado_grupo"),
                'alumnos.municipio as municipio',
                'alumnos.direccion as direccion',
                'tutores.telefono as telefono'
                )
            ->join('tutores', 'alumnos.id', '=', 'tutores.alumno_id')
            ->where('alumnos.grado_id', $this->grado);
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
            [' '],
            ['SECRETARÍA DE EDUCACIÓN DEL ESTADO DE YUCATÁN'],
            ['"CENTRO EDUCATIVO NATANAEL"'],
            ['C.C.T 31PPR0032N, ZONA 029'],
            ['ACUERDO 2285, 2 DE JULIO DEL 2019'],
            ['C.C.T 31PPR0032N, ZONA 029'],
            ['CACALCHÉN, YUCATÁN'],
            [' '],
            ['Matricula',
            'Nombres',
            'Edad',
            'Fecha de nacimiento',
            'CURP',
            'Grupo',
            'municipio',
            'dirección',
            'telefono del tutor']
        ];
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->mergeCells('A1:J1');
                $event->sheet->getDelegate()->mergeCells('A2:J2');
                $event->sheet->getDelegate()->mergeCells('A3:J3');
                $event->sheet->getDelegate()->mergeCells('A4:J4');
                $event->sheet->getDelegate()->mergeCells('A5:J5');
                $event->sheet->getDelegate()->mergeCells('A6:J6');
                $event->sheet->getDelegate()->mergeCells('A7:J7');

                $event->sheet->getStyle('A1:J8')->applyFromArray([
                    'fill' => [
                        'fillType' => 'linear', //线性填充，类似渐变
                        'rotation' => 45, //渐变角度
                        'startColor' => [
                            'rgb' => 'ffffff' //初始颜色
                        ],
                        //结束颜色，如果需要单一背景色，请和初始颜色保持一致
                        'endColor' => [
                            'argb' => 'ffffff'
                        ]
                    ]
                ]);
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $event->sheet->freezePane('A2', 'A2');
                $event->sheet->getStyle('A9:J9')->applyFromArray([
                    'fill' => [
                        'fillType' => 'linear', //线性填充，类似渐变
                        'rotation' => 45, //渐变角度
                        'startColor' => [
                            'rgb' => 'c4eee7' //初始颜色
                        ],
                        //结束颜色，如果需要单一背景色，请和初始颜色保持一致
                        'endColor' => [
                            'argb' => 'c4eee7'
                        ]
                    ]
                ]);
                $event->sheet->getStyle('A10:A1000')->applyFromArray([
                    'fill' => [
                        'fillType' => 'linear', //线性填充，类似渐变
                        'rotation' => 45, //渐变角度
                        'startColor' => [
                            'rgb' => 'c4eee7' //初始颜色
                        ],
                        //结束颜色，如果需要单一背景色，请和初始颜色保持一致
                        'endColor' => [
                            'argb' => 'c4eee7'
                        ]
                    ]
                ]);
                $event->sheet->getStyle('A10:J1000')->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                    ]

                ]);
                $event->sheet->getStyle('A1:F8')->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ]

                ]);

                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(13);

            },
        ];
    }
}
