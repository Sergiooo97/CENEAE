<?php

namespace App\Http\Controllers;

use App\alumno;
use App\curso;
use App\periodo;
use App\periodos_rangos;
use App\docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $period = periodo::select('id')->orderBy('año_inicio','DESC')->take(1)->first();
        if(!is_null($period))
            if(!(\Session::has('idPeriodo')))
                \Session::put('idPeriodo',$period->id);
    }

    public function index()
    {
        $cursos = curso::select(
            'cursos.nombre as nombre_curso',
            'periodos.nombre as nombre_periodo',
            'cursos.clave as descripcion')
            ->join('periodos', 'cursos.periodo_id', '=', 'periodos.id')
            ->where('periodo_id',\Session::get('idPeriodo'))
            ->get();
            $docentes = docente::select(
                'docentes.id as id',
                DB::raw("CONCAT(docentes.nombres, ' ', docentes.apellido_paterno, ' ', docentes.apellido_materno) as nombres")
            )
            ->orderBy('apellido_paterno', 'ASC')
            ->get();
        return view('role.admin.menus.cursos', compact('cursos', 'docentes'));
    }

    public function store(Request $request)
    {
        $per = new curso();
        $per->nombre = $request->input('Nombre');
        $per->clave = $request->input('clave');
        $per->grado = $request->input('grado');
        $per->grupo = $request->input('grupo');
        $per->docente_id = $request->input('docente');
        $per->periodo_id = \Session::get('idPeriodo');
        $per->save();

        $alumnos = alumno::where('id' ,'>' ,0)
            ->where('grado', $request->input('grado'))
            ->where('grupo', $request->input('grupo'))
            ->pluck('id')->toArray();
        foreach($alumnos as $alumno){
            $per->students()->attach($alumno);
        }
        $periodo = periodo::find(\Session::get('idPeriodo'));

        $request->session()->forget('idPeriodo');
        return redirect(route('curso.index'));

    }
}
