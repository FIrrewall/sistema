<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
//use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DatatableController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Informes\InformeController;
use App\Http\Controllers\Informes\HddController;
use App\Http\Controllers\Informes\InventarioCctvController;
use App\Http\Controllers\Informes\InventarioAlarmaController;
use App\Http\Controllers\Informes\ZonificacionController;
use App\Http\Controllers\Informes\UsuariosAlarmaController;
use App\Http\Controllers\Informes\NumeroController;
use App\Http\Controllers\Informes\CctvController;
use App\Http\Controllers\Informes\TrabajosRealizadoController;
use App\Http\Controllers\Informes\PlanoController;
use App\Http\Controllers\Inventarios\InventariController;
use App\Http\Controllers\Inventarios\ExistenteController;
use App\Http\Controllers\Inventarios\EntradaController;
use App\Http\Controllers\Inventarios\SalidaController;
use App\Http\Controllers\Descargos\DescargoController;
use App\Http\Controllers\Descargos\CajaChicaController;
use App\Http\Controllers\Descargos\GastoController;
use App\Http\Controllers\Descargos\PasajeController;
use App\Http\Controllers\Descargos\ViaticoController;

/*
Route::get('/prueba', function () {
    return view('welcome');
 }); 

 Route::get('/', function () {
     return view('auth.login');
 });

 Route::get('/home', function () {
    return view('home');
 }); 
*/
/*Route::get('/empleado', function () {
     return view('empleado.index');
 });*/

// Route::get('/empleado/create', [EmpleadoController::class,'create']);


Route::get('/prueba', function () {
    return view('welcome');
});


// Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
//Route::resource('users', UserController::class)->names(admin.users);
//Route::resource('empleado', EmpleadoController::class)->middleware('auth');
//Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('informes', InformeController::class)->middleware('auth');
//Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('hdds', HddController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('inventarioCctvs', InventarioCctvController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('inventarioAlarmas', InventarioAlarmaController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('zonificaciones', ZonificacionController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('usuariosAlarma', UsuariosAlarmaController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('numeros', NumeroController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('registros', CctvController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('trabajosRealizados', TrabajosRealizadoController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('planos', PlanoController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

//Route::resource('inventarios', InventariController::class)->middleware('auth');
//Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('existentes', ExistenteController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('entradas', EntradaController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('salidas', SalidaController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('descargos', DescargoController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('cajas', CajaChicaController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('gastos', GastoController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('pasajes', PasajeController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('viaticos', ViaticoController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);




Route::get('work', [InformeController::class, 'work']);


Route::get('informes/work', function () {
    return view('hdd.index');
});

//Route::get('/inventarioAñadir/{id}', function ($id) {
//    return view('existente.index',compact('id'));
//});

//**********************************************************************************************************************
Route::get('/datosHdd/{id}', [HddController::class, 'index'])->middleware('auth');

Route::get('/cctvInventario/{id}', [InventarioCctvController::class, 'index'])->middleware('auth');

Route::get('/alarmaInventario/{id}', [InventarioAlarmaController::class, 'index'])->middleware('auth');

Route::get('/zonas/{id}', [ZonificacionController::class, 'index'])->middleware('auth');

Route::get('/alarmaUsuarios/{id}', [UsuariosAlarmaController::class, 'index'])->middleware('auth');

Route::get('/registroNumero/{id}', [NumeroController::class, 'index'])->middleware('auth');

Route::get('/trabajos/{id}', [TrabajosRealizadoController::class, 'index'])->middleware('auth');

Route::get('/planosAgencias/{id}', [PlanoController::class, 'index'])->middleware('auth');
//**********************************************************************************************************************

Route::get('/cajaChica/{id}', [CajaChicaController::class, 'index'])->middleware('auth');

Route::get('/registroGastos/{id}', [GastoController::class, 'index'])->middleware('auth');

Route::get('/registroPasajes/{id}', [PasajeController::class, 'index'])->middleware('auth');

Route::get('/registroViaticos/{id}', [ViaticoController::class, 'index'])->middleware('auth');


//**********************************************************************************************************************
Route::get('/datosInforme/{id}', [HddController::class, 'index'])->middleware('auth');

Route::get('/existenteInventario/{id}', [ExistenteController::class, 'index'])->middleware('auth');

Route::get('/entradaInventario/{id}', [EntradaController::class, 'index'])->middleware('auth');

Route::get('/salidaInventario/{id}', [SalidaController::class, 'index'])->middleware('auth');

//Route::get('/hdds/{id}', 'Hdd@index');


//**********************************************************************************************************************
Route::resource('home', HomeController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);
//Route::resource('user', UserController::class)->middleware('auth');
//Auth::routes(['register'=>true,'reset'=>false]);
Route::get('datatable/users', [DatatableController::class, 'user']);
Auth::routes(['register'=>true,'reset'=>false]);
Route::get('datatable/users/edit', [DatatableController::class, 'edit']);
Auth::routes(['register'=>true,'reset'=>false]);
//Route::resource('users', UserController::class)->middleware('auth');
//Auth::routes(['register'=>true,'reset'=>false]);
//**********************************************************************************************************************

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::resource('inventarios', InventariController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('users', UserController::class);
});



//**********************************************************************************************************************
