<?php

namespace App\Http\Controllers\api;

use App\alumno;
use App\tutor;
use App\curso;
use App\Http\Controllers\Controller;
use App\ndolarTransacciones;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class alumnos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $p=alumno::select(
                DB::raw("CONCAT(alumnos.nombres, ' ', alumnos.apellido_paterno, ' ', alumnos.apellido_materno) as nombres"),
                'alumnos.edad as edad',
                'grupos.nombre as grupo',
                'tutores.telefono as telefono',
                'ndolar_listas.cantidad as ndolar_cantidad'
            )
            ->leftJoin('grupos', 'alumnos.grupo_id', '=', 'grupos.id')
            ->leftJoin('ndolar_listas', 'alumnos.id', '=', 'ndolar_listas.alumno_id')
            ->leftJoin('tutores', 'alumnos.id', '=', 'tutores.alumno_id')
            ->orderBy("alumnos.apellido_paterno","asc")->get();
            return response()->json($p, 200);
    }

    public function store(Request $request)
    {

        $p=new alumno($request->all());
        $p->save();
        $tutor = new tutor();
        $tutor->alumno_id = $p->id;
        $tutor->nombres = $request->get('nombre_tutor');
        $tutor->apellido_paterno = $request->get('apellido_paterno_t');
        $tutor->apellido_materno = $request->get('apellido_materno_t');
        $tutor->direccion = $request->get('direccion_t');
        $tutor->codigo_postal = $request->get('cp_t');
        $tutor->telefono = $request->get('telefono');
        $tutor->correo = $request->get('correo_t');
        $tutor->save();
        return response()->json($p, 200);

    }

    public function ndolarStore(Request $request)
    {
        $ndolar = new ndolarTransacciones();
     $ndolar->lista_id = $request->get('lista_id');
        $ndolar->cantidad = $request->get('cantidad');
        $ndolar->accion = $request->get('accion');
        $ndolar->save();
        return $ndolar;
        return response()->json($ndolar, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = alumno::find($id)->select(
            'alumnos.id',
            'alumnos.matricula as matricula',
            'alumnos.nombres as nombres',
            'alumnos.apellido_paterno as apellido_paterno',
            'alumnos.apellido_materno as apellido_materno',
            'alumnos.edad',
            'alumnos.fecha_de_nacimiento',
            'alumnos.curp',
            'alumnos.grado',
            'alumnos.grupo',
            'alumnos.municipio',
            'alumnos.cp',
            'alumnos.direccion',
            'tutores.nombres as nombres_tutor',
            'tutores.telefono as telefono_tutor',
            'tutores.direccion as direccion_tutor',
            'tutores.apellido_paterno as apellido_paterno_tutor',
            'tutores.apellido_materno as apellido_materno_tutor',
            'tutores.escolaridad as escolaridad_tutor',
            'tutores.curp as curp_tutor',
            'ndolar_listas.cantidad as ndolar_cantidad',
            'tutores.correo as correo_tutor')
            ->join('tutores', 'alumnos.id', '=', 'tutores.alumno_id')
            ->join('ndolar_listas', 'alumnos.id', '=', 'ndolar_listas.alumno_id')
            ->where('alumnos.id', $id)
            ->first();

        return response()->json($alumno);

    }

}
