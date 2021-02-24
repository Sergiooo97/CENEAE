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
use Barryvdh\DomPDF\PDF;
use App\alumno;
use App\grupo;
use App\ndolarTransacciones;
use App\Exports\sheets\asistenciaExport;
use App\Exports\sheets\listaAlumnoExport;
use App\Exports\sheets\ndolar\ndolarInfoExport;

use Maatwebsite\Excel\Facades\Excel;
class archivosController extends Controller
{
    public function index(){
        return view('role.admin.download.archivos.index');
    }

    public function export_asistencia($grupo){
      $grupos = grupo::where('id', $grupo)->first();
        $alumnos=alumno::where("grupo_id",$grupo)
        ->get();
        return Excel::download(new asistenciaExport($alumnos), $grupos->nombre." ASISTENCIA.xlsx");
}

    public function export_lista($grupo){
      $grupos = grupo::where('id', $grupo)->first(); 
      $alumnos=alumno::select(
        'alumnos.nombres as nombres',
        'alumnos.matricula as matricula',
        'alumnos.apellido_paterno as apellido_paterno',
        'alumnos.apellido_materno as apellido_materno',
        'alumnos.curp as curp',
        'alumnos.direccion as direccion', 
        'grupos.nombre as grupo',
        'tutores.nombres as nombres_tutor',
        'tutores.apellido_paterno as apellido_paterno_tutor',
        'tutores.apellido_materno as apellido_materno_tutor',
        'tutores.telefono as telefono_tutor'
      )
        ->leftJoin('grupos_alumnos', 'alumnos.id','=','grupos_alumnos.alumno_id')
        ->Join('grupos', 'grupos_alumnos.grupo_id', '=', 'grupos.id')
        ->Join('tutores', 'alumnos.id', '=', 'tutores.alumno_id')
        ->where("grupos_alumnos.grupo_id",$grupo)
        ->get();
        return Excel::download(new listaAlumnoExport($alumnos), $grupos->nombre." LISTA.xlsx");
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
    public function expedientePdf($id, $nombre)
    {
        
               //Muestra la tabla de caLificaciones
               $notas = notas::where('id' ,'>' ,0)
               ->pluck('id')->toArray();
           $bimestres_total = notas_structures::select('notas.curso_id as curso_id',\DB::raw('count(*) as Total'))
               ->leftJoin('notas', 'notas_structures.nota_id', '=', 'notas.id')
               ->groupBy('curso_id')
               ->get();
               $alumno = alumno::select(
                'alumnos.id as id',
                'alumnos.nombres as nombres',
                'alumnos.apellido_paterno as apellido_paterno',
                'alumnos.apellido_materno as apellido_materno',
                'grupos.id as grupo'
            )
            ->leftjoin('grupos_alumnos', 'alumnos.id', '=','grupos_alumnos.alumno_id')
            ->leftJoin('grupos', 'grupos_alumnos.grupo_id', '=', 'grupos.id')
            ->where('alumnos.id', $id)->first();
            $cursos = curso::where('grupo_id', $alumno->grupo)
                ->pluck('id', 'nombre')->toArray();
            $cursos_nombre = curso::where('grupo_id', $alumno->grupo)
                ->get();
           $ns = notas_structures::select('notas_structures.nombre as structure_nombre')
               ->leftJoin('notas', 'notas_structures.nota_id', '=', 'notas.id')
               ->leftJoin('cursos', 'notas.curso_id', '=', 'cursos.id')
               ->groupBy('structure_nombre')->orderBy('structure_nombre','ASC')
               ->get();
   
               $promedio = curso::select(
                   'cursos.nombre as crs_nombre',
                   'nota',
                   'notas_structures.id as ns_id',
                   'notas_values.periodos_rangos_id as per.id',
                   'notas_structures.nombre as ns_nombre',
                   'cursos.id as curso_id',
                   \DB::raw('count(*) as Total'))
                   ->leftJoin('notas', 'cursos.id', '=', 'notas.curso_id')
                   ->leftJoin('notas_structures', 'notas.id', '=', 'notas_structures.nota_id')
                   ->leftJoin('notas_values', 'notas_structures.id', '=', 'notas_values.nota_structures_id')
                   ->orderBy('notas_values.periodos_rangos_id','ASC')
                   ->orderBy('notas_structures.id','ASC')
                   ->groupBy('crs_nombre')
                   ->groupBy('cursos.id', 'nota','ns_id', 'notas_values.periodos_rangos_id','ns_nombre' )
                   ->where('alumno_id', $id)
                   ->get();
   
           $promedioFIN = notas_values::select('periodos_rangos_id', 'notas.curso_id', \DB::raw('AVG(nota) as prom'))
               ->leftJoin('notas_structures', 'notas_values.nota_structures_id', '=', 'notas_structures.id')
               ->leftJoin('notas', 'notas_structures.nota_id', '=', 'notas.id')
               ->where('alumno_id', $id)
               ->groupBy('periodos_rangos_id', 'curso_id')->orderBy('periodos_rangos_id','ASC')
               ->get();
           $promedioFINAL = notas_values::select('alumno_id','notas.curso_id as curso_id', \DB::raw('AVG(nota) as prom'))
               ->leftJoin('notas_structures', 'notas_values.nota_structures_id', '=', 'notas_structures.id')
               ->leftJoin('notas', 'notas_structures.nota_id', '=', 'notas.id')
               ->where('alumno_id', $id)
               ->groupBy('alumno_id', 'curso_id')->orderBy('alumno_id','ASC')
               ->get();
   
   
           $periodos = periodos_rangos::select('id','nombre', 'abreviacion')
               ->where('periodo_id',\Session::get('idPeriodo'))
               ->orderBy('abreviacion','ASC')->get();

        $ndolar = \App\ndolarTransacciones::select(
            'ndolar_transacciones.cantidad as cantidad',
            'ndolar_transacciones.accion as accion',
            'ndolar_transacciones.created_at',
            'alumnos.id as alumno_id',
            'ndolar_transacciones.comentario as comentario'
        )
    
        ->join('alumnos', 'ndolar_transacciones.alumno_id', '=', 'alumnos.id')
        ->orderBy('created_at','desc')
        ->where('alumnos.id', '=', $id)
        ->get();

        $ndolar_t = ndolar_lista::where('alumno_id',$id)
        ->first();
        $alumnos = alumno::select(
            'alumnos.id',
            'alumnos.matricula',
            'alumnos.nombres',
            'alumnos.apellido_paterno',
            'alumnos.apellido_materno',
            'alumnos.edad',
            'alumnos.fecha_de_nacimiento as nacimiento',
            'alumnos.curp as curp',
            'grupos.nombre as grupo_nombre',
            'alumnos.municipio',
            'alumnos.cp',
            'alumnos.direccion',
            'alumnos.created_at',
            'grupos.nombre as grupo',
            'alumnos.sexo',
            'alumnos.peso',
            'alumnos.estatura',
            'statuses.nombre as status_id',
            'alumnos.regularidad',
            'alumnos.escuela_procedencia',
            'tutores.nombres as nombres_tutor',
            'tutores.telefono as telefono_tutor',
            'tutores.edad as edad_tutor',
            'tutores.fecha_de_nacimiento as fecha_nacimiento_tutor',
            'tutores.codigo_postal as cp_tutor',
            'tutores.direccion as direccion_tutor',
            'tutores.apellido_paterno as apellido_paterno_tutor',
            'tutores.apellido_materno as apellido_materno_tutor',
            'tutores.escolaridad as escolaridad_tutor',
            'tutores.curp as curp_tutor',
            'ndolar_listas.cantidad as ndolar_cantidad',
            'tutores.correo as correo_tutor')
            ->join('statuses', 'alumnos.status_id', '=','statuses.id')
            ->leftJoin('tutores', 'alumnos.id', '=', 'tutores.alumno_id')
            ->join('ndolar_listas', 'alumnos.id', '=', 'ndolar_listas.alumno_id')
            ->join('grupos_alumnos', 'alumnos.id', '=', 'grupos_alumnos.alumno_id')
            ->join('grupos', 'alumnos.id', '=', 'grupos_alumnos.grupo_id')
            ->where('alumnos.id', $id)
            ->first();

        $pdf = \PDF::loadView('role.admin.download.pdf.expediente', compact('periodos','promedioFIN','bimestres_total', 'promedioFINAL', 'ns', 'promedio','cursos', 'cursos_nombre','alumno','ndolar', 'ndolar_t', 'alumnos'));
        return $pdf->stream('exp de '.$id.'.pdf')->download('exp de '.$id.'.pdf'); 
    

    }
}
