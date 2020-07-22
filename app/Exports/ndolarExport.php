<?php

namespace App\Exports;

use App\ndolar_lista;
use App\Exports;

use App\Exports\sheets\ndolarPerGrupo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
Use \Maatwebsite\Excel\Sheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
class ndolarExport  implements WithMultipleSheets, WithHeadings
{

    use Exportable;

    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Created at',
            'Updated at'
        ];
    }
  
    protected $year;
    
    public function __construct(int $year)
    {
        $this->year = $year;
    }

    /**
     * @return array
     */
    public function sheets(): array
    {
     
        $sheets = [];

        for ($grado = 1; $grado <= 6; $grado++) {
            $sheets[] = new ndolarPerGrupo($this->year, $grado);
        }
        return $sheets;
    }
}

