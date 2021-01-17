<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\curso;
use Illuminate\Support\Facades\DB;
class cursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $cursos = curso::all();        
        return response()->json($cursos);
    
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
        $cursos = curso::select(
            'cursos.id as curso_id',
            //'alumnos.id as alumno_id',
            'cursos.nombre as curso_nombre',
            //DB::raw("CONCAT(alumnos.nombres,' ', alumnos.apellido_paterno,' ', alumnos.apellido_materno) AS alumno_nombre"),
            DB::raw("CONCAT(alumnos.grado, '°', alumnos.grupo) as grado_grupo"),
        )
        ->join('cursos_alumnos', 'cursos.id', '=', 'cursos_alumnos.curso_id')
        ->join('alumnos', 'cursos_alumnos.alumno_id', '=', 'alumnos.id')
        ->where('alumnos.id', $id)
        ->get();      
        return response()->json($cursos);
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
