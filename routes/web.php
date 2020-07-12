<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

    Auth::routes();
Route::get('home', 'HomeController@index')->name('home');
Route::get('galeria', 'galeriaController@index')->name('galeria');


Route::prefix('admin')->group(function () {
    //ALUMNOS
    Route::get('listaAlumnos', 'listaAlumnos@index')->name('listaAlumnos');
    route::get('listaAlumnos/{id}', 'listaAlumnos@show')
->where('id','[0-9]+')
->name('listaAlumnos.show');
    //BANCO
    Route::get('ndolares', 'natadolaresController@index')->name('ndolares.index');
    //DOCENTES
    Route::get('docentes', 'docentesController@index')->name('docentes.index');
    //REGISTRO DE ALUMNOS
    Route::get('inscripcion', 'inscripcionController@index')->name('inscripcion.index');
    Route::post('inscripcion', 'inscripcionController@store')->name('inscripcion.store');
  });
  Route::prefix('Montessori')->group(function () {
    Route::get('welcome', 'montessoriController@index')->name('montessori.index');
  });

  
  /*
|--------------------------------------------------------------------------
| alumnos route
|--------------------------------------------------------------------------
|*/
  Route::post('infoalumno', 'infoalgumnoController@store')->name('infoalumno.store');
  Route::get('infoalumno', 'infoalumnoController@index')->name('infoalumno.index');