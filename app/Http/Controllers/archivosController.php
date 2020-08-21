<?php

namespace App\Http\Controllers;

use App\curso;
use App\Exports\sheets\calificacionesExport;
use App\ndolar_lista;
use App\notas;
use App\notas_structures;
use App\notas_values;
use App\periodos_rangos;
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
    public function export_calificacion($id){

        $promedio = curso::select(
            'alumnos.nombres as alumno_nombre',
            'alumnos.id as alumno_id',
            'cursos.nombre as crs_nombre',
            'notas_structures.id as ns_id',
            'notas_structures.nombre as ns_nombre',
            'cursos.id as curso_id',
            'periodos_rangos.nombre as pr_nombre',
            \DB::raw('AVG(notas_values.nota) as prom'))
            ->leftJoin('notas', 'cursos.id', '=', 'notas.curso_id')
            ->leftJoin('notas_structures', 'notas.id', '=', 'notas_structures.nota_id')
            ->leftJoin('notas_values', 'notas_structures.id', '=', 'notas_values.nota_structures_id')
            ->leftJoin('periodos_rangos', 'notas_values.periodos_rangos_id', '=', 'periodos_rangos.id')
            ->leftJoin('alumnos', 'notas_values.alumno_id', '=', 'alumnos.id')
            ->groupBy('crs_nombre', 'pr_nombre')
            ->groupBy('cursos.id', 'ns_id', 'alumno_id', 'alumno_nombre' )
            ->where('alumno_id', $id)
            ->get();
        $periodos = periodos_rangos::select('id','nombre', 'abreviacion')
            ->where('periodo_id',\Session::get('idPeriodo'))
            ->orderBy('abreviacion','ASC')->get();
        $ns = notas_structures::select('notas_structures.nombre as structure_nombre')
            ->leftJoin('notas', 'notas_structures.nota_id', '=', 'notas.id')
            ->leftJoin('cursos', 'notas.curso_id', '=', 'cursos.id')
            ->groupBy('structure_nombre')->orderBy('structure_nombre','ASC')
            ->get();
        $cursos_nombre = curso::where('grado', '1')
            ->where('grupo', 'A')
            ->get();

        $cursos = curso::where('grado', '1')
            ->where('grupo', 'A')
            ->pluck('id', 'nombre')->toArray();


        return Excel::download(new calificacionesExport($promedio, $periodos, $ns, $cursos, $cursos_nombre), $id." LISTA.xlsx");
    }                                                 // 'periodos','promedioFIN','bimestres_total', 'promedioFINAL', 'ns', 'promedio','cursos', 'cursos_nombre', 'alumno'
    public function export_ndolar_info($id, $nombre){
        $alumnos=ndolarTransacciones::where("lista_id",$id)
        ->get();
        $alumno_n = alumno::select('alumnos.matricula as matricula', 'alumnos.nombres as nombres', 'ndolar_listas.cantidad as total')
            ->join('ndolar_listas', 'alumnos.id', '=', 'ndolar_listas.alumno_id')
            ->where('alumnos.id', $id)
            ->first();

        return Excel::download(new ndolarInfoExport($alumnos, $alumno_n), $nombre." Ndolares.xlsx");
    }
}
