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

Route::get('/welcome', function () {
    return view('index');
});

Route::get('mostrarusuarios', function () {
    $usuarios = usuario::all();
    return view('mostrarusuarios', compact('usuarios'));
})->middleware(['auth', 'sologerente'])->name('mostrarusuarios');

Route::get('mostrarsectores', function () {
   $sectores = sectorizacion::with('lote')->get();
   return view('mostrarsectores', compact('sectores'));
})->middleware(['auth', 'sologerente'])->name('mostrarsectores');

Route::get('mostrarsalidas', function () {
    $salidas = traslado::with('bovino.raza', 'motivo')->whereNotNull('fechas_traslado')->whereNotNull('horas_traslado')->get();
    return view('mostrarsalidas', compact('salidas'));
})->middleware(['auth', 'sologerente'])->name('mostrarsalidas');

Route::get('mostrarretornos', function () {
    $retornos = traslado::with('bovino.raza', 'motivo')->whereNotNull('fechar_traslado')->whereNotNull('horar_traslado')->get();
    return view('mostrarretornos', compact('retornos'));
})->middleware(['auth', 'sologerente'])->name('mostrarretornos');

Route::get('mostrarproveedores', function () {
    $proveedores = proveedor::all();
    return view('mostrarproveedores', compact('proveedores'));
})->middleware(['auth', 'sologerente'])->name('mostrarproveedores');

Route::get('mostrarmuertes', function () {
    $bajas = baja::with('bovino.raza')->get();
    return view('mostrarmuertes', compact('bajas'));
})->middleware(['auth', 'sologerente'])->name('mostrarmuertes');

Route::get('mostrarlotes', function () {
    $lotes = lote::with('estado')->withCount('bovinos')->get();
    return view('mostrarlotes', compact('lotes'));
})->middleware(['auth', 'sologerente'])->name('mostrarlotes');

Route::get('mostrarcomercios', function () {
    $comercios = comercio::with('proveedor')->get();
    return view('mostrarcomercios', compact('comercios'));
})->middleware(['auth', 'sologerente'])->name('mostrarcomercios');

Route::get('comercios', function () {
    $comercios = comercio::with('proveedor')->get();
    return view('comercios', compact('comercios'));
})->middleware(['auth', 'soloadmin'])->name('comercios');

Route::get('proveedores', function () {
    $proveedores = proveedor::all();
    return view('proveedores', compact('proveedores'));
})->middleware(['auth', 'soloadmin'])->name('proveedores');

Route::get('salidas', function () {
    $salidas = traslado::with('bovino.raza', 'motivo')->whereNotNull('fechas_traslado')->whereNotNull('horas_traslado')->get();
    return view('salidas', compact('salidas'));
})->middleware(['auth', 'soloadmin'])->name('salidas');

Route::get('retornos', function () {
    $retornos = traslado::with('bovino.raza', 'motivo')->whereNotNull('fechar_traslado')->whereNotNull('horar_traslado')->get();
    return view('retornos', compact('retornos'));
})->middleware(['auth', 'soloadmin'])->name('retornos');

Route::get('muertes', function () {
    $bajas = baja::with('bovino.raza')->get();
    return view('muertes', compact('bajas'));
})->middleware(['auth', 'soloadmin'])->name('muertes');

Route::get('sectores', function () {
    $sectores = sectorizacion::with('lote')->get();
    return view('sectores', compact('sectores'));
})->middleware(['auth', 'soloadmin'])->name('sectores');

Route::get('mostrarestado', function () {
    return view('mostrarestado');
})->middleware(['auth', 'solocapataz'])->name('mostrarestado');

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
})->middleware(['auth', 'solocapataz'])->name('mostrarestadolote');

Route::get('mostrar', function () {
    $lotes = lote::with('estado')->get();
    return view('mostrar', compact('lotes'));
})->middleware(['auth', 'soloadmin'])->name('mostrar');

Route::get('mostrarganado', function () {
    $bovinos = bovino::with('estado', 'raza', 'usuario', 'lote')->get();
    return view('mostrarganado', compact('bovinos'));
})->middleware(['auth', 'soloadmin'])->name('mostrarganado');

Route::get('ganadousuario', function () {
    $bovinos = bovino::with('estado', 'raza', 'usuario', 'lote')->get();
    return view('ganadousuario', compact('bovinos'));
})->middleware(['auth', 'sologerente'])->name('ganadousuario');

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
})->middleware(['auth', 'solocapataz'])->name('ubicacion');

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
})->middleware(['auth', 'soloadmin'])->name('homeubicacion');

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
})->middleware(['auth', 'sologerente'])->name('userubicacion');


//route::resource('usuarios','App\Http\Controllers\UsuariosController')->middleware(['auth', 'solocapataz']);
route::resource('bovino','App\Http\Controllers\BovinoController')->middleware(['auth', 'solocapataz']);
route::resource('lote','App\Http\Controllers\LoteController')->middleware(['auth', 'solocapataz']);
route::resource('raza','App\Http\Controllers\RazaController')->middleware(['auth', 'solocapataz']);
route::resource('estado','App\Http\Controllers\EstadoController')->middleware(['auth', 'solocapataz']);
route::resource('comercio','App\Http\Controllers\ComercioController')->middleware(['auth', 'solocapataz']);
//route::resource('ubicacion','App\Http\Controllers\UbicacionController')->middleware(['auth', 'solocapataz']);

route::resource('baja','App\Http\Controllers\BajaController')->middleware(['auth', 'solocapataz']);
route::resource('alerta','App\Http\Controllers\AlertaController')->middleware(['auth', 'solocapataz']);
route::resource('estadolote','App\Http\Controllers\EstadoloteController')->middleware(['auth', 'solocapataz']);
route::resource('motivotraslado','App\Http\Controllers\MotivotrasladoController')->middleware(['auth', 'solocapataz']);
route::resource('proveedor','App\Http\Controllers\ProveedorController')->middleware(['auth', 'solocapataz']);
route::resource('sectorizacion','App\Http\Controllers\SectorizacionController')->middleware(['auth', 'solocapataz']);
route::resource('traslado','App\Http\Controllers\TrasladoController')->middleware(['auth', 'solocapataz']);
route::resource('retorno','App\Http\Controllers\RetornoController')->middleware(['auth', 'solocapataz']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('soloadmin')->name('home');
Route::get('/user', [App\Http\Controllers\HomeController::class, 'getUser'])->middleware('sologerente');
Route::get('/capataz', [App\Http\Controllers\HomeController::class, 'getCapataz'])->middleware('solocapataz');
Route::get('ubicaciones/coordenadas', [App\Http\Controllers\UbicacionController::class, 'getUbicaciones'])->name('ubicaciones.coordenadas');
Route::get('alertas', [App\Http\Controllers\AlertaController::class, 'getAlertasNuevas'])->name('alertas.nuevas');

Route::get('user/password', 'App\Http\Controllers\UserController@password')->middleware(['auth', 'soloadmin']);
Route::post('user/updatepassword', 'App\Http\Controllers\UserController@updatePassword')->middleware(['auth', 'soloadmin']);

route::resource('administrador','App\Http\Controllers\CreateUserController')->middleware(['auth', 'soloadmin']);



