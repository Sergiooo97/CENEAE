<?php

namespace App\Http\Controllers\admin\finanzas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ingresos;
use App\salidas;
use App\finanzas;
use App\periodo;
class finanzasController extends Controller
{
    public function __construct()
    {
        $period = periodo::select('id')->orderBy('año_inicio','DESC')->take(1)->first();
        if(!is_null($period))
            if(!(\Session::has('idPeriodo')))
                \Session::put('idPeriodo',$period->id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conceptos_ingresos = ingresos::select(\DB::raw('sum(monto) as conceptos'), 'concepto as concepto')
            ->where('periodo_id', \Session::get('idPeriodo'))
            ->where('mes', 'Octubre')
            ->groupBy('concepto')
            ->get();
        $conceptos_salidas = salidas::select(\DB::raw('sum(monto) as conceptos'), 'concepto as concepto')
            ->where('periodo_id', \Session::get('idPeriodo'))
            ->where('mes', 'Octubre')
            ->groupBy('concepto')
            ->get();
        $ingresos = ingresos::select(\DB::raw('sum(monto) as total_ingreso'))
            ->where('periodo_id', \Session::get('idPeriodo'))
            ->where('mes', 'Octubre')
            ->first();
        $ingresos_grafica= finanzas::select('ingresos_de_escuela')
            ->where('periodo_id', \Session::get('idPeriodo'))
            ->pluck('ingresos_de_escuela')
            ->toArray();
            
        $presupuesto_grafica = finanzas::select('presupuesto_mensual')
        ->where('periodo_id', \Session::get('idPeriodo'))
        ->pluck('presupuesto_mensual')
        ->toArray();

        $salidas_grafica= finanzas::select('monthly_discharge')
            ->where('periodo_id', \Session::get('idPeriodo'))
            ->pluck('monthly_discharge')->toArray();

        $mes_grafica = finanzas::select('mes')
        ->where('periodo_id', \Session::get('idPeriodo'))
            ->pluck('mes')->toArray();

        $total_grafica = finanzas::select('total')
        ->where('periodo_id', \Session::get('idPeriodo'))
            ->pluck('total')->toArray();

        $salidas = salidas::select(\DB::raw('sum(monto) as total_salida'))
            ->where('periodo_id', \Session::get('idPeriodo'))
            ->where('mes', 'Octubre')
            ->first();
        
        $suma_ingresos = $ingresos->total_ingreso;
        $suma_salidas  = $salidas->total_salida;
        (int)$tot =(int)$suma_ingresos - (int)$suma_salidas;

        return view('role.admin.finanzas.index', compact('total_grafica', 'mes_grafica','presupuesto_grafica','ingresos_grafica','salidas_grafica','ingresos', 'salidas', 'conceptos_ingresos', 'conceptos_salidas', 'tot'));
    }
    
    public function ingresos(Request $request)
    {
        //validation
        $request->validate([
            'cantidadIngreso' => 'required|integer',
            'comentarioIngreso' => 'required|max:200|string',
            'conceptoIngreso' => 'required',
        ],
        [
            'cantidadIngreso.required' => 'Es necesario escribir una cantidad',
            'comentarioIngreso.required' => 'Escriba un comentario',
            'conceptoIngreso.required' => 'Es necesario ingresar una cantidad'
    
        ]);
        $ingresos = new ingresos();
        $ingresos->concepto = $request->input('conceptoIngreso');
        $ingresos->descripcion = $request->input('comentarioIngreso');
        $ingresos->monto = $request->input('cantidadIngreso');
        $ingresos->mes = "Octubre";
        $ingresos->periodo_id = \Session::get('idPeriodo');
        $ingresos->save();

        return redirect(route('finanzas.create'));

    }

    public function salidas(Request $request)
    {
        //validation
        $request->validate([
            'cantidadSalida' => 'required|integer',
            'comentarioSalida' => 'required|max:200|string',
            'conceptoSalida' => 'required',
        ],
        [
            'cantidadSalida.required' => 'Es necesario escribir una cantidad',
            'comentarioSalida.required' => 'Escriba un comentario',
            'conceptoSalida.required' => 'Es necesario ingresar una cantidad'
    
        ]);
        $ingresos = new salidas();
        $ingresos->concepto = $request->input('conceptoSalida');
        $ingresos->descripcion = $request->input('comentarioSalida');
        $ingresos->monto = $request->input('cantidadSalida');
        $ingresos->mes = "Octubre";
        $ingresos->periodo_id = \Session::get('idPeriodo');
        $ingresos->save();

        return redirect(route('finanzas.create'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingresos = ingresos::select(\DB::raw('sum(monto) as total_ingreso'))
        ->where('periodo_id', \Session::get('idPeriodo'))
        ->where('mes', 'Octubre')
        ->first();
        $salidas = salidas::select(\DB::raw('sum(monto) as total_salida'))
        ->where('periodo_id', \Session::get('idPeriodo'))
        ->where('mes', 'Octubre')
        ->first();
        return view('role.admin.finanzas.create', compact('ingresos', 'salidas'));
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
    public function show($id)
    {
        //
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
