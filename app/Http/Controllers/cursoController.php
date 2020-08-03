<?php

namespace App\Http\Controllers;

use App\alumno;
use App\curso;
use App\periodo;
use App\periodos_rangos;
use Illuminate\Http\Request;

class cursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $period = periodo::select('id')->orderBy('año','DESC')->take(1)->first();
        if(!is_null($period))
            if(!(\Session::has('idPeriodo')))
                \Session::put('idPeriodo',$period->id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = curso::select(
            'cursos.nombre as nombre_curso',
            'periodos.nombre as nombre_periodo',
            'cursos.clave as descripcion')
            ->join('periodos', 'cursos.periodo_id', '=', 'periodos.id')
            ->where('periodo_id',\Session::get('idPeriodo'))
            ->get();
        return view('role.admin.menus.cursos', compact('cursos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $per = new curso();
        $per->nombre = $request->input('Nombre');
        $per->clave = $request->input('clave');
        $per->grado = $request->input('grado');
        $per->grupo = $request->input('grupo');
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
        return redirect(route('app.period.page'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
