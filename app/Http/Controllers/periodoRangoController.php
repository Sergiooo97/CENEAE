<?php

namespace App\Http\Controllers;

use App\periodo;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use \App\periodos_rangos;
class periodoRangoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth');
        $period = periodo::select('id')->orderBy('año','DESC')->take(1)->first();
        if(!is_null($period))
            if(!(\Session::has('idPeriodo')))
                \Session::put('idPeriodo',$period->id);
    }
    public function index(){
        $periodos_rangos = periodos_rangos::select(
            'periodos_rangos.nombre as nombre_rango',
            'periodos.nombre as nombre_periodo',
            'periodos_rangos.duracion as duracion',
            'periodos_rangos.fecha_inicio as inicio',
            'periodos_rangos.fecha_fin as fin')
            ->join('periodos', 'periodos_rangos.periodo_id', '=', 'periodos.id')
            ->where('periodo_id',\Session::get('idPeriodo'))
            ->get();
        return view('role.admin.menus.rangos', compact('periodos_rangos'));
    }

    public function listAll()
    {
        return Datatables::of(periodos_rangos::join('periodos as pe','pe.id','=',
            'periodos_rangos.periodo_id')
            ->select('periodos_rangos.id as id','pe.id as periodo_id',
                'periodos_rangos.nombre as nombre','periodos_rangos.duracion as duracion','fecha_inicio','fecha_fin','pe.nombre as periodo')
            ->where('periodo_id',\Session::get('idPeriodo'))
            ->get())->make(true);
    }


    public function setSession(Request $request)
    {
        $request->session()->put('idPeriodoRango',$request->id);
        return response()->json(["Sesion"=>"Asignado"]);
    }

    public function save(Request $request)
    {
        $per = new periodos_rangos();
        $per->nombre = $request->input('Nombre');
        $per->abreviacion = $request->input('abreviacion');
        $per->duracion = $request->input('Duracion');
        $per->fecha_inicio = $request->input('FechaInicio');
        $per->fecha_fin = $request->input('FechaFin');
        $per->periodo_id = \Session::get('idPeriodo');
        $per->save();
        $periodo = periodo::find(\Session::get('idPeriodo'));
        return redirect(route('rangos.index'));
    }

    public function delete(Request $request)
    {
        $per = periodos_rangos::find($request->id);
        if (!is_null($per)) {
            $per->delete();
            return response()->json(["Estado"=>"Eliminado"]);
        }
        return response()->json(["Estado"=>"Error"]);
    }

    public function isLimiteDuracion($duracionGuardar,$param)
    {
        $duracionTotal = periodo::find(\Session::get('idPeriodo'));
        $duracionActual = periodos_rangos::where('period_id',\Session::get('idPeriodo'))->sum('duracion');
        $diferencia = 0;
        if($param == "Editar")
        {
            $duracionRango = periodos_rangos::find(\Session::get('idPeriodoRange'));
            $duracionRango = $duracionActual - $duracionRango->duracion;
            $duracionParcial = $duracionRango + $duracionGuardar;
            $diferencia = $duracionTotal->duracion - $duracionParcial;
        }else
        {
            $diferenciaParcial = $duracionTotal->duracion - $duracionActual;
            $diferencia = $diferenciaParcial - $duracionGuardar;
        }
        return $diferencia >= 0;
    }
}
