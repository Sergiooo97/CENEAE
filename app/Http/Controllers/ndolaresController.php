<?php

namespace App\Http\Controllers;
use App\ndolar;
use App\ndolar_lista;
use App\alumno;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ndolaresController extends Controller
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


        $alumnos = \App\ndolar_lista::orderBy('grado', 'ASC')
        ->orderBy('grado', 'ASC')->orderBy('grupo', 'ASC')
        ->nombres($nombres)
        ->grado($grado)
        ->grupo($grupo)
        ->paginate(5);
        return view('ndolares.index', compact('alumnos'));    
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deposito(Request $request)
    {
        $nombres = $request->get('nombres');
        $grado = $request->get('grado');
        $grupo = $request->get('grupo');
        $alumnos = \App\ndolar_lista::orderBy('grado', 'ASC')
        ->nombres($nombres)
        ->grado($grado)
        ->grupo($grupo)
        ->paginate(5);       
        return view('ndolares.deposito', compact('alumnos'));
    }
    public function retiro(Request $request)
    {
        $nombres = $request->get('nombres');
        $grado = $request->get('grado');
        $grupo = $request->get('grupo');
        $alumnos = \App\ndolar_lista::orderBy('grado', 'ASC')
        ->nombres($nombres)
        ->grado($grado)
        ->grupo($grupo)
        ->paginate(5);       
        return view('ndolares.retiro', compact('alumnos'));
    }
 public function insertarDeposito(Request $request)
    {
        foreach ($request->get('cantidad') as $key => $value) {
            $asistencia = new ndolar;
            $asistencia->id_alumno =  $request->get('id_alumno')[$key];
            $asistencia->matricula= $request->get('matricula')[$key];
            $asistencia->nombre= $request->get('nombre')[$key];
            $asistencia->accion= 'deposito';
            $asistencia->antes= '0';
            $asistencia->nuevo= '0';
            $asistencia->cantidad = $value;
            $asistencia->save();
        }
        return redirect(route('ndolares.deposito'));
    }
    public function insertarRetiro(Request $request)
    {
        foreach ($request->get('cantidad') as $key => $value) {
            $asistencia = new ndolar;
            $asistencia->id_alumno =  $request->get('id_alumno')[$key];
            $asistencia->matricula= $request->get('matricula')[$key];
            $asistencia->nombre= $request->get('nombre')[$key];
            $asistencia->accion= 'retiro';
            $asistencia->antes= '0';
            $asistencia->nuevo= '0';
            $asistencia->cantidad = $value;
            $asistencia->save();
        }
        return redirect(route('ndolares.retiro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $users = new ndolar();
        $users ->id_alumno       = $request->input('id_alumno');
        $users ->matricula       = $request->input('matricula');
        $users ->nombre   = $request->input('nombre');
        $users ->accion        = $request->input('accion');
        $users ->cantidad        = $request->input('cantidad');
        $users ->antes        = $request->input('antes');
        $users ->nuevo        = $request->input('actual');
        $users ->comentario = $request->input('comentario');
        $users->save();
        return back();

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
        $id_alumno = alumno::find($id);

        //if ($alumnos==null){
 
        // return view('errors.404');
        //}else{
            $alumnos = \App\ndolar::orderBy('created_at','desc')
            ->where('id_alumno', '=', $id)
            ->paginate(5);
            

            return view('ndolares.show', compact('alumnos', 'id_alumno'));
       // }
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
