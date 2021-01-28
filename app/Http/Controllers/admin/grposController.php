<?php

namespace App\Http\Controllers\admin;

use RealRashid\SweetAlert\Facades\Alert;
use App\grupo;
use Illuminate\Http\Request;
use App\alumno;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Role;
use Illuminate\Support\Str;
use App\periodo;
use Illuminate\Support\Facades\DB;
use SweetAlert;
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
        $grupos = grupo::all();
        return view('role.admin.grupos.index', compact('grupos'));
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
    public function edit(Request $request, $grupo)
    {
        $grad = alumno::select('alumnos.id as id')
        ->join('grupos_alumnos', 'alumnos.id', '=', 'grupos_alumnos.alumno_id')
        ->join('grupos', 'grupos.id', '=', 'grupos_alumnos.grupo_id')
        ->where('grupos_alumnos.grupo_id', $grupo)->first();
        if (! $grad) {
            return \Redirect::back()->with('flash_error', 'No se ha encontrado');
        }
        $alumnos = alumno::find($grupo);

        $alumnos = \App\alumno::select(
        'alumnos.id as id',
        'alumnos.nombres as nombres',
        'alumnos.apellido_paterno as apellido_paterno',
        'alumnos.apellido_materno as apellido_materno',
        DB::raw("CONCAT(alumnos.apellido_paterno, ' ', alumnos.apellido_materno) as apellidos"),
        'alumnos.curp as curp',
        'alumnos.matricula as matricula',
        'grupos.nombre as grupo',
        'users.email as email')
        ->join('grupos_alumnos', 'alumnos.id', '=', 'grupos_alumnos.alumno_id')
        ->join('grupos', 'grupos.id', '=', 'grupos_alumnos.grupo_id')
        ->leftJoin('users', 'alumnos.id', '=', 'users.alumno_id')
        ->orderBy('apellidos', 'ASC')
        ->grupo($grupo)
        ->paginate(5);
        return view('role.admin.grupos.edit', compact('alumnos', 'grad'))->with('success','sdfsfsd');

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
            if($value <=9){                                                                          //2    11        6
                $alumno->matricula =  "0".$value.Str::substr($value.$request->get('matricula')[$key], 1, 11).
                $request->get('grupo_id'). //XX EXGS971124H XXXXXX
                Str::substr($periodos->año_inicio, -2, 2).
                Str::substr($periodos->año_fin, -2, 2);
            }else {
                
                $alumno->matricula =  $value.Str::substr($value.$request->get('matricula')[$key], 0, 11).
                $request->get('grupo_id').
                Str::substr($periodos->año_inicio, -2, 2).
                Str::substr($periodos->año_fin, -2, 2);
            }
         $alumno->update();
            
            }
            
         return back();
         
           }
    public function email(Request $request, $id){
     
        $periodos = periodo::where('id', \Session::get('idPeriodo'))->first();

        foreach ($request->get('orden') as $key => $value) {
 
          if (User::where('email', '=', strtolower($request->get('apellido_paterno')[$key]).".".
                                        strtolower($request->get('apellido_materno')[$key]).".".
                                        (string)$request->get('id')[$key]."@ceneae.com")->exists()) {

                                        alert()->error('No se puede crear de nuevo algunos email');

            }else{
                $user = new User();
                if($value <=9){
                  $user->matricula = "0".$value.$request->get('matricula')[$key].
                    Str::substr($periodos->año_inicio, -2, 2).
                    Str::substr($periodos->año_fin, -2, 2);                 
                }else {

                  $user->matricula = $value.$request->get('matricula')[$key].
                    Str::substr($periodos->año_inicio, -2, 2).
                    Str::substr($periodos->año_fin, -2, 2);
                }
                $user->name =$request->get('nombres')[$key];

                $user->email = strtolower($request->get('apellido_paterno')[$key]).".".
                               strtolower($request->get('apellido_materno')[$key]).".".
                               (string)$request->get('id')[$key]."@ceneae.com";

                $user->password = Hash::make('12345678');
                $user->alumno_id = $request->get('id')[$key];
                $user->save();

                $user->roles()->attach(Role::where('name', 'user')->first()); 
                
                alert()->success('Si se pudo');

          }
        }
        return back();
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
