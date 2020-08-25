<?php

namespace App\Http\Controllers\admin;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\alumno;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Role;
use Illuminate\Support\Str;
use App\periodo;

use ToSweetAlert;

class grposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('role.admin.grupos.index');
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
    public function edit(Request $request, $grado, $grupo)
    {
        toast('Asigna un número de lista y periodo a los alumnos :)','info');

        $grad = alumno::where('grado', $grado)->first();
        if (! $grad) {
            return \Redirect::back()->with('flash_error', 'No se ha encontrado');
        }
        $alumnos = alumno::find($grado);
        $alumnos = alumno::find($grupo);

        $alumnos = \App\alumno::orderBy('apellido_paterno', 'ASC')
        ->grado($grado)
        ->grupo($grupo)
        ->paginate(5);
        return view('role.admin.grupos.edit', compact('alumnos', 'grad'));

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
                    //validation
                    $request->validate([
                        'orden.*' => 'required|numeric'
                    ],
                    [
                    'orden.*.required' => 'Estas dejando un campo vacio',
                    'numeric' => 'solo es posible escribir numeros',
                    ]);
        foreach ($request->get('orden') as $key => $value) {
            $periodos = periodo::where('id', \Session::get('idPeriodo'))->first();
            //
            $alumno = alumno::find($request->get('id')[$key]);
            if($value <=9){
                $alumno->matricula = "0".$value.$request
                ->get('matricula')[$key].
                Str::substr($periodos->año_inicio, -2, 2).
                Str::substr($periodos->año_fin, -2, 2);
            }else {
                $alumno->matricula = $value.$request
                ->get('matricula')[$key].
                Str::substr($periodos->año_inicio, -2, 2).
                Str::substr($periodos->año_fin, -2, 2);
            }
            $alumno->update();
            
            //User para inicio de sesión de los alumnos.
            $user = new User();
            if($value <=9){
                $user->matricula = "0".$value.$request->get('matricula')[$key];
            }else {
                $user->matricula = $value.$request->get('matricula')[$key];
            }
            $user->name =$request->get('nombres')[$key];
            $user->email = $request->get('nombres')[$key].".".Str::substr($value.$request->get('matricula')[$key], -9, 6)."@ceneae.com";
            $user->password = Hash::make('12345678');
            $user->alumno_id = $request->get('id')[$key];
            $user->save();
            $user->roles()->attach(Role::where('name', 'user')->first());
        }
        return redirect(route('alumnos.index'));
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
