<?php

namespace App\Http\Controllers;
use App\ndolar;
use App\alumno;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;

class ndolaresController extends Controller
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
        
        $users = new ndolar();
        $users ->matricula       = $request->input('matricula');
        $users ->nombre   = $request->input('nombre');
        $users ->accion        = $request->input('accion');
        $users ->cantidad        = $request->input('cantidad');
        $users ->antes        = $request->input('antes');
        $users ->nuevo        = $request->input('actual');
        $users ->comentario = $request->input('comentario');
        $users->save();
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
        $alumnos = alumno::find($id);
        if ($alumnos==null){
 
         return view('errors.404');
        }else{
 
            $alumnos = DB::table('ndolars')
            ->where('matricula', '=', $id)
            ->orderBy('created_at','desc')
            ->get();

            

            return view('ndolares.show', compact('alumnos'));
        }
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
