<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ndolar_lista;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class natadolaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombres = $request->get('nombres');
        $grado = $request->get('grado');
        $grupo = $request->get('grupo');


        $alumnos = \App\ndolar_lista::orderBy('grado', 'ASC')
        ->orderBy('grado', 'ASC')->orderBy('grupo', 'ASC')
        ->nombres($nombres)
        ->grado($grado)
        ->grupo($grupo)
        ->paginate(5);
        return view('ndolares.index', compact('alumnos'));    }

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
