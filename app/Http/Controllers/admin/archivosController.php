<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\alumno;
use App\ndolarTransacciones;
use App\Exports\sheets\asistenciaExport;
use App\Exports\sheets\listaAlumnoExport;
use App\Exports\sheets\ndolar\ndolarInfoExport;

use Maatwebsite\Excel\Facades\Excel;
class archivosController extends Controller
{
    public function index(){
        return view('download.archivos.index');
    }

    public function export_asistencia($grado, $grupo){
        $alumnos=alumno::where("grado",$grado)
        ->where("grupo",$grupo)
        ->get();
        return Excel::download(new asistenciaExport($alumnos), $grado.$grupo." ASISTENCIA.xlsx");
}

    public function export_lista($grado, $grupo){
        $alumnos=alumno::where("grado",$grado)
        ->where("grupo",$grupo)
        ->get();
        return Excel::download(new listaAlumnoExport($alumnos), $grado.$grupo." LISTA.xlsx");
    }
    public function export_ndolar_info($id, $nombre){
        $alumnos=ndolarTransacciones::where("lista_id",$id)
        ->get();
        return Excel::download(new ndolarInfoExport($alumnos), $nombre." Ndolares.xlsx");
    }
}
