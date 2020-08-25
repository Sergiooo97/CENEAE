<?php

namespace App\Http\Controllers\admin;
use App\alumno;
use App\docente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class docentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = DB::table('docentes')
        ->paginate(5);
        
        return view('role.admin.docentes.index', compact('docentes'));

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
        
         //validation
         $request->validate([
            'nombres' => 'required|max:25|string',
            'apellido_paterno' => 'required|max:10|string',
            'apellido_materno' => 'required|max:10|string',
            'age' => 'required|integer',
            'birthday' => 'required|date',
            'curp' => 'required|max:18|string',
            'direccion' => 'required|max:25|string',
            'municipio' => 'required|max:10|string',
            'cp' => 'required|integer',


        ],
            [
                'nombres.required' => 'Nombres del alumno vacio :(',
                'nombres.max' => 'Nombres del alumno demaciado largo',
                'apellido_paterno.required' => 'Apellido paterno del alumno vacio :(',
                'apellido_paterno.max' => 'Apellido paterno excede número de caractares :(',
                'apellido_materno.required' => 'Apellido materno del alumno vacio :(',
                'apellido_materno.max' => 'Apellido materno excede número de caractares :(',
                'age.integer' => 'solo es posible escribir numeros para la edad',
                'age.required' => 'Campo edad vacio',
                'birthday.required' => 'Es necesario escribir la fecha de nacimiento',
                'birthday.date' => 'Solo el formato dd/mm/aaaa para la fecha de nacimiento',
                'curp.required' => 'Es necesario escribir curp',
                'curp.max' => 'El curp excede número maximo de caracteres',
                'direccion.max' => 'Direccion excede numero de caracteres',
                'direccion.required' => 'Es necesario escribir la dirección',
                'municipio.max' => 'municipio excede numero de caracteres',
                'municipio.required' => 'Es necesario escribir la municipio',
                'cp.required' => 'El código postal es necesario',
                'cp.integer' => 'El código postal solo puede ser numeros',

            ]);
        $docente = new docente();
        $docente->matricula = $request->input('matricula');
        $docente->nombres = $request->input('nombres');
        $docente->apellido_paterno = $request->input('apellido_paterno');
        $docente->apellido_materno = $request->input('apellido_materno');
        $docente->edad = $request->input('age');
        $docente->fecha_de_nacimiento = $request->input('birthday');
        $docente->curp = $request->input('curp');
        $docente->direccion = $request->input('direccion');
        $docente->municipio = $request->input('municipio');
        $docente->cp = $request->input('cp');
        $docente->telefono = $request->input('telefono');
        $docente->correo = $request->input('email');
        $docente->RFC = $request->input('rfc');
        $docente->save();
    }
    public function show($id)
    {
        $docentes = docente::find($id)
        ->first();
        return view('role.maestro.show', compact('docentes'));
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
