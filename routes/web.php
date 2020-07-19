<?php

//use Illuminate\Support\Facades\Route;
//use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\primeroAExport;
use App\Exports\primeroBExport;
use App\Exports\segundoAExport;
//use App\Exports;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

*/

Route::get('/', function () {
return view('welcome');
});
  /*
|--------------------------------------------------------------------------
| otros route
|--------------------------------------------------------------------------
|*/
    Auth::routes();
Route::get('home', 'HomeController@index')->name('home');
Route::get('galeria', 'galeriaController@index')->name('galeria');

  /*
|--------------------------------------------------------------------------
| Admin route
|--------------------------------------------------------------------------
|*/
Route::prefix('admin')->group(function () {
  //ALUMNOS
    Route::get('listaAlumnos', 'listaAlumnos@index')->name('listaAlumnos');
    Route::get('infoAlumnos/{id}', 'listaAlumnos@show')->where('id','[0-9]+')->name('listaAlumnos.show');
  //BANCO
    Route::get('ndolares', 'natadolaresController@index')->name('ndolares.index');
  //DOCENTES
    Route::get('docentes', 'docentesController@index')->name('docentes.index');
  //REGISTRO DE ALUMNOS
    Route::get('inscripcion', 'inscripcionController@index')->name('inscripcion.index');
    Route::post('inscripcion', 'inscripcionController@store')->name('inscripcion.store');
  //REGISTRO DE Nata-dolares
    Route::post('ndolares', 'ndolaresController@store')->name('ndolares.store');
    Route::get('ndolares/{id}', 'ndolaresController@show')->name('ndolares.show');
  });

  /*
|--------------------------------------------------------------------------
| Montessori route
|--------------------------------------------------------------------------
|*/
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

  /*
|--------------------------------------------------------------------------
| rutas para descarga
|--------------------------------------------------------------------------
|*/
  Route::prefix('download')->group(function () {
    Route::get('lista-1A', function () {
      return Excel::download(new primeroAExport, 'lista-1A.xlsx');
  });
  Route::get('lista-2A', function () {
    return Excel::download(new segundoAExport, 'lista-2A.xlsx');
});
Route::get('lista-1B', function () {
  return Excel::download(new primeroBExport, 'lista-1B.xlsx');
});
  });
