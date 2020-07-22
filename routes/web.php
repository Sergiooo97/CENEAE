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
    Route::get('lista', 'listaAlumnos@index')->name('listaAlumnos');

  //ALUMNOS
    Route::get('{id}/info', 'listaAlumnos@show')->where('id','[0-9]+')->name('listaAlumnos.show');
  //REGISTRO DE ALUMNOS
    Route::get('inscripcion', 'inscripcionController@index')->name('inscripcion.index');
    Route::post('inscripcion', 'inscripcionController@store')->name('inscripcion.store');
    Route::patch('{id}/update', 'inscripcionController@update')->where('id','[0-9]+')->name('inscripcion.update');

    //CALIFICACIÓN DE ALUMNOS
    Route::get('{id}/calificacion', 'calificacionesController@show')->where('id','[0-9]+')->name('calificacion.show');

  //REGISTRO DE Nata-dolares
    Route::post('ndolares', 'ndolaresController@store')->name('ndolares.store');
    Route::get('{id}/ndolares', 'ndolaresController@show')->name('ndolares.show');
    
  });

    /* <------------------------------------------------RUTAS DEL DOCENTE ------------------------------------>*/
    Route::prefix('docente')->group(function () {
      //DOCENTES
        Route::get('lista', 'docentesController@index')->name('docentes.index');
        });
  /* <------------------------------------------------RUTAS DE DESCARGAS (ADMIN) ------------------------------------>*/
  Route::prefix('download')->group(function () { 
    //DESCARGAS DE ARCHIVOS
    Route::get('archivos', 'archivosDController@index')->name('archivosD.index');
    Route::get('lista-ndolar', function () {
      return (new ndolarExport(2020))->download('LISTA_DOLARES.xlsx');
      });
    Route::get('lista-todos', function () {
      return (new UsersExport(2020))->download('lista2020.xlsx');
      });
    Route::get('lista-1A', function () {
      return Excel::download(new App\Exports\sheets\listas\primeroAExport, 'lista-1A.xlsx');
    });
    Route::get('lista-1B', function () {
      return Excel::download(new App\Exports\sheets\listas\primeroBExport, 'lista-1B.xlsx');
    });
    Route::get('lista-2A', function () {
      return Excel::download(new App\Exports\sheets\listas\segundoAExport, 'lista-2A.xlsx');
    });
    Route::get('lista-2B', function () {
      return Excel::download(new App\Exports\sheets\listas\segundoBExport, 'lista-2B.xlsx');
    });
    Route::get('lista-3A', function () {
      return Excel::download(new App\Exports\sheets\listas\terceroAExport, 'lista-3A.xlsx');
    });
    Route::get('lista-3B', function () {
      return Excel::download(new App\Exports\sheets\listas\terceroBExport, 'lista-3B.xlsx');
    });
    Route::get('lista-4A', function () {
      return Excel::download(new App\Exports\sheets\listas\cuartoAExport, 'lista-4A.xlsx');
    });
    Route::get('lista-4B', function () {
      return Excel::download(new App\Exports\sheets\listas\cuartoBExport, 'lista-4B.xlsx');
    });
    Route::get('lista-5A', function () {
      return Excel::download(new App\Exports\sheets\listas\quintoAExport, 'lista-5A.xlsx');
    });
    Route::get('lista-5B', function () {
      return Excel::download(new App\Exports\sheets\listas\quintoBExport, 'lista-5B.xlsx');
    });
    Route::get('lista-6A', function () {
      return Excel::download(new App\Exports\sheets\listas\sextoAExport, 'lista-6A.xlsx');
    });
    Route::get('lista-6B', function () {
      return Excel::download(new App\Exports\sheets\listas\sextoBExport, 'lista-6B.xlsx');
    });
    Route::get('asistencia-1A', function () {
      return Excel::download(new App\Exports\sheets\asistencia\A1AExport, 'ASISTENCIA 1A.xlsx');
    });
    Route::get('asistencia-1B', function () {
      return Excel::download(new App\Exports\sheets\asistencia\A1BExport, 'ASISTENCIA 1B.xlsx');
    });
    Route::get('asistencia-2A', function () {
      return Excel::download(new App\Exports\sheets\asistencia\A2AExport, 'ASISTENCIA 2A.xlsx');
    });
    Route::get('asistencia-2B', function () {
      return Excel::download(new App\Exports\sheets\asistencia\A2BExport, 'ASISTENCIA 2B.xlsx');
    });
    Route::get('asistencia-3A', function () {
      return Excel::download(new App\Exports\sheets\asistencia\A3AExport, 'ASISTENCIA 3A.xlsx');
    });
    Route::get('asistencia-3B', function () {
      return Excel::download(new App\Exports\sheets\asistencia\A3BExport, 'ASISTENCIA 3B.xlsx');
    });
    Route::get('asistencia-4A', function () {
      return Excel::download(new App\Exports\sheets\asistencia\A4AExport, 'ASISTENCIA 4A.xlsx');
    });
    Route::get('asistencia-4B', function () {
      return Excel::download(new App\Exports\sheets\asistencia\A4BExport, 'ASISTENCIA 4B.xlsx');
    });
    Route::get('asistencia-5A', function () {
      return Excel::download(new App\Exports\sheets\asistencia\A5AExport, 'ASISTENCIA 5A.xlsx');
    });
    Route::get('asistencia-5B', function () {
      return Excel::download(new App\Exports\sheets\asistencia\A5BExport, 'ASISTENCIA 5B.xlsx');
    });
    Route::get('asistencia-6A', function () {
      return Excel::download(new App\Exports\sheets\asistencia\A6AExport, 'ASISTENCIA 6A.xlsx');
    });
    Route::get('asistencia-6B', function () {
      return Excel::download(new App\Exports\sheets\asistencia\A6BExport, 'ASISTENCIA 6B.xlsx');
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

    
  