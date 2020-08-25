<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use \App\Calculos;
use  \App\notas_structures;
use \App\notas;
use \App\periodos_rangos;
use \App\alumno;
use \App\curso;
use App\periodo;
use \App\notas_values;
use RealRashid\SweetAlert\Facades\Alert;
use ToSweetAlert;
class alumnoUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $period = periodo::select('id')->orderBy('año_inicio','DESC')->take(1)->first();
        if(!is_null($period))
            if(!(\Session::has('idPeriodo')))
                \Session::put('idPeriodo',$period->id);
    }
    public function ndolarDetalles()
    {
        $alumnos = alumno::find(auth()->user()->alumno_id);
        $id_alumno = alumno::find(auth()->user()->alumno_id);
            $alumnos = \App\ndolarTransacciones::orderBy('created_at','desc')
            ->where('lista_id', '=', auth()->user()->alumno_id)
            ->paginate(5);
            $alumno_matricula = alumno::find(auth()->user()->alumno_id)->first();

            return view('role.admin.ndolares.show', compact('alumnos', 'id_alumno', 'alumno_matricula'));

    }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        toast('Seleccione una asignatura! ↓ ','info');
        

        $promedioCount = notas_values::select('notas.id as nota_idd', 'notas.nombre as nota_nombre', \DB::raw('AVG(nota) as prom'))
        ->join('notas_structures', 'notas_values.nota_structures_id', '=', 'notas_structures.id')
        ->join('notas', 'notas_structures.nota_id', '=', 'notas.id')
        ->where('alumno_id', auth()->user()->alumno_id)
        ->groupBy('nota_idd')->orderBy('prom','ASC')
        ->take(3)
        ->get();

    $alumno = alumno::find(auth()->user()->alumno_id)->first();
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
        ->where('alumno_id', auth()->user()->alumno_id)
        ->groupBy('alumno_id')->orderBy('alumno_id','ASC')
        ->get();

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
                auth()->user()->alumno_id); //Los parametros se ecuentran en el $query del modelo [Calculos]
                $nota = $nota == null ? 0 : $nota->nota;
                $valores[] = $nota;
            }
            $notas[] =  array(
                "name" => $item->nombre,
                "data" => $valores
            ); //Notas[] es usado para las series de la gráfica
        }        
        $alumnos_grado_grupo = alumno::find(auth()->user()->alumno_id);  //Se busca en la tabla alumnos el id que es recibido como parametro de la url
        $cursos = curso::where('id' ,'>' ,0)
            ->where('grado', $alumnos_grado_grupo->grado)
            ->where('grupo', $alumnos_grado_grupo->grupo)->get();
        $nota_id = notas::select('id')->where('curso_id', $request->input('n_id'))->first();//El request se envia desde un formulario en la vista[Alumnos.show]

         /* --------------------------select para las categorias de la gráfica--------------------------*/
         if($nota_id==null){
            $ns = notas_structures::select('nombre')->where('nota_id', '1')->pluck('nombre');
        }else{
            $ns = notas_structures::select('nombre')->where('nota_id', $nota_id->id)->pluck('nombre');
        }
        $curso_grafica  = curso::where('id', $request->input('n_id') )->pluck('nombre');
        $users = alumno::select('nombres')->where('id', auth()->user()->alumno_id)->pluck('nombres');//Select a la base de datos para el alumno en la gráfica
    
        return view('role.user.rendimiento', compact('alumno','users','cal','promedio', 'promedio_curso','promedioFIN','periodos', 'subcomponentes','nota_id', 'series', 'notas', 'ns', 'cursos','promedioCount', 'curso_grafica'));

    
    }
    
}
