<?php

namespace App\Http\Controllers;
use App\periodo;
use Illuminate\Http\Response;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class periodoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $periodos = periodo::orderBy('año','DESC')
            ->get();
        return view('role.admin.menus.periodos', compact('periodos'));

    }
    public function listAll()
    {
        return Datatables::of(periodo::select('id','nombre','duracion','año','descripcion')
            ->orderBy('año','DESC')
            ->get())->make(true);
    }

    public function setSession(Request $request)
    {
        $request->session()->put('idPeriodo',$request->id);
        return response()->json(["Sesion"=>"Asignado"]);
    }

    public function save(Request $request)
    {
        /*if ($request->ajax()) {
            if ($request->Accion == "Registrar") { */

                $per = new periodo();
                $per->nombre = $request->input('Nombre');
                $per->duracion = $request->input('Duracion');
                $per->año = $request->input('Anio');
                $per->descripcion = $request->input('Descripcion');
                $per->save();

            $request->session()->forget('idPeriodo');
            return redirect(route('app.period.page'));
        }


    public function delete(Request $request)
    {
        $per = periodo::find($request->id);
        if (!is_null($per)) {
            $per->delete();
            return response()->json(["Estado"=>"Eliminado"]);
        }
        return response()->json(["Estado"=>"Error"]);
    }


}
