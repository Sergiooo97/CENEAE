<?php

namespace App\Http\Controllers\admin;
use App\Calculos;
use App\curso;
use App\cursos_alumnos;
use App\ndolar_lista;
use App\notas;
use App\notas_structures;
use App\notas_values;
use App\periodo;
use App\periodos_rangos;
use App\Role;
use App\tutor;
use App\User;
use App\grupo;
use Illuminate\Http\Request;
use App\alumno;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use RealRashid\SweetAlert\Facades\Alert;
use ToSweetAlert;
use Mpdf\Tag\Input;

class alumnosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $period = periodo::select('id')->orderBy('año_inicio','DESC')->take(1)->first();
        if(!is_null($period))
            if(!(\Session::has('idPeriodo')))
                \Session::put('idPeriodo',$period->id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */ 
    public function index(Request $request)
    {
    

        $grupo_id = grupo::where('id', $request->get('grupo'))
        ->first();
        $nombres = $request->get('nombres');
        $grado = $request->get('grado');
        $grupo = $request->get('grupo');
        $grupos = grupo::all();
        $alumnos = \App\alumno::select(
            'alumnos.id as id',
            'alumnos.matricula as matricula',
            DB::raw("CONCAT(alumnos.nombres, ' ', alumnos.apellido_paterno, ' ', alumnos.apellido_materno) as nombres"),
            'alumnos.curp as curp',
            'alumnos.direccion as direccion',
            'tutores.telefono as telefono',
            'grupos.nombre as grupo_nombre')
        ->join('tutores', 'alumnos.id', '=', 'tutores.alumno_id')
        ->join('grupos', 'alumnos.grupo_id', '=', 'grupos.id')
        ->orderBy('grupos.nombre', 'ASC')
        ->nombres($nombres)
        ->grupo($grupo)
        ->paginate(6);
       
        return view('role.admin.alumnos.index', compact('alumnos', 'grupos', 'grupo_id'));
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
        $grupos = grupo::all();
        toast('Registro de alumnos :)','info');
        return view('role.admin.alumnos.create', compact('grupos'));
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
                'grupo.required' => 'Es necesario escribir grupo',
                'direccion.max' => 'Direccion excede numero de caracteres',
                'direccion.required' => 'Es necesario escribir la dirección',
                'municipio.max' => 'municipio excede numero de caracteres',
                'municipio.required' => 'Es necesario escribir la municipio',
                'cp.required' => 'El código postal es necesario',
                'cp.integer' => 'El código postal solo puede ser numeros',

            ]);
        $alumno = new alumno();
        $alumno->matricula = "************";
        $alumno->nombres = $request->input('nombres');
        $alumno->apellido_paterno = $request->input('apellido_paterno');
        $alumno->apellido_materno = $request->input('apellido_materno');
        $alumno->edad = $request->input('age');
        $alumno->fecha_de_nacimiento = $request->input('birthday');
        $alumno->curp = $request->input('curp');
        $alumno->grado = "0";
        $alumno->grupo = "0";
        $alumno->grupo_id = $request->input('grupo');
        $alumno->direccion = $request->input('direccion');
        $alumno->correo = "x.xxxxx@ceneae.com";
        $alumno->municipio = $request->input('municipio');
        $alumno->cp = $request->input('cp');
        $alumno->save();

        $tutor = new tutor();
        $tutor->alumno_id = $alumno->id;
        $tutor->nombres = $request->input('nombres_tutor');
        $tutor->apellido_paterno = $request->input('apellido_paterno_tutor');
        $tutor->apellido_materno = $request->input('apellido_materno_tutor');
        $tutor->curp = "s";
        $tutor->direccion = $request->input('direccion_tutor');
        $tutor->correo = $request->input('direccion_tutor');
        $tutor->telefono = "991107455546";
        $tutor->escolaridad = "ocupacion";

        $tutor->save();

        $cursos = curso::where('id' ,'>' ,0)
            ->where('grado', $request->input('grado'))
            ->where('grupo', $request->input('grupo'))
            ->pluck('id')->toArray();
        foreach($cursos as $curso){
            $alumno->courses()->attach($curso);
        }
        return($tutor);
        return redirect()->route('home')->withSuccess('Se realizó el retiro correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param Request $request
     * @param $response
     * @return Response
     */
    public function show($id, Request $request)
    {
       
        $promedioCount = notas_values::select('notas.id as nota_idd', 'notas.nombre as nota_nombre', \DB::raw('AVG(nota) as prom'))
            ->join('notas_structures', 'notas_values.nota_structures_id', '=', 'notas_structures.id')
            ->join('notas', 'notas_structures.nota_id', '=', 'notas.id')
            ->where('alumno_id', $id)
            ->groupBy('nota_idd')
            ->groupBy('notas.nombre')
            ->orderBy('prom','ASC')
            ->take(3)
            ->get();

        $alumno = alumno::find($id)->first();
        $cal = new Calculos;
        $periodos = periodos_rangos::select('id','nombre', 'abreviacion')
            ->where('periodo_id',\Session::get('idPeriodo'))
            ->orderBy('abreviacion','ASC')->get();  
        $promedio_curso = curso::where('id', $request->input('n_id') )->first();
        $promedio = notas_values::select('periodos_rangos_id', \DB::raw('AVG(nota) as prom'))
            ->join('notas_structures', 'notas_values.nota_structures_id', '=', 'notas_structures.id')
            ->join('notas', 'notas_structures.nota_id', '=', 'notas.id')
            ->where('notas.curso_id', $request->input('n_id'))
            ->groupBy('periodos_rangos_id')->orderBy('periodos_rangos_id','ASC')
            ->get();
        $promedioFIN = notas_values::select('alumno_id', \DB::raw('AVG(nota) as prom'))
            ->join('notas_structures', 'notas_values.nota_structures_id', '=', 'notas_structures.id')
            ->join('notas', 'notas_structures.nota_id', '=', 'notas.id')
            ->where('notas.curso_id', $request->input('n_id'))
            ->where('alumno_id', $id)
            ->groupBy('alumno_id')->orderBy('alumno_id','ASC')
            ->get();

            /*-----------------------------------------------------------------------------------------------------*/

        $alumnos_grado_grupo = alumno::find($id);  //Se busca en la tabla alumnos el id que es recibido como parametro de la url
        $cursos = curso::where('id' ,'>' ,0)
            ->where('grado', $alumnos_grado_grupo->grado)
            ->where('grupo', $alumnos_grado_grupo->grupo)->get();
        $nota_id = notas::select('id')->where('curso_id', $request->input('n_id'))->first();//El request se envia desde un formulario en la vista[Alumnos.show]

        /* --------------------------Configuración para la gráfica--------------------------*/
        $cal = new Calculos; //modelo [Calculos]
        $notas = null;
        $obj = "";
        $series = periodos_rangos::select('id','nombre')
            ->where('periodo_id',\Session::get('idPeriodo'))
            ->get();
        $subcomponentes = notas::join('notas_structures as ns','notas.id','=',
            'ns.nota_id')
            ->select('ns.id as id','ns.nombre as nombre')
            ->where('notas.curso_id',$request->input('n_id')) //El request se envia desde un formulario en la vista[Alumnos.show]
            ->pluck('id','nombre');

        foreach ($series as $item) {
            $valores = array();
            foreach ($subcomponentes as $value) {
                $nota = $cal->getNotaSubComponente($item->id,$value,
                    $id); //Los parametros se ecuentran en el $query del modelo [Calculos]
                $nota = $nota == null ? 0 : $nota->nota;
                $valores[] = $nota;
            }
            $notas[] =  array(
                "name" => $item->nombre,
                "data" => $valores
            ); //Notas[] es usado para las series de la gráfica
        }
    /* --------------------------select para las categorias de la gráfica--------------------------*/
        if($nota_id==null){
            $ns = notas_structures::select('nombre')->where('nota_id', '1')->pluck('nombre');
        }else{
            $ns = notas_structures::select('nombre')->where('nota_id', $nota_id->id)->pluck('nombre');
        }
        $curso_grafica  = curso::where('id', $request->input('n_id') )->pluck('nombre');
        $users = alumno::select('nombres')->where('id', $id)->pluck('nombres');//Select a la base de datos para el alumno en la gráfica
        /* --------------------select para la información de los alumnos con su tutor---------------------------*/
        $alumno = alumno::find($id)->first();
        if ($alumno==null){
            return view('errors.404');
        }else{
        $alumno = alumno::select(
            'alumnos.id',
            'alumnos.matricula as matricula',
            'alumnos.nombres as nombres',
            'alumnos.apellido_paterno as apellido_paterno',
            'alumnos.apellido_materno as apellido_materno',
            'alumnos.edad',
            'alumnos.fecha_de_nacimiento',
            'alumnos.curp',
            'grupos.nombre as grupo_nombre',
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
            ->join('grupos', 'alumnos.grupo_id', '=', 'grupos.id')
            ->where('alumnos.id', $id)
            ->first();
            return view('role.admin.alumnos.show', compact('alumno','users','cal','promedio', 'promedio_curso','promedioFIN','periodos', 'subcomponentes','nota_id', 'series', 'notas', 'ns', 'cursos','promedioCount', 'curso_grafica'));
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function promedio (){
     

    }
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
        return redirect(route('role.admin.alumnos.index'));
    }
    public function asignarCursos(Request $request)
    {
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function calificacionDetalles($id)
    {
               //Muestra la tabla de caLificaciones
               $notas = notas::where('id' ,'>' ,0)
               ->pluck('id')->toArray();
           $bimestres_total = notas_structures::select('notas.curso_id as curso_id',\DB::raw('count(*) as Total'))
               ->leftJoin('notas', 'notas_structures.nota_id', '=', 'notas.id')
               ->groupBy('curso_id')
               ->get();
           $alumno = alumno::where('id', $id)->first();
           $cursos = curso::where('grado', $alumno->grado)
               ->where('grupo', $alumno->grupo)
               ->pluck('id', 'nombre')->toArray();
           $cursos_nombre = curso::where('grado', $alumno->grado)
               ->where('grupo', $alumno->grupo)
               ->get();
           $ns = notas_structures::select('notas_structures.nombre as structure_nombre')
               ->leftJoin('notas', 'notas_structures.nota_id', '=', 'notas.id')
               ->leftJoin('cursos', 'notas.curso_id', '=', 'cursos.id')
               ->groupBy('structure_nombre')->orderBy('structure_nombre','ASC')
               ->get();
   
               $promedio = curso::select(
                   'cursos.nombre as crs_nombre',
                   'nota',
                   'notas_structures.id as ns_id',
                   'notas_values.periodos_rangos_id as per.id',
                   'notas_structures.nombre as ns_nombre',
                   'cursos.id as curso_id')
                   ->leftJoin('notas', 'cursos.id', '=', 'notas.curso_id')
                   ->leftJoin('notas_structures', 'notas.id', '=', 'notas_structures.nota_id')
                   ->leftJoin('notas_values', 'notas_structures.id', '=', 'notas_values.nota_structures_id')
                   ->orderBy('notas_values.periodos_rangos_id','ASC')
                   ->orderBy('notas_structures.id','ASC')
                   ->groupBy('crs_nombre')
                   ->groupBy('cursos.id', 'nota','ns_id', 'notas_values.periodos_rangos_id','ns_nombre' )
                   ->where('alumno_id', $id)
                   ->get();
   
           $promedioFIN = notas_values::select('periodos_rangos_id', 'notas.curso_id', \DB::raw('AVG(nota) as prom'))
               ->leftJoin('notas_structures', 'notas_values.nota_structures_id', '=', 'notas_structures.id')
               ->leftJoin('notas', 'notas_structures.nota_id', '=', 'notas.id')
               ->where('alumno_id', $id)
               ->groupBy('periodos_rangos_id', 'curso_id')->orderBy('periodos_rangos_id','ASC')
               ->get();
           $promedioFINAL = notas_values::select('alumno_id','notas.curso_id as curso_id', \DB::raw('AVG(nota) as prom'))
               ->leftJoin('notas_structures', 'notas_values.nota_structures_id', '=', 'notas_structures.id')
               ->leftJoin('notas', 'notas_structures.nota_id', '=', 'notas.id')
               ->where('alumno_id', $id)
               ->groupBy('alumno_id', 'curso_id')->orderBy('alumno_id','ASC')
               ->get();
   
   
           $periodos = periodos_rangos::select('id','nombre', 'abreviacion')
               ->where('periodo_id',\Session::get('idPeriodo'))
               ->orderBy('abreviacion','ASC')->get();
           return view('role.admin.calificaciones.detalles', compact('periodos','promedioFIN','bimestres_total', 'promedioFINAL', 'ns', 'promedio','cursos', 'cursos_nombre', 'alumno'));
    
    }
}

