<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DatatableController;


Route::get('', [HomeController::class,'index'])->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::resource('user',UserController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);

Route::get('datatable/users', [DatatableController::class,'user']);

Route::get('datatable/users/edit', [DatatableController::class,'edit']);

//Route::resource('users', UserController::class)->names(admin.users);

Route::resource('users',UserController::class)->middleware('auth');
Auth::routes(['register'=>true,'reset'=>false]);



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
// Route::get('/empleado', function () {
//     return view('empleado.index');
// });

// Route::get('/empleado/create', [EmpleadoController::class,'create']);

Route::resource('empleado',EmpleadoController::class)->middleware('auth');

Auth::routes(['register'=>true,'reset'=>false]);

// Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware' =>'auth'], function () {
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});

 Route::get('/prueba', function () {
    return view('welcome');
});