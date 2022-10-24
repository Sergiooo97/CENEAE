<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ndolarTransacciones;

class ndolar extends Controller
{
    public function store(Request $request)
    {
        $ndolar = new ndolarTransacciones();
        $ndolar->lista_id = $request->get('lista_id');
        $ndolar->cantidad = $request->get('cantidad');
        $ndolar->accion = $request->get('accion');
        $ndolar->save();
        return $ndolar;
        return response()->json($ndolar, 200);
    }
}
