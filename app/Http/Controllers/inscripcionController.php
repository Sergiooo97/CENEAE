<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\alumno;
class inscripcionController extends Controller
{
/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inscripcion.index');
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
