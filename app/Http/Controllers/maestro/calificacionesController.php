<?php

namespace App\Http\Controllers\maestro;
use App\alumno;

use App\curso;
use App\notas;
use App\notas_structures;
use App\notas_values;
use App\periodos_rangos;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\periodo;
class calificacionesController 
{
    public function __construct()
    {
        $period = periodo::select('id')->orderBy('año_inicio','DESC')->take(1)->first();
        if(!is_null($period))
            if(!(\Session::has('idPeriodo')))
                \Session::put('idPeriodo',$period->id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //View para mostrar las opciones de las asignaturas a calificar
        $notas = notas::select(
            'notas.id as nota_id',
            'notas.nombre as nota_nombre',
            'notas.descripcion as descripcion',
            'cursos.id as curso_id',
            'cursos.nombre as curso_nombre')
            ->join('cursos', 'cursos.id', '=', 'notas.curso_id')
            ->where('periodo_id',\Session::get('idPeriodo'))
            ->where('docente_id', Auth()->user()->docente_id)
            ->get();

        $cursosConfigurables = curso::select('id','nombre')
            ->where('periodo_id',\Session::get('idPeriodo'))
            ->where('docente_id', Auth()->user()->docente_id)
            ->get();
        $cursos = curso::select('id','nombre')->orderBy('nombre','ASC')
            ->where('periodo_id',\Session::get('idPeriodo'))
            ->where('docente_id', Auth()->user()->docente_id)
            ->get();

        return view('role.admin.calificaciones.index', compact('cursos', 'cursosConfigurables', 'notas'));
    }
    public function asignarIndex()
    {
        //View que muestra las asignaturas listas para asignar calificacion.

        $cursos = notas::select(
            'notas.id as nota_id',
            'notas.nombre as nota_nombre',
            'cursos.id as curso_id',
            'cursos.grado as grado',
            'cursos.grupo as grupo',
            'cursos.nombre as curso_nombre')
            ->join('cursos', 'cursos.id', '=', 'notas.curso_id')
            ->where('periodo_id',\Session::get('idPeriodo'))
            ->where('docente_id', Auth()->user()->docente_id)
            ->get();
        $periodos = periodos_rangos::where('periodo_id',\Session::get('idPeriodo'))
            ->orderBy('nombre','ASC')
            ->get();
        return view('role.admin.calificaciones.asignarIndex', compact('cursos', 'periodos'));
    }
    public function detalles($id){
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
                'cursos.id as curso_id')
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
        return view('role.admin.calificaciones.detalles', compact('periodos','promedioFIN','bimestres_total', 'promedioFINAL', 'ns', 'promedio','cursos', 'cursos_nombre', 'alumno'));
    }
    public function asignar($curso_id,  $nota_id, $curso_grado, $curso_grupo)
    {
        //View en la que se asigna la calificación a una actividad por bimestre.
        $cursos = curso::where('id', $curso_id)->get();
        $alumnos = \App\alumno::select(
            'alumnos.id as id',
            'alumnos.nombres as nombres',
            'alumnos.apellido_paterno as apellido_paterno',
            'alumnos.apellido_materno as apellido_materno'
        )
        ->leftjoin('grupos_alumnos', 'alumnos.id', '=','grupos_alumnos.alumno_id')
        ->leftJoin('grupos', 'grupos_alumnos.grupo_id', '=', 'grupos.id')
        ->orderBy('alumnos.apellido_paterno', 'ASC')
            ->where('grupos_alumnos.grupo_id', $curso_grado)
            ->paginate(5);
        $notas = notas::where('id', $nota_id)->get();
        $actividades = notas_structures::where('nota_id', $nota_id)->get();
        $periodos = periodos_rangos::where('periodo_id',\Session::get('idPeriodo'))
            ->orderBy('nombre','ASC')
            ->get();

        return view('role.admin.calificaciones.asignarCreate', compact('cursos','actividades', 'periodos', 'notas', 'alumnos'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //Función para almacenar los datos de las nuevas notas.
        $notas = new notas();
        $notas->nombre = $request->input('Nombre');
        $notas->descripcion = $request->input('Descripcion');
        $notas->curso_id = $request->input('Curso');
        $notas->save();

        return redirect(route('calificaciones.index'));
    }
    public function valueStore(Request $request)
    {
            //Función para almacenar los datos de las calificaciones asignadas.
        foreach ($request->get('alumno_id') as $key => $value) {
            $notas_value = new notas_values();
            $notas_value->nota = $request->input('calificacion_value')[$key];
            $notas_value->nota_structures_id = $request->input('nota_id');
            $notas_value->alumno_id = $request->input('alumno_id')[$key];
            $notas_value->periodos_rangos_id = $request->input('periodo_id');
            $notas_value->save();
        }


        return back();


    }
    public function show($id)
    {
        $notas = notas::where('curso_id', $id)->first();
        if ($notas==null){
         return view('errors.404');
        }else{

            $notas = notas::where('curso_id', $id)->first();
            $lista=notas_structures::where('nota_id', $notas->id)->get();

            return view('role.admin.calificaciones.show', compact('notas', 'lista'));
        }
    }
    public function actividadStore(Request $request){
        //Función para almcacenar los datos de las actividades por materia.
        $notas_structures = new notas_structures();
        $notas_structures->nombre = $request->input('nombre');
        $notas_structures->nota_id = $request->input('nota_id');
        $notas_structures->save();

        return redirect()->back();
    }

}
