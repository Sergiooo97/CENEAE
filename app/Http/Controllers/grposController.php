<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\alumno;
class grposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('grupos.index');
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
    public function edit(Request $request, $grado, $grupo)
    {
        $grad = alumno::where('grado', $grado)->first();
        if (! $grad) {
            return \Redirect::back()->with('flash_error', 'No se ha encontrado');
        }
        $alumnos = alumno::find($grado);
        $alumnos = alumno::find($grupo);

        $alumnos = \App\alumno::orderBy('apellido_paterno', 'ASC')
        ->grado($grado)
        ->grupo($grupo)
        ->paginate(5);       
        return view('grupos.edit', compact('alumnos', 'grad'));

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
        foreach ($request->get('orden') as $key => $value) {
            $alumnos = alumno::find($id);
            $alumno = alumno::find($request->get('id')[$key]);
            $alumno->matricula = $value.$request->get('matricula')[$key].$request->get('periodo')[$key];
            $alumno->update();
        }
        return redirect(route('alumnos.index'));
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
