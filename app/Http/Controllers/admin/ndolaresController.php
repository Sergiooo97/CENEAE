<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;
use ToSweetAlert;
use App\ndolarTransacciones;
use App\ndolar_lista;
use App\alumno;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ndolaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $nombres = $request->get('nombres');
        $grado = $request->get('grado');
        $grupo = $request->get('grupo');


        $alumnos = \App\ndolar_lista::select(
            'alumnos.matricula as matricula',
            'alumnos.id as alumno_id',
             'ndolar_listas.nombres as nombres',
             DB::raw("CONCAT(alumnos.grado, '°', alumnos.grupo) as grado_grupo"),
             'ndolar_listas.cantidad as cantidad'
             )
             ->join('alumnos', 'ndolar_listas.alumno_id', '=', 'alumnos.id')
        ->orderBy('ndolar_listas.grado', 'ASC')
        ->orderBy('ndolar_listas.grupo', 'ASC')
        ->nombres($nombres)
        ->grado($grado)
        ->grupo($grupo)
        ->paginate(5);

        return view('role.admin.ndolares.index', compact('alumnos'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function deposito(Request $request)
    {
        toast('Puedes depositar a un alumno o un grupo completo','info');
        $nombres = $request->get('nombres');
        $grado = $request->get('grado');
        $grupo = $request->get('grupo');
        $alumnos = \App\ndolar_lista::orderBy('grado', 'ASC')
        ->nombres($nombres)
        ->grado($grado)
        ->grupo($grupo)
        ->paginate(5);

        return view('role.admin.ndolares.deposito', compact('alumnos'));
    }
    public function retiro(Request $request)
    {
        toast('Puedes retirar a un alumno o un grupo completo','info');
                $nombres = $request->get('nombres');
        $grado = $request->get('grado');
        $grupo = $request->get('grupo');
        $alumnos = \App\ndolar_lista::orderBy('grado', 'ASC')
        ->nombres($nombres)
        ->grado($grado)
        ->grupo($grupo)
        ->paginate(5);
        return view('role.admin.ndolares.retiro', compact('alumnos'));
    }
    public function insertarDeposito(Request $request)
    {
                        //validation
            $request->validate([
                'cantidad.*' => 'required|integer'
            ],
            [
            'cantidad.*.required' => 'Estas dejando un campo vacio',
            'integer' => 'solo es posible escribir numeros',
            ]);
            
        foreach ($request->get('cantidad') as $key => $value) {
            $ndolarActual = ndolar_lista::where('alumno_id', $request->input('id_alumno'))->first();
            $asistencia = new ndolarTransacciones;
            $asistencia->lista_id =  $request->get('id_alumno')[$key];
            $asistencia->matricula= $request->get('matricula')[$key];
            $asistencia->nombre= $request->get('nombre')[$key];
            $asistencia->accion= 'deposito';
            $asistencia->nuevo= $ndolarActual->cantidad + $value;
            $asistencia->cantidad = $value;
            $asistencia->save();
        }
        return redirect(route('ndolares.index'))->withSuccess('Se realizó el deposito correctamente!');
    }
    public function insertarRetiro(Request $request)
    {
        //validation
  $request->validate([
        'cantidad.*' => 'required|integer'
  ],
  [
    'cantidad.*.required' => 'Estas dejando un campo vacio',
    'integer' => 'solo es posible escribir numeros',
  ]);
        foreach ($request->get('cantidad') as $key => $value) {
            $ndolarActual = ndolar_lista::where('alumno_id', $request->input('id_alumno'))->first();
            $asistencia = new ndolarTransacciones;
            $asistencia->lista_id =  $request->get('id_alumno')[$key];
            $asistencia->matricula= $request->get('matricula')[$key];
            $asistencia->nombre= $request->get('nombre')[$key];
            $asistencia->accion= 'retiro';
            $asistencia->nuevo= $ndolarActual->cantidad - $value;
            $asistencia->cantidad = $value;
            $asistencia->save();
        }
        return redirect(route('ndolares.index'))->withSuccess('Se realizó el retiro correctamente!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cantidad' => 'required|integer'
        ],['cantidad.required' => 'Debe ingresar una cantidad',
           'cantidad.integer' => 'Solo se permite numeros como cantidad']);

        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }
                    //validation
                  /*  $request->validate([
                        'cantidad' => 'required|integer'
                    ],
                    [
                    'cantidad.required' => 'Es necesario escribir una cantidad',
                    'cantidad.integer' => 'solo es posible escribir numeros para la cantiad',
                    ]); */
        $ndolarActual = ndolar_lista::where('alumno_id', $request->input('id_alumno'))->first();
        $users = new ndolarTransacciones();
        $users ->lista_id       = $request->input('id_alumno');
        $users ->matricula       = $request->input('matricula');
        $users ->nombre   = $request->input('nombre');
        $users ->accion        = $request->input('accion');
        $users ->cantidad        = $request->input('cantidad');
        if($request->input('accion') == "deposito"){
            $users ->nuevo        = $ndolarActual->cantidad + $request->input('cantidad') ;
        }else{
            $users ->nuevo        = $ndolarActual->cantidad - $request->input('cantidad') ;
        }
        $users ->comentario = $request->input('comentario');
        $users->save();
        return redirect(route('alumnos.show',['id'=> $request->input('id_alumno')]))->with('success', 'el '. $request->input('accion').' se realizó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $alumnos = alumno::find($id);
        $id_alumno = alumno::find($id);
            $alumnos = \App\ndolarTransacciones::orderBy('created_at','desc')
            ->where('lista_id', '=', $id)
            ->paginate(5);
        $alumno_matricula = alumno::find($id)->first();

            return view('role.admin.ndolares.show', compact('alumnos', 'id_alumno', 'alumno_matricula'));
       // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
