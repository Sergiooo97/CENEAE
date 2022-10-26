<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pago;
use App\alumno;
class pagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
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
        $pago = new pago();
        $pago->concepto = $request->input('concepto');
        $pago->observaciones = $request->input('observaciones');
        $pago->alumno_id = $request->input('id_alumno');
        $pago->cantidad = $request->input('cantidad');
        $pago->status_id = 1;
        $pago->save();
        
        return back();    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pagos = pago::select(
            'pagos.id as pago_id',
            'pagos.alumno_id as pago_alumno_id',
            'pagos.cantidad',
            'pagos.concepto',
            'pagos.observaciones',
            'pagos.status_id as status_pago',
            'pagos.created_at',
            'alumnos.nombres',
            'alumnos.matricula',
            'alumnos.id as alumno_id',
            'alumnos.curp',
            'alumnos.direccion'
        )
        ->join('alumnos', 'pagos.alumno_id', '=', 'alumnos.id')
        ->where('alumno_id', $id)->paginate(5);
        $id_alumno = alumno::find($id); 
        $alumno_matricula = alumno::find($id)->first();
        return view('role.admin.mensualidades.show', compact('pagos', 'id_alumno', 'alumno_matricula'));

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
