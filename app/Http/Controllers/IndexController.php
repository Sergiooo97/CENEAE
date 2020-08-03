<?php

namespace App\Http\Controllers;

use App\periodo;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function setPeriodo($id)
    {
        \Session::put('idPeriodo',$id);
        $periodo = periodo::select('nombre')->where('id',$id)->first();
        return back()->with('periodo',$periodo->nombre);
    }
}

