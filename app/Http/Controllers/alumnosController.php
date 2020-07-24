<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\alumno;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class alumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombres = $request->get('nombres');
        $grado = $request->get('grado');
        $grupo = $request->get('grupo');
        $alumnos = \App\alumno::orderBy('grado', 'ASC')
        ->nombres($nombres)
        ->grado($grado)
        ->grupo($grupo)
        ->paginate(5);       
        return view('alumnos.index', compact('alumnos'));
    }

    public function orden(Request $request){
        $nombres = $request->get('nombres');
        $grado = $request->get('grado');
        $grupo = $request->get('grupo');
        $alumnos = \App\alumno::orderBy('apellido_paterno', 'ASC')
        ->nombres($nombres)
        ->grado('1')
        ->grupo($grupo)
        ->paginate(5);       
        return view('alumnos.listaOrden', compact('alumnos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new alumno();
        $users ->matricula = $request->input('matricula');
        $users ->nombres   = $request->input('nombres');
        $users ->apellido_paterno        = $request->input('apellido_paterno');
        $users ->apellido_materno        = $request->input('apellido_materno');
        $users ->edad    = $request->input('age');
        $users ->fecha_de_nacimiento    = $request->input('birthday');
        $users ->curp  = $request->input('curp');
        $users ->grado = $request->input('grado');
        $users ->grupo = $request->input('grupo');
        $users ->direccion = $request->input('direccion');
        $users ->municipio = $request->input('municipio');
        $users ->cp = $request->input('cp');
        $users ->ndolares = '0';
        $users ->quiero_ser = $request->input('quiero_ser');
        $users ->nombres_tutor = $request->input('nombres_tutor');
        $users ->apellido_paterno_tutor = $request->input('apellido_paterno_tutor');
        $users ->apellido_materno_tutor = $request->input('apellido_materno_tutor');
        $users ->direccion_tutor = $request->input('direccion_tutor');
        $users ->escolaridad_tutor = $request->input('escolaridad_tutor');
        $users ->curp_tutor = $request->input('curp_tutor');
        $users ->telefono_tutor = $request->input('telefono_tutor');
        $users->save();
        return redirect()->route('home');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumnos = alumno::find($id);
        if ($alumnos==null){
         return view('errors.404');
        }else{
            $alumno = alumno::find($id)
            ->where('id', '=', $id)
            ->first();

            return view('alumnos.show', compact('alumno'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumnos = alumno::find($id);
        if ($alumnos==null){
         return view('errors.404');
        }else{
            $alumno = alumno::find($id)
            ->where('id', '=', $id)
            ->first();
            return view('alumnos.edit', compact('alumno'));
        }    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alumnos = alumno::find($id);
        $alumnos->update($request->all());
        return redirect(route('alumnos.show', $id));
    }

    public function updateOrden(Request $request, $id)
    {
        foreach ($request->get('orden') as $key => $value) {
            $alumnos = alumno::find($id);
            $asistencia = alumno::find($request->get('id')[$key]);
            $asistencia->matricula = $value.$request->get('matricula')[$key];
            $asistencia->update();
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
