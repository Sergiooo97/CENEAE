<?php

namespace App\Http\Controllers\admin;
use App\ndolar_lista;
use App\Role;
use App\tutor;
use App\User;
use Illuminate\Http\Request;
use App\alumno;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
class alumnosController extends Controller
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
        $alumnos = \App\alumno::orderBy('grado', 'ASC')
        ->nombres($nombres)
        ->grado($grado)
        ->grupo($grupo)
        ->paginate(5);
        return view('role.admin.alumnos.index', compact('alumnos'));
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
        return view('role.admin.alumnos.listaOrden', compact('alumnos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        toast('Registro de alumnos :)','info');
        return view('role.admin.alumnos.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
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
                'grado' => 'required|integer',
                'grupo' => 'required|string',
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
            'grado.required' => 'Es necesario escribir grado',
            'grupo.required' => 'Es necesario escribir grupo',
            'direccion.max' => 'Direccion excede numero de caracteres',
            'direccion.required' => 'Es necesario escribir la dirección',
            'municipio.max' => 'municipio excede numero de caracteres',
            'municipio.required' => 'Es necesario escribir la municipio',
            'cp.required' => 'El código postal es necesario',
            'cp.integer' => 'El código postal solo puede ser numeros',

            ]);
        $alumno = new alumno();
        $alumno ->matricula = $request->input('matricula');
        $alumno ->nombres   = $request->input('nombres');
        $alumno ->apellido_paterno        = $request->input('apellido_paterno');
        $alumno ->apellido_materno        = $request->input('apellido_materno');
        $alumno ->edad    = $request->input('age');
        $alumno ->fecha_de_nacimiento    = $request->input('birthday');
        $alumno ->curp  = $request->input('curp');
        $alumno ->grado = $request->input('grado');
        $alumno ->grupo = $request->input('grupo');
        $alumno ->direccion = $request->input('direccion');
        $alumno ->municipio = $request->input('municipio');
        $alumno ->cp = $request->input('cp');
        $alumno->save();


        return redirect()->route('home');
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
        $ndolar_lista = ndolar_lista::where('alumno_id', $id)->first();
        $tutor = tutor::where('alumno_id', $id)->first();
        if ($alumnos==null){
         return view('errors.404');
        }else{
            $alumno = alumno::find($id)
            ->where('id', '=', $id)
            ->first();
            return view('role.admin.alumnos.show', compact('alumno', 'ndolar_lista', 'tutor'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
            return view('role.admin.alumnos.edit', compact('alumno'));
        }    }
    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $alumnos = alumno::find($id);
        $alumnos->update($request->all());
        return redirect(route('role.admin.alumnos.show', $id));
    }

    public function updateOrden(Request $request, $id)
    {
        foreach ($request->get('orden') as $key => $value) {
            $alumnos = alumno::find($id);
            $asistencia = alumno::find($request->get('id')[$key]);
            $asistencia->matricula = $value.$request->get('matricula')[$key];
            $asistencia->update();
        }
        return redirect(route('role.admin.alumnos.index'));
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
