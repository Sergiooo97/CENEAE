<?php

namespace App\Http\Controllers\admin;

use RealRashid\SweetAlert\Facades\Alert;

use App\ndolar;
use App\ndolar_lista;
use App\alumno;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use ToSweetAlert;
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
        toast('Puedes depositar a un alumno o un grupo completo','info');
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
        toast('Puedes retirar a un alumno o un grupo completo','info');
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
                        //validation
            $request->validate([
                'cantidad.*' => 'required|integer'
            ],
            [
            'cantidad.*.required' => 'Estas dejando un campo vacio',
            'integer' => 'solo es posible escribir numeros',

            ]);  

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
        return redirect(route('ndolares.index'))->withSuccess('Se realizó el retiro correctamente!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
        return redirect(route('alumnos.show',['id'=> $request->input('id_alumno')]))->with('success', 'el '. $request->input('accion').' se realizó con éxito');
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
