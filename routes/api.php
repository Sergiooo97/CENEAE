<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\ndolarTransacciones;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return response()->json(["nombre"=>"Rafael Eb Gallegos"]);
});
Route::resource('/alumnos','api\alumnos');
Route::resource('/ndolar','api\ndolar');
//Route::post('/ndolarT','api\ndolar@store');

Route::post('/ndolarT',function (Request $request) {
    json_decode($request->getContent(), true);
        $ndolar = new ndolarTransacciones;
        $ndolar->lista_id = $request->get('lista_id');
        $ndolar->cantidad =  $request->get('cantidad');
        $ndolar->accion = $request->get('accion');
        $ndolar->comentario = $request->get('comentario');
        $ndolar->save();
    return response()->json($request, 200);
});

//Route::resource('/cursos','api\cursos');
//Route::get('/cursos','api\cursosController@index');
Route::get('/cursos/{id}','api\cursosController@show');
Route::post('/alumnoss','api\alumnos@store');

