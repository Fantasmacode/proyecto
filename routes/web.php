<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

use App\Http\Controllers\CreateUserController;




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

Route::get('mostrarusuarios', function () {
    return view('mostrarusuarios');
})->name('mostrarusuarios');

Route::get('mostrarsectores', function () {
    return view('mostrarsectores');
})->name('mostrarsectores');

Route::get('mostrarsalidas', function () {
    return view('mostrarsalidas');
})->name('mostrarsalidas');

Route::get('mostrarretornos', function () {
    return view('mostrarretornos');
})->name('mostrarretornos');

Route::get('mostrarproveedores', function () {
    return view('mostrarproveedores');
})->name('mostrarproveedores');

Route::get('mostrarmuertes', function () {
    return view('mostrarmuertes');
})->name('mostrarmuertes');

Route::get('mostrarlotes', function () {
    return view('mostrarlotes');
})->name('mostrarlotes');

Route::get('mostrarcomercios', function () {
    return view('mostrarcomercios');
})->name('mostrarcomercios');


Route::get('comercios', function () {
    return view('comercios');
})->name('comercios');

Route::get('proveedores', function () {
    return view('proveedores');
})->name('proveedores');

Route::get('salidas', function () {
    return view('salidas');
})->name('salidas');

Route::get('retornos', function () {
    return view('retornos');
})->name('retornos');

Route::get('muertes', function () {
    return view('muertes');
})->name('muertes');

Route::get('sectores', function () {
    return view('sectores');
})->name('sectores');

Route::get('mostrarestado', function () {
    return view('mostrarestado');
})->name('mostrarestado');

Route::get('mostrarestadolote', function () {
    return view('mostrarestadolote');
})->name('mostrarestadolote');

Route::get('mostrar', function () {
    return view('mostrar');
})->name('mostrar');

Route::get('mostrarganado', function () {
    return view('mostrarganado');
})->name('mostrarganado');

Route::get('ganadousuario', function () {
    return view('ganadousuario');
})->name('ganadousuario');

Route::get('ubicacion', function () {
    return view('ubicacion');
})->name('ubicacion');

Route::get('homeubicacion', function () {
    return view('homeubicacion');
})->name('homeubicacion');

Route::get('userubicacion', function () {
    return view('userubicacion');
})->name('userubicacion');


route::resource('usuarios','App\Http\Controllers\UsuariosController')->middleware('auth');
route::resource('bovino','App\Http\Controllers\BovinoController')->middleware('auth');
route::resource('lote','App\Http\Controllers\LoteController')->middleware('auth');
route::resource('raza','App\Http\Controllers\RazaController')->middleware('auth');
route::resource('estado','App\Http\Controllers\EstadoController')->middleware('auth');
route::resource('comercio','App\Http\Controllers\ComercioController')->middleware('auth');
//route::resource('ubicacion','App\Http\Controllers\UbicacionController')->middleware('auth');

route::resource('baja','App\Http\Controllers\BajaController')->middleware('auth');
route::resource('alerta','App\Http\Controllers\AlertaController')->middleware('auth');
route::resource('estadolote','App\Http\Controllers\EstadoloteController')->middleware('auth');
route::resource('motivotraslado','App\Http\Controllers\MotivotrasladoController')->middleware('auth');
route::resource('proveedor','App\Http\Controllers\ProveedorController')->middleware('auth');
route::resource('sectorizacion','App\Http\Controllers\SectorizacionController')->middleware('auth');
route::resource('traslado','App\Http\Controllers\TrasladoController')->middleware('auth');
route::resource('retorno','App\Http\Controllers\RetornoController')->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [App\Http\Controllers\HomeController::class, 'getUser']);
Route::get('/capataz', [App\Http\Controllers\HomeController::class, 'getCapataz']);

Route::get('user/password', 'App\Http\Controllers\UserController@password');
Route::post('user/updatepassword', 'App\Http\Controllers\UserController@updatePassword');

route::resource('administrador','App\Http\Controllers\CreateUserController')->middleware('auth');



