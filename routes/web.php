<?php

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
    return view('vistamain2');
});


//Historial Medico
Route::get('/HistorialMedico','HistorialMedicoController@create');
Route::get('/ya','CalificacionController@index');

Route::get('/altahist','HistorialMedicoController@altahist');
Route::POST('/guardaHistorialMedico','HistorialMedicoController@guardaHistorialMedico')->name('guardaHistorialMedico');
Route::get('/reporteHis','HistorialMedicoController@reporteHis');
Route::get('/eliminaHis/{IdHistorial}','HistorialMedicoController@eliminaHis')->name('eliminaHis');
Route::get('/modificaHis/{IdHistorial}','HistorialMedicoController@modificaHis')->name('modificaHis');
Route::POST('/modificaHistorial','HistorialMedicoController@modificaHistorial')->name('modificaHistorial');
Route::get('/restauraHis/{IdHistorial}','HistorialMedicoController@restauraHis')->name('restauraHis');
Route::get('/efisicaHis/{IdHistorial}','HistorialMedicoController@efisicaHis')->name('efisicaHis');



//Calificacion
Route::get('/altaCali','CalificacionController@altaCali')->name('altaCali');
Route::POST('/guardaCali','CalificacionController@guardaCali')->name('guardaCali');
Route::get('/reporteCali','CalificacionController@reporteCali');
Route::get('/eliminaCali/{IdCliente}','CalificacionController@eliminaCali')->name('eliminaCali');
Route::get('/modificaCali/{IdCliente}','CalificacionController@modificaCali')->name('modificaCali');
Route::POST('/modificaCalificacion','CalificacionController@modificaCalificacion')->name('modificaCalificacion');
Route::get('/restauraCali/{IdCliente}','CalificacionController@restauraCali')->name('restauraCali');
Route::get('/efisicaCali/{IdCliente}','CalificacionController@efisicaCali')->name('efisicaCali');

//Cliente
Route::get('/altaCli','ClienteController@altaCli');
Route::POST('/guardaCli','ClienteController@guardaCli')->name('guardaCli');
Route::get('/reporteCli','ClienteController@reporteCli');
Route::get('/eliminaCli/{IdCliente}','ClienteController@eliminaCli')->name('eliminaCli');
Route::get('/modificaCli/{IdCliente}','ClienteController@modificaCli')->name('modificaCli');
Route::POST('/modificaCliente','ClienteController@modificaCliente')->name('modificaCliente');
Route::get('/restauraCli/{IdCliente}','ClienteController@restauraCli')->name('restauraCli');
Route::get('/efisicaCli/{IdCliente}','ClienteController@efisicaCli')->name('efisicaCli');

Route::get('/alt','CitaController@alt');


//Mascota
Route::get('/altaMasc','MascotaController@altaMasc');
Route::POST('/guardaMasco','MascotaController@guardaMasco')->name('guardaMasco');
Route::get('/reporteMasco','MascotaController@reporteMasco');

Route::get('/eliminaMasco/{IdMascota}','MascotaController@eliminaMasco')->name('eliminaMasco');
Route::get('/modificaMasco/{IdMascota}','MascotaController@modificaMasco')->name('modificaMasco');
Route::POST('/modificaMascoLar','MascotaController@modificaMascoLar')->name('modificaMascoLar');
Route::get('/restauraMasco/{IdMascota}','MascotaController@restauraMasco')->name('restauraMasco');
Route::get('/efisicaMasco/{IdMascota}','MascotaController@efisicaMasco')->name('efisicaMasco');



//Cita
Route::get('/altaCita','CitaController@altaCita');
Route::POST('/guardaCita','CitaController@guardaCita')->name('guardaCita');

Route::get('/reporteCita','CitaController@reporteCita');
Route::get('/eliminaCita/{IdCita}','CitaController@eliminaCita')->name('eliminaCli');
Route::get('/modificaCita/{IdCita}','CitaController@modificaCita')->name('modificaCli');
Route::POST('/modificaCitaLar','CitaController@modificaCitaLar')->name('modificaCitaLar');
Route::get('/restauraCita/{IdCita}','CitaController@restauraCita')->name('restauraCita');
Route::get('/efisicaCita/{IdCita}','CitaController@efisicaCita')->name('efisicaCita');


Route::group(['/prefix' => 'admin'], function(){

    Route::resource('users','HistorialMedicoController');

});


