<?php

//use Illuminate\Support\Facades\Route;
//use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\ndolarExport;


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
  /* <------------------------------------------------RUTAS DEL ALUMNO ------------------------------------>*/
  Route::prefix('alumno')->group(function () {
    Route::get('lista', 'alumnosController@index')->name('alumnos.index'); //LISTA DE ALUMNOS
    Route::get('inscripcion', 'alumnosController@create')->name('alumnos.create'); //REGISTRO
    Route::get('{id}/info', 'alumnosController@show')->where('id','[0-9]+')->name('alumnos.show'); //INFORMACIÓN DE ALUMNO
    Route::post('inscripcion', 'alumnosController@store')->name('alumnos.store'); //GUARDAR DATOS EN LA BASE DE DATOS
    Route::get('{id}/edit', 'alumnosController@edit')->name('alumnos.edit'); //VENTANA DE ACTUALIZACIÓN DE DATOS
    Route::patch('{id}/actualizar', 'alumnosController@update')->name('alumnos.update'); //ACTUALIZAR DATOS EN LA BASE DE DATOS

    Route::get('{id}/calificacion', 'calificacionesController@show')
    ->where('id','[0-9]+')->name('calificacion.show'); //CALIFICACIÓN DE ALUMNOS

  //Nata-dolares
    Route::post('ndolares', 'ndolaresController@store')->name('ndolares.store'); //ALMACENAR DATOS EN LA BASE DE DATOS
    Route::get('{id}/{nombres}/ndolares', 'ndolaresController@show')->name('ndolares.show'); //MOSTRAR LISTA DE NDOLARES
    Route::get('ndolares/lista', 'ndolaresController@index')->name('ndolares.index');

  });

    /* <------------------------------------------------RUTAS DEL DOCENTE ------------------------------------>*/
    Route::prefix('docente')->group(function () {
      //DOCENTES
        Route::get('lista', 'docentesController@index')->name('docentes.index');
        Route::get('registro', 'docentesController@create')->name('docentes.create');
        Route::get('{id}/info', 'docentesController@show')->name('docentes.show');
        Route::post('registro', 'docentesController@store')->name('docentes.store');
        Route::get('{id}/edit', 'docentesController@edit')->name('docentes.edit');
        Route::patch('{id}/actualizar', 'docentesController@update')->name('docentes.update');

      });
  /* <------------------------------------------------RUTAS DE DESCARGAS (ADMIN) ------------------------------------>*/
  Route::prefix('download')->group(function () { 
    
    Route::get('ndolar/{id}', 'infoNdolarController@export')->name('info_ndolar.export');
    Route::get("exportar_asistencia/{grado}/{grupo}","archivosController@export_asistencia")->name("exportar_asistencia");
    Route::get("exportar_lista/{grado}/{grupo}","archivosController@export_lista")->name("exportar_lista");
    Route::get("exportar_ndolar_info/{id}/{nombre}","archivosController@export_ndolar_info")->name("exportar_ndolar_info");

    //DESCARGAS DE ARCHIVOS
    Route::get('archivos', 'archivosController@index')->name('archivosD.index');
    Route::get('lista-ndolar', function () {
      return (new ndolarExport(2020))->download('LISTA_DOLARES.xlsx');
      });
    Route::get('lista-todos', function () {
      return (new UsersExport(2020))->download('lista2020.xlsx');
      });
  }); 

  /* <------------------------------------------------OTRAS RUTAS DEL ADMIN ------------------------------------>*/
  //BANCO
    Route::get('ndolares', 'natadolaresController@index')->name('ndolares.index');

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

    
  