<?php

namespace App\Http\Controllers\admin;
use App\alumno;

use App\curso;
use App\notas;
use App\notas_structures;
use App\notas_values;
use App\periodos_rangos;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class calificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $notas = notas::select(
            'notas.id as nota_id',
            'notas.nombre as nota_nombre',
            'notas.descripcion as descripcion',
            'cursos.id as curso_id',
            'cursos.nombre as curso_nombre')
            ->join('cursos', 'cursos.id', '=', 'notas.curso_id')
            ->where('periodo_id',\Session::get('idPeriodo'))
            ->get();

        $cursosConfigurables = curso::select('id','nombre')
            ->where('periodo_id',\Session::get('idPeriodo'))
            ->get();
        $cursos = curso::select('id','nombre')->orderBy('nombre','ASC')
            ->where('periodo_id',\Session::get('idPeriodo'))
            ->get();

        return view('role.admin.calificaciones.index', compact('cursos', 'cursosConfigurables', 'notas'));
    }
    public function asignarIndex()
    {
        $cursos = notas::select(
            'notas.id as nota_id',
            'notas.nombre as nota_nombre',
            'cursos.id as curso_id',
            'cursos.grado as grado',
            'cursos.grupo as grupo',
            'cursos.nombre as curso_nombre')
            ->join('cursos', 'cursos.id', '=', 'notas.curso_id')
            ->where('periodo_id',\Session::get('idPeriodo'))
            ->get();
        $periodos = periodos_rangos::where('periodo_id',\Session::get('idPeriodo'))
            ->orderBy('nombre','ASC')
            ->get();
        return view('role.admin.calificaciones.asignarIndex', compact('cursos', 'periodos'));
    }
    public function detalles($id){

        $notas = notas::where('id' ,'>' ,0)
            ->pluck('id')->toArray();
        $bimestres_total = notas_structures::select('notas.curso_id as curso_id',\DB::raw('count(*) as Total'))
            ->leftJoin('notas', 'notas_structures.nota_id', '=', 'notas.id')
            ->groupBy('curso_id')
            ->get();
        $alumno = alumno::where('id', $id)->first();
        $cursos = curso::where('grado', $alumno->grado)
            ->where('grupo', $alumno->grupo)
            ->pluck('id', 'nombre')->toArray();
        $cursos_nombre = curso::where('grado', $alumno->grado)
            ->where('grupo', $alumno->grupo)
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
        $cursos = curso::where('id', $curso_id)->get();
        $alumnos = \App\alumno::orderBy('apellido_paterno', 'ASC')
            ->where('grado', $curso_grado)
            ->where('grupo', $curso_grupo)
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
        $notas = new notas();
        $notas->nombre = $request->input('Nombre');
        $notas->descripcion = $request->input('Descripcion');
        $notas->curso_id = $request->input('Curso');
        $notas->save();

        return redirect(route('calificaciones.index'));
    }
    public function valueStore(Request $request)
    {
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
        $notas_structures = new notas_structures();
        $notas_structures->nombre = $request->input('nombre');
        $notas_structures->nota_id = $request->input('nota_id');
        $notas_structures->save();

        return redirect()->back();
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
