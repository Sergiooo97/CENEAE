<?php

namespace App\Http\Controllers;

use App\Calculos;
use App\curso;
use App\notas;
use App\notas_structures;
use App\notas_values;
use App\periodo;
use App\periodos_rangos;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\alumno;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth');
        $period = periodo::select('id')->orderBy('año_inicio','DESC')->take(1)->first();
        if(!is_null($period))
            if(!(\Session::has('idPeriodo')))
                \Session::put('idPeriodo',$period->id);
    }
    public function index()
    {
        $notas = $this->getNotasGrafica();
        $ns = notas_structures::select('nombre')
        ->where('nota_id', '1')
        ->pluck('nombre');

        $users = alumno::select('nombres')
            ->where('id', '1')
            ->pluck('nombres');

        $results = alumno::selectRaw('count(*) as Total')->get();
        $alumnos = alumno::select('id','nombres','apellido_paterno', 'apellido_materno')
        ->orderBy('created_at','DESC') 
        ->take(5)
        ->get();

        $cursos = curso::select('id','nombre','clave','created_at')
        ->orderBy('created_at','DESC')
        ->take(5)
        ->get();

        $lista_cursos = curso::select('id','nombre')
        ->where('periodo_id',\Session::get('idPeriodo'))
        ->orderBy('nombre','ASC')
        ->get();

        $listaRangos = periodos_rangos::select('id','nombre')
        ->where('periodo_id',\Session::get('idPeriodo'))
        ->get();
        
        return view('home', compact('results', 'alumnos', 'cursos', 'lista_cursos', 'listaRangos', 'users', 'notas', 'ns'));
    }
    public function configurarGrafico(Request $request)
    {
        $cal = new Calculos;
        $notas = null;
        $obj = "";
        $series = periodos_rangos::select('id','nombre')
            ->where('periodO_id',\Session::get('idPeriodo'))
            ->get();

        $subcomponentes = notas::join('nota_structures as gs','notas.id','=',
            'gs.nota_id')
            ->select('gs.id as id','gs.nombre as nombre')
            ->where('notas.curso_id','1')
            ->pluck('id','nombre');

        foreach ($series as $item) {
            $valores = array();
            foreach ($subcomponentes as $value) {
                $nota = $cal->getNotaSubComponente($item->id,$value,
                    '2');
                $nota = $nota == null ? 0 : $nota->nota;
                $valores[] = $nota;
            }
            $notas[] =  array(
                "name" => $item->nombre,
                "data" => $valores
            );
        }
        return response()->json([
            "categorias" => $subcomponentes,
            "notas" => $notas
        ]);
    }

    public function getNotasGrafica(){
           //Gráfica
           $cal = new Calculos;
           $notas = null;
           $obj = "";
           $series = periodos_rangos::select('id','nombre')
               ->where('periodo_id',\Session::get('idPeriodo'))
               ->get();
           $subcomponentes = notas::join('notas_structures as ns','notas.id','=',
               'ns.nota_id')
               ->select('ns.id as id','ns.nombre as nombre')
               ->where('notas.curso_id','1')
               ->pluck('id','nombre');
           foreach ($series as $item) {
               $valores = array();
               foreach ($subcomponentes as $value) {
                   $nota = $cal->getNotaSubComponente($item->id,$value,
                       '1');
                   $nota = $nota == null ? 0 : $nota->nota;
                   $valores[] = $nota;
               }
               $notas[] =  array(
                   "name" => $item->nombre,
                   "data" => $valores
               );
           }
           return $notas;
    }

}
