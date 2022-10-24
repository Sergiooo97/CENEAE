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
use App\cPostal;
use App\status;
use Illuminate\Http\Request;
use App\alumno;
use App\expediente;
//use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use RealRashid\SweetAlert\Facades\Alert;
use ToSweetAlert;
use Mpdf\Tag\Input;
use Illuminate\Support\Str;
use Response;
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
    
    public function index(Request $request)
    {
        $grupo_id = grupo::where('id', $request->get('grupo'))->first();
        $nombres = $request->get('nombres');
        $grado = $request->get('grado');
        $grupo = $request->get('grupo');
        $grupos = grupo::all();
        $alumnos = \App\alumno::select(
            'alumnos.id as id',
            'alumnos.matricula as matricula',
           'alumnos.municipio as municipio',
            DB::raw("CONCAT(alumnos.nombres, ' ', alumnos.apellido_paterno, ' ', alumnos.apellido_materno) as nombres"),
            'alumnos.curp as curp',
            'alumnos.direccion as direccion',
            'tutores.telefono as telefono',
            'grupos.nombre as grupo_nombre')
        ->leftJoin('tutores', 'alumnos.id', '=', 'tutores.alumno_id')
        ->leftJoin('grupos_alumnos', 'alumnos.id', '=', 'grupos_alumnos.alumno_id')
        ->leftJoin('grupos', 'grupos.id', '=', 'grupos_alumnos.grupo_id')
        ->orderBy('grupos.nombre', 'ASC')
        ->nombres($nombres)
       ->grupo($grupo)
       ->where('alumnos.status_id', '1')
        ->paginate(6);
        $curso = curso::where('grupo_id',$request->get('grupo'))->first();
        return view('role.admin.alumnos.index', compact('alumnos', 'grupos', 'grupo_id', 'curso'));
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

    public function create()
    {
        $grupos = grupo::all();
        toast('Registro de alumnos :)','info');
        return view('role.admin.alumnos.create', compact('grupos'));
    }

    public function RegistroDatosAlumno(){

        $this->store();
        return redirect()->route('home')->withError('El registro falló correctamente!'); 
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
            'cp' => 'required|integer',
            'calle-num' =>'required|integer',
            'calle-entre' =>'required|integer',
            'calle-y' =>'required|integer',
        ],
        [
            'nombres.required' => 'Es necesario escribir el nombre :(',
            'nombres.max' => 'El nombre es demasiado largo :(',
            'apellido_paterno.required' => 'Es necesario escribir el apellido paterno :(',
            'apellido_paterno.max' => 'El apellido paterno es demasiado largo :(',
            'apellido_materno.required' => 'Es necesario escribir el apellido materno :(',
            'apellido_materno.max' => 'El apellido materno es demasiado largo :(',
            'age.integer' => 'solo es posible escribir numeros para la edad',
            'age.required' => 'Es necesario llenar el campo de edad',
            'birthday.required' => 'Es necesario escribir la fecha de nacimiento',
            'birthday.date' => 'Solo el formato dd/mm/aaaa para la fecha de nacimiento',
            'curp.required' => 'Es necesario escribir curp',
            'curp.max' => 'El curp excede número maximo de caracteres',
            'grupo.required' => 'Es necesario escribir grupo',
            'cp.required' => 'El código postal es necesario',
            'cp.integer' => 'El código postal solo puede ser numeros',
            'calle-entre.integer' => 'El cruzamiento de la calle solo puede ser numeros',
            'calle-entre.required' => 'Es necesario escribir el cruzamiento de la calle',
            'calle-y.integer' => 'El cruzamiento de la calle solo puede ser numeros',
            'calle-y.required' => 'Es necesario escribir el cruzamiento de la calle',
            'calle-num.integer' => 'La calle solo puede ser numeros',
            'calle-num.required' => 'Es necesario escribir la calle',
        ]);

        $alumno = new alumno();
        $alumno->matricula = "************";
        $alumno->nombres = ucwords($request->input('nombres'));
        $alumno->apellido_paterno = ucwords($request->input('apellido_paterno'));
        $alumno->apellido_materno = ucwords($request->input('apellido_materno'));
        $alumno->edad = $request->input('age');
        $alumno->fecha_de_nacimiento = $request->input('birthday');
        $alumno->curp = strtoupper($request->input('curp'));
        $num = $request->input('num') == true ? " #".$request('num') : " S/N";
        $alumno->direccion ="Calle "
                .$request->input('calle-num')
                .$num
                ." x ".$request->input('calle-entre')
                ." y ".$request->input('calle-y').".";
        if($municipio = cPostal::where('codigo',$request->input('cp'))->exists()){
            $municipio = cPostal::where('codigo',$request->input('cp'))->first();
            $muni = $municipio->municipio;
            $estado = $municipio->estado;
            $alumno->municipio = $muni.", ".$estado.".";
        }else{
            $alumno->municipio = "pendiente...";
        }
        $alumno->cp = $request->input('cp');
        $alumno->status_id = "1";
        $alumno->save(); 
    /*END REGISTRO ALUMNO */
        
        $tutor = new tutor();
        $tutor->alumno_id = $alumno->id;
        $tutor->nombres = $request->input('nombres_tutor');
        $tutor->apellido_paterno = $request->input('apellido_paterno_tutor');
        $tutor->apellido_materno = $request->input('apellido_materno_tutor');
        $tutor->curp = "s";
        $tutor->direccion ="Calle ".$request->input('calle-num_tutor')
            ." x ".$request->input('calle-entre_tutor')
            ." y ".$request->input('calle-y_tutor').".";
        if($municipio = cPostal::where('codigo',$request->input('cp'))->exists()){
            $municipio = cPostal::where('codigo',$request->input('cp'))->first();
            $muni = $municipio->municipio;
            $estado = $municipio->estado;
            $tutor->municipio = $muni.", ".$estado.".";
        }else{
            $tutor->municipio = "pendiente...";
        }
        $tutor->codigo_postal = $request->input('cp_tutor');
        $tutor->fecha_de_nacimiento = $request->input('birthday_tutor');
        $tutor->edad = $request->input('age_tutor');
        $tutor->curp = strtoupper($request->input('curp_tutor'));
        $tutor->correo = $request->input('correo_tutor');
        $tutor->telefono =  Str::substr($request->get('telefono'), 0, 3). " ".Str::substr($request->get('telefono'), 3, 3). " ".Str::substr($request->get('telefono'), 6, 4) ;
        // $tutor->telefono = $request->input('telefono');
        $tutor->escolaridad = $request->input('ocupacion');
        $tutor->save(); /* END REGISTRO TUTOR */

        $cursos = curso::where('id' ,'>' ,0)->where('grupo_id', $request->input('grupo'))->pluck('id')->toArray();
        foreach($cursos as $curso){
            $alumno->courses()->attach($curso);
        }           
        $alumno->grupos()->attach(grupo::where('id', $request->input('grupo'))->first());
       return Response::json($alumno); 
        
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
        $cursos = curso::select(
            'cursos.nombre as nombre',
            'cursos.id as id'
        )
        ->Join('grupos', 'cursos.grupo_id', '=', 'grupos.id')
        ->Join('cursos_alumnos', 'cursos.id', '=', 'cursos_alumnos.id')
        ->Join('alumnos', 'cursos_alumnos.alumno_id', '=', 'alumnos.id')
        ->where('cursos.id' ,'>' ,0)
        ->get();
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
            'alumnos.quiero_ser',
            'tutores.nombres as nombres_tutor',
            'tutores.telefono as telefono_tutor',
            'tutores.direccion as direccion_tutor',
            'tutores.apellido_paterno as apellido_paterno_tutor',
            'tutores.apellido_materno as apellido_materno_tutor',
            'tutores.escolaridad as escolaridad_tutor',
            'tutores.curp as curp_tutor',
            'ndolar_listas.cantidad as ndolar_cantidad',
            'tutores.correo as correo_tutor')
            ->leftJoin('tutores', 'alumnos.id', '=', 'tutores.alumno_id')
            ->leftJoin('ndolar_listas', 'alumnos.id', '=', 'ndolar_listas.alumno_id')
            ->leftJoin('grupos_alumnos', 'alumnos.id', '=', 'grupos_alumnos.alumno_id')
            ->leftJoin('grupos', 'grupos_alumnos.grupo_id', '=', 'grupos.id')
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
    public function edit($grupo, $id)
    {
        $grupo_id = alumno::select('grupos.id as id', 'grupos.nombre as nombre')
            ->join('tutores', 'alumnos.id', '=', 'tutores.alumno_id')
            ->join('ndolar_listas', 'alumnos.id', '=', 'ndolar_listas.alumno_id')
            ->leftJoin('grupos_alumnos', 'alumnos.id', '=', 'grupos_alumnos.alumno_id')
            ->leftJoin('grupos', 'grupos_alumnos.grupo_id', '=', 'grupos.id')
            ->where('alumnos.id', $id)
            ->first();        
        $grupos = grupo::all();
        $alumnos = alumno::find($id);
        if ($alumnos==null){
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
            'alumnos.estatura',
            'alumnos.peso',
            'grupos.nombre as grupo_nombre',
            'alumnos.municipio',
            'alumnos.cp',
            'alumnos.direccion',
            'alumnos.quiero_ser',
            'alumnos.created_at',
            'alumnos.escuela_procedencia',
            'tutores.fecha_de_nacimiento as fecha_de_nacimiento_tutor',
            'tutores.edad as edad_tutor',
            'tutores.parentesco_con_alumno',
            'tutores.nombres as nombres_tutor',
            'tutores.telefono as telefono_tutor',
            'tutores.direccion as direccion_tutor',
            'tutores.municipio as municipio_tutor',    
            'tutores.codigo_postal as cp_tutor',
            'tutores.apellido_paterno as apellido_paterno_tutor',
            'tutores.apellido_materno as apellido_materno_tutor',
            'tutores.escolaridad as escolaridad_tutor',
            'tutores.curp as curp_tutor',
            'tutores.ocupacion',
            'ndolar_listas.cantidad as ndolar_cantidad',
            'tutores.correo',
            'tutores.telefono')
            
            ->leftJoin('tutores', 'alumnos.id', '=', 'tutores.alumno_id')
            ->leftJoin('ndolar_listas', 'alumnos.id', '=', 'ndolar_listas.alumno_id')
            ->leftJoin('grupos_alumnos', 'alumnos.id', '=', 'grupos_alumnos.alumno_id')
            ->leftJoin('grupos', 'grupos_alumnos.grupo_id', '=', 'grupos.id')
            ->where('alumnos.id', $id)
            ->first();
            return view('role.admin.alumnos.edit', compact('alumno', 'grupos','grupo_id'));
        }    }
    public function update(Request $request, $id)
    {
        $alumno =  alumno::find($id);
        $alumno->nombres = ucwords($request->input('nombres'));
        $alumno->apellido_paterno = ucwords($request->input('apellido_paterno'));
        $alumno->apellido_materno = ucwords($request->input('apellido_materno'));
        $alumno->edad = $request->input('age');
        $alumno->cp = $request->input('cp');
        $alumno->fecha_de_nacimiento = $request->input('birthday');
        $alumno->curp = strtoupper($request->input('curp'));
        $alumno->municipio = strtoupper($request->input('municipio'));
        $alumno->sexo = strtoupper($request->input('sexo'));
        $alumno->estatura = strtoupper($request->input('estatura'));
        $alumno->peso = strtoupper($request->input('peso'));
        $alumno->escuela_procedencia = strtoupper($request->input('escuela_procedencia'));
        $alumno->quiero_ser = ucwords($request->input('quiero_ser'));
        $alumno->update();

        $tutor = tutor::where('alumno_id' , $id)->first();
        $tutor->apellido_paterno = ucwords($request->input('apellido_paterno_tutor'));
        $tutor->apellido_materno = ucwords($request->input('apellido_materno_tutor'));
        $tutor->edad = $request->input('age_tutor');
        $tutor->fecha_de_nacimiento = $request->input('birthday_tutor');
        $tutor->curp = strtoupper($request->input('curp_tutor'));
        $tutor->codigo_postal = strtoupper($request->input('cp_tutor'));
        $tutor->direccion = strtoupper($request->input('direccion_tutor'));
        $tutor->municipio = ucwords($request->input('municipio_tutor'));
        $tutor->sexo = strtoupper($request->input('sexo_tutor'));
        $tutor->escolaridad = strtoupper($request->input('escolaridad'));
        $tutor->ocupacion = strtoupper($request->input('ocupacion'));
        $tutor->parentesco_con_alumno = strtoupper($request->input('parentesco_con_alumno'));
        $tutor->correo = strtoupper($request->input('correo'));
        $tutor->telefono =  Str::substr($request->get('telefono'), 0, 3). " ".Str::substr($request->get('telefono'), 3, 3). " ".Str::substr($request->get('telefono'), 6, 4) ;
        
        $tutor->update();
         

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
    public function calificacionDetalles($id)
    {
               //Muestra la tabla de caLificaciones
               $notas = notas::where('id' ,'>' ,0)
               ->pluck('id')->toArray();
           $bimestres_total = notas_structures::select('notas.curso_id as curso_id',\DB::raw('count(*) as Total'))
               ->leftJoin('notas', 'notas_structures.nota_id', '=', 'notas.id')
               ->groupBy('curso_id')
               ->get();
            $alumno = alumno::select(
                'alumnos.id as id',
                'alumnos.nombres as nombres',
                'alumnos.apellido_paterno as apellido_paterno',
                'alumnos.apellido_materno as apellido_materno',
                'grupos.id as grupo'
            )
                ->leftjoin('grupos_alumnos', 'alumnos.id', '=','grupos_alumnos.alumno_id')
                ->leftJoin('grupos', 'grupos_alumnos.grupo_id', '=', 'grupos.id')
                ->where('alumnos.id', $id)->first();
            $cursos = curso::where('grupo_id', $alumno->grupo)
                ->pluck('id', 'nombre')->toArray();
            $cursos_nombre = curso::where('grupo_id', $alumno->grupo)
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
                'cursos.id as curso_id',
                \DB::raw('count(*) as Total'))
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

    public function expediente_index()
    {
        return view ('role.admin.alumnos.expediente');
        
    }
}


