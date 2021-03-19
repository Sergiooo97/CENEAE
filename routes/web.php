<?php

//use Illuminate\Support\Facades\Route;
//use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\ndolarExport;
use App\Http\Controllers\admin\grposController;
use RealRashid\SweetAlert\Facades\Alert;
//use App\Exports;
  /*
|--------------------------------------------------------------------------
| otros route
|--------------------------------------------------------------------------
|*/
 /*
|--------------------------------------------------------------------------
| Montessori route
|--------------------------------------------------------------------------
|*/
Route::prefix('Montessori')->group(function () {
  Route::get('welcome', 'montessoriController@index')->name('montessori.index');
});

Auth::routes();
Route::get('home', 'HomeController@index')->name('home')->middleware('auth', 'role:admin');
Route::get('galeria', 'galeriaController@index')->name('galeria');

Route::get('/', function () {

  return view('welcome');
  });
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------

*/
Route::group([
  'middleware' =>  ['auth', 'role:user'],
  'prefix'     =>   'alumno',
  'namespace'  =>   'user'], function () {
  Route::get('home', 'HomeController@index')->name('alumno.home.index'); //LISTA DE ALUMNOS
  Route::get('rendimiento', 'alumnoUserController@show')->name('alumno.rendimiento.user');
  Route::get('ndolar', 'alumnoUserController@ndolarDetalles')->name('ndolar.detalle.user');
});

Route::group([
  'middleware' =>  ['auth', 'role:maestro'],
  'prefix'     =>   'm',
  'namespace'  =>   'maestro'], function () {
  Route::get('home', 'HomeController@index')->name('maestro.index'); //LISTA DE ALUMNOS
  Route::get('{curso_id}/calificacion/registrar', 'calificacionesController@show')->name('calificaciones.show'); //CALIFICACIÓN DE ALUMNOS
  Route::get('/calificacion', 'calificacionesController@index')->name('calificaciones.index'); //CALIFICACIÓN DE ALUMNOS
  Route::get('calificacion/asignaturas', 'calificacionesController@asignarIndex')->name('asignar.calificaciones.index'); //CALIFICACIÓN DE ALUMNOS
  Route::get('{id}/calificaciones/detalles', 'calificacionesController@detalles')->name('calificaciones.detalles'); //CALIFICACIÓN DE ALUMNOS
  Route::get('{curso_id}/{nota_id}/{curso_grado}/{curso_grupo}/calificacion', 'calificacionesController@asignar')->name('asignar.create'); //CALIFICACIÓN DE ALUMNOS
  Route::post('/value', 'calificacionesController@valueStore')->name('calificaciones.value.store'); //CALIFICACIÓN DE ALUMNOS
  Route::post('/calificacion/registro', 'calificacionesController@store')->name('calificaciones.store'); //CALIFICACIÓN DE ALUMNOS
  Route::post('/actividad/registro', 'calificacionesController@actividadStore')->name('actividad.store'); //CALIFICACIÓN DE ALUMNOS

  Route::get('{grupo}/{id}/edit', 'alumnosController@edit')->name('alumnos.edit'); //VENTANA DE ACTUALIZACIÓN DE DATOS

});




Route::group([
  'middleware' =>  ['auth', 'role:admin'],
  'prefix'     =>   'admin',
  'namespace'  =>   'admin'], function () {



    /*
|--------------------------------------------------------------------------
| Rutas de alumno
|--------------------------------------------------------------------------
|*/
    Route::prefix('finanzas')->group(function (){
      Route::get('/asignar','finanzas\finanzasController@create')->name('finanzas.create');
      Route::get('/','finanzas\finanzasController@index')->name('finanzas.index');
      Route::post('/ingreso','finanzas\finanzasController@ingresos')->name('finanzas.ingreso');
      Route::post('/salida','finanzas\finanzasController@salidas')->name('finanzas.salida');

    });

  Route::prefix('alumno')->group(function () {
    Route::get('lista', 'alumnosController@index')->name('alumnos.index'); //LISTA DE ALUMNOS
    Route::get('lista/orden', 'alumnosController@orden')->name('alumnos.orden'); //LISTA DE ALUMNOS
    Route::get('inscripcion', 'alumnosController@create')->name('alumnos.create'); //REGISTRO
    Route::post('inscripcion', 'alumnosController@store')->name('alumnos.store'); //GUARDAR DATOS EN LA BASE DE DATOS
      Route::post('asignar', 'alumnosController@asignarCursos')->name('alumnos.asignarCursos'); //GUARDAR DATOS EN LA BASE DE DATOS
      Route::get('expediente', 'alumnosController@expediente_index')->name('alumnos.expediente'); //REGISTRO

      Route::get('{id}/info', 'alumnosController@show')->where('id','[0-9]+')->name('alumnos.show'); //INFORMACIÓN DE ALUMNO
    Route::get('{grupo}/{id}/edit', 'alumnosController@edit')->name('alumnos.edit'); //VENTANA DE ACTUALIZACIÓN DE DATOS
    Route::patch('{id}/actualizar', 'alumnosController@update')->name('alumnos.update'); //ACTUALIZAR DATOS EN LA BASE DE DATOS
    Route::patch('{id}/orden', 'alumnosController@updateOrden')->name('alumnos.updateOrden'); //ACTUALIZAR DATOS EN LA BASE DE DATOS

    Route::get('{id}/calificaciones/detalles', 'alumnosController@calificacionDetalles')->name('admin.calificaciones.detalles'); //CALIFICACIÓN DE ALUMNOS


  //Nata-dolares
  Route::get('ndolares', 'natadolaresController@index')->name('ndolares.index');
    Route::post('ndolares', 'ndolaresController@store')->name('ndolares.store'); //ALMACENAR DATOS EN LA BASE DE DATOS
    Route::get('{id}/ndolares', 'ndolaresController@show')->name('ndolares.show'); //MOSTRAR LISTA DE NDOLARES
    Route::get('ndolares/lista', 'ndolaresController@index')->name('ndolares.index');
    Route::get('ndolares/deposito', 'ndolaresController@deposito')->name('ndolares.deposito');
    Route::patch('ndolares/deposito', 'ndolaresController@insertarDeposito')->name('ndolares.deposito.store');
    Route::patch('ndolares/retiro', 'ndolaresController@insertarRetiro')->name('ndolares.retiro.store');
    Route::get('ndolares/retiro', 'ndolaresController@retiro')->name('ndolares.retiro');

  });
   /*
|--------------------------------------------------------------------------
| Ruta de grupos
|--------------------------------------------------------------------------
|*/
    Route::prefix('grupos')->group(function () {
    Route::get('/', 'grposController@index')->name('grupos.index'); //LISTA DE ALUMNOS
    Route::get('{grupo}/edit', 'grposController@edit')->name('grupos.edit'); //LISTA DE ALUMNOS
    Route::patch('{id}/orden', 'grposController@update')->name('grupos.update'); //ACTUALIZAR DATOS EN LA BASE DE DATOS
    Route::patch('{id}/email', 'grposController@email')->name('grupos.email');
});

 /*
|--------------------------------------------------------------------------
| Ruta de docentes
|--------------------------------------------------------------------------
|*/
  Route::prefix('docente')->group(function () {
  //DOCENTES
    Route::get('lista', 'docentesController@index')->name('docentes.index');
    Route::get('registro', 'docentesController@create')->name('docentes.create');
    Route::get('{id}/info', 'docentesController@show')->name('docentes.show');
    Route::post('registro', 'docentesController@store')->name('docentes.store');
    Route::get('{id}/edit', 'docentesController@edit')->name('docentes.edit');
    Route::patch('{id}/actualizar', 'docentesController@update')->name('docentes.update');

  });
 /*
|--------------------------------------------------------------------------
| Ruta de descargas
|--------------------------------------------------------------------------
|*/

  });

    Route::get('setperiodo/{id}','IndexController@setPeriodo')->name('app.set.periodo');

   //Periodos
    Route::get('periodo','periodoController@index')->name('app.period.page');
    Route::get('periodo/listar','periodoController@listAll')->name('app.period.list');
    Route::post('periodo/insertar','periodoController@save')->name('app.period.save');
    Route::post('periodo/sesion','periodoController@setSession')->name('app.period.sesion');
    Route::post('periodo/eliminar','periodoController@delete')->name('app.period.delete');
//raqngos

    Route::get('rango','periodoRangoController@index')->name('rangos.index');
    Route::get('rango/listar','periodoRangoController@listAll')->name('app.range.list');
    Route::post('rango/insertar','periodoRangoController@save')->name('app.range.save');
    Route::post('rango/sesion','periodoRangoController@setSession')->name('app.range.sesion');
    Route::post('rango/eliminar','periodoRangoController@delete')->name('app.range.delete');

    //Cursos
    Route::get('curso','cursoController@index')->name('curso.index');
    Route::get('curso/listar','CourseController@listAll')->name('app.course.list');
    Route::post('curso/insertar','cursoController@store')->name('curso.store');
    Route::post('curso/sesion','CourseController@setSession')->name('app.course.sesion');
    Route::post('curso/eliminar','CourseController@delete')->name('app.course.delete');

    Route::prefix('download')->group(function () {

      Route::get('ndolarTransacciones/{id}', 'infoNdolarController@export')->name('info_ndolar.export');
      Route::get("exportar_asistencia/{grupo}","archivosController@export_asistencia")->name("exportar_asistencia");
      Route::get("exportar_lista/{grupo}","archivosController@export_lista")->name("exportar_lista");
      Route::get("exportar_ndolar_info/{id}/{nombre}","archivosController@export_ndolar_info")->name("exportar_ndolar_info");
      Route::get("exportar_calificacion/{id}","archivosController@export_calificacion")->name("exportar_calificacion");
      //DESCARGAS DE ARCHIVOS
      Route::get('archivos', 'archivosController@index')->name('archivosD.index');
      Route::get('lista-ndolarTransacciones', function () {
        return (new ndolarExport(2020))->download('LISTA_DOLARES.xlsx');
        });
      Route::get('lista-todos', function () {
        return (new UsersExport(2020))->download('lista2020.xlsx');
        });

        Route::get('/exp/{id}/{nombre}/{a}', 'archivosController@expedientePdf')->name('exp');

    });



