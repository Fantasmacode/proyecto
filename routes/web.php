<?php

use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\UserController;
use App\Models\alerta;
use App\Models\baja;
use App\Models\bovino;
use App\Models\comercio;
use App\Models\lote;
use App\Models\proveedor;
use App\Models\sectorizacion;
use App\Models\traslado;
use App\Models\ubicacion;
use App\Models\usuario;
use Illuminate\Http\Request;
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

Route::get('mostrarusuarios', function () {
    $usuarios = usuario::all();
    return view('mostrarusuarios', compact('usuarios'));
})->name('mostrarusuarios');

Route::get('mostrarsectores', function () {
   $sectores = sectorizacion::with('lote')->get();
   return view('mostrarsectores', compact('sectores'));
})->name('mostrarsectores');

Route::get('mostrarsalidas', function () {
    $salidas = traslado::with('bovino.raza', 'motivo')->whereNotNull('fechas_traslado')->whereNotNull('horas_traslado')->get();
    return view('mostrarsalidas', compact('salidas'));
})->name('mostrarsalidas');

Route::get('mostrarretornos', function () {
    $retornos = traslado::with('bovino.raza', 'motivo')->whereNotNull('fechar_traslado')->whereNotNull('horar_traslado')->get();
    return view('mostrarretornos', compact('retornos'));
})->name('mostrarretornos');

Route::get('mostrarproveedores', function () {
    $proveedores = proveedor::all();
    return view('mostrarproveedores', compact('proveedores'));
})->name('mostrarproveedores');

Route::get('mostrarmuertes', function () {
    $bajas = baja::with('bovino.raza')->get();
    return view('mostrarmuertes', compact('bajas'));
})->name('mostrarmuertes');

Route::get('mostrarlotes', function () {
    $lotes = lote::with('estado')->withCount('bovinos')->get();
    return view('mostrarlotes', compact('lotes'));
})->name('mostrarlotes');

Route::get('mostrarcomercios', function () {
    $comercios = comercio::with('proveedor')->get();
    return view('mostrarcomercios', compact('comercios'));
})->name('mostrarcomercios');

Route::get('comercios', function () {
    $comercios = comercio::with('proveedor')->get();
    return view('comercios', compact('comercios'));
})->name('comercios');

Route::get('proveedores', function () {
    $proveedores = proveedor::all();
    return view('proveedores', compact('proveedores'));
})->name('proveedores');

Route::get('salidas', function () {
    $salidas = traslado::with('bovino.raza', 'motivo')->whereNotNull('fechas_traslado')->whereNotNull('horas_traslado')->get();
    return view('salidas', compact('salidas'));
})->name('salidas');

Route::get('retornos', function () {
    $retornos = traslado::with('bovino.raza', 'motivo')->whereNotNull('fechar_traslado')->whereNotNull('horar_traslado')->get();
    return view('retornos', compact('retornos'));
})->name('retornos');

Route::get('muertes', function () {
    $bajas = baja::with('bovino.raza')->get();
    return view('muertes', compact('bajas'));
})->name('muertes');

Route::get('sectores', function () {
    $sectores = sectorizacion::with('lote')->get();
    return view('sectores', compact('sectores'));
})->name('sectores');

Route::get('mostrarestado', function () {
    return view('mostrarestado');
})->name('mostrarestado');

Route::get('mostrarestadolote', function (Request $request) {
    $lotesselect = lote::all();
    $lotes = lote::with('estado')->withCount('bovinos')
        ->where( function($query) use($request){
            if ($request->id_lote) {
                return $query->where('id_lote',$request->id_lote);
            } else {
                return $query;
            }
        })
        ->paginate(10);

    $selected_id = [];
    $selected_id['id_lote'] = $request->id_lote;

    return view('mostrarestadolote', compact('lotes', 'lotesselect', 'selected_id'));
})->name('mostrarestadolote');

Route::get('mostrar', function () {
    $lotes = lote::with('estado')->get();
    return view('mostrar', compact('lotes'));
})->name('mostrar');

Route::get('mostrarganado', function () {
    $bovinos = bovino::with('estado', 'raza', 'usuario', 'lote')->get();
    return view('mostrarganado', compact('bovinos'));
})->name('mostrarganado');

Route::get('ganadousuario', function () {
    $bovinos = bovino::with('estado', 'raza', 'usuario', 'lote')->get();
    return view('ganadousuario', compact('bovinos'));
})->name('ganadousuario');

Route::get('ubicacion', function (Request $request) {
    $ubicaciones = ubicacion::with('bovino.raza')->get();

    $coordenadas = [];

    foreach($ubicaciones as $ubicacion)
    {
        array_push($coordenadas, array($ubicacion->bovino->raza->nombre_raz, $ubicacion->latitud_ubicacion, $ubicacion->longitud_ubicacion, $ubicacion->bovino->id_bovino));
    }
    $alertas = alerta::with('bovino.raza', 'bovino.lote', 'bovino.ubicacion')->get();
    $total = $alertas->count();
    return view('ubicacion', compact('coordenadas', 'alertas', 'total'));
})->name('ubicacion');

Route::get('homeubicacion', function () {
    $ubicaciones = ubicacion::with('bovino.raza')->get();

    $coordenadas = [];

    foreach($ubicaciones as $ubicacion)
    {
        array_push($coordenadas, array($ubicacion->bovino->raza->nombre_raz, $ubicacion->latitud_ubicacion, $ubicacion->longitud_ubicacion, $ubicacion->bovino->id_bovino));
    }
    $alertas = alerta::with('bovino.raza', 'bovino.lote', 'bovino.ubicacion')->get();
    $total = $alertas->count();
    return view('homeubicacion', compact('coordenadas', 'alertas', 'total'));
})->name('homeubicacion');

Route::get('userubicacion', function () {
    $ubicaciones = ubicacion::with('bovino.raza')->get();

    $coordenadas = [];

    foreach($ubicaciones as $ubicacion)
    {
        array_push($coordenadas, array($ubicacion->bovino->raza->nombre_raz, $ubicacion->latitud_ubicacion, $ubicacion->longitud_ubicacion, $ubicacion->bovino->id_bovino));
    }
    $alertas = alerta::with('bovino.raza', 'bovino.lote', 'bovino.ubicacion')->get();
    $total = $alertas->count();
    return view('userubicacion', compact('coordenadas', 'alertas', 'total'));
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
Route::get('ubicaciones/coordenadas', [App\Http\Controllers\UbicacionController::class, 'getUbicaciones'])->name('ubicaciones.coordenadas');

Route::get('user/password', 'App\Http\Controllers\UserController@password');
Route::post('user/updatepassword', 'App\Http\Controllers\UserController@updatePassword');

route::resource('administrador','App\Http\Controllers\CreateUserController')->middleware('auth');



