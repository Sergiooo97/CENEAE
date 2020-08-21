<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\alumno;
use App\curso;
use App\periodo;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $period = periodo::select('id')->orderBy('año','DESC')->take(1)->first();
        if(!is_null($period))
            if(!(\Session::has('idPeriodo')))
                \Session::put('idPeriodo',$period->id);
    }
    protected $layout = 'layouts.app';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = alumno::select(
            'alumnos.nombres as nombres',
            'alumnos.grado as grado',
            'ndolar_listas.cantidad as ndolar_cantidad'
        )
        ->join('ndolar_listas', 'alumnos.id', '=', 'ndolar_listas.alumno_id')
        ->where('alumnos.id', auth()->user()->alumno_id)
        ->first();
        
        $cursos = curso::select(
            'cursos.nombre as curso_nombre',
            'cursos.id as curso_id'
        )
        ->join('cursos_alumnos', 'cursos.id', '=', 'cursos_alumnos.curso_id')
        ->where('cursos_alumnos.alumno_id', auth()->user()->alumno_id)
        ->first();
        return view('role.user.home', compact('alumnos', 'cursos'));
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
        //
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
