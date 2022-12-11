<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, UsuariosController, DjsController, MixesController, Solicitud_ventasController, GenerosController};


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

//Route::get('/', function () {
 //   return view('welcome');
//});

//SOLICITUDES
Route::get('/store/solicitud/{id}', [Solicitud_ventasController::class, 'store'])->name('store.solicitud');


//PAGINAS:
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/sign-in', [HomeController::class, 'signin'])->name('signin');
Route::get('/catalogo', [HomeController::class, 'catalogo'])-> name('Catalogo');
Route::get('/registro-dj',[HomeController::class, 'registroDj'])->name('registroDj');
Route::get('/catalogo', [MixesController::class, 'index'])->name('Catalogo');

Route::get('/djs', [HomeController::class, 'djs'])->name("Dj's");
Route::get('/djs',[DjsController::class, 'index'])->name("Dj's");



//USUARIO:
Route::post('/usuarios/store', [UsuariosController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/logout', [UsuariosController::class, 'logout'])->name('usuarios.logout');
Route::resource('/usuarios', UsuariosController::class);
Route::post('/usuarios/login', [UsuariosController::class, 'login'])->name('usuarios.login');



//PAGINA USUARIO
Route::get('/mi-cuenta', [HomeController::class, 'micuenta'])->name('cuenta.micuenta');



//DJ
Route::post('/djs/store', [DjsController::class, 'store'])->name('djs.store');
Route::get('/tipo_usuario', [UsuarioController::class, 'tipo_usuario'])->name('tipo_usuario');

Route::get('/prueba2', [HomeController::class, 'prueba2'])->name('prueba2');

//Route::resource('/djs', DjsController::class);

//MIX...



//SOLICITUDES
Route::get('/solicitudes/usuario', [Solicitud_ventasController::class, 'solicitud_cliente']);
Route::get('/solicitudes/dj', [Solicitud_ventasController::class, 'MisSolicitudesDj']);



//RESTRICCIONES..

Route::middleware(['auth', 'solo_usuario_dj'])-> group(function(){
    //Route::resource('usuarios', UsuriaoController::class)->parameters(['usuarios'=>'user']);

    Route::get('/MasterDj', [HomeController::class, 'masterDj'])->name('master.dj');
    Route::get('/MasterDj', [GenerosController::class, 'index'])->name('master.dj');
    Route::get('/ExtraerDj', [DjsController::class, 'extraerIdDj'])->name('extraer.id');
    Route::post('/mixes/store', [MixesController::class, 'store'])->name('mixes.store');
    Route::get('/pruebaID', [MixesController::class, 'pruebasID'])->name('id');
    Route::get('/ListarMix', [MixesController::class, 'listarPorDj'])->name('listar.mix.dj');
    Route::get('/Mis-Mix', [HomeController::class, 'misMix'])->name('mis.mix');
    Route::get('/Mis-Mix',[MixesController::class, 'mis_mix'])->name('mis.mix');
    Route::get('/mi-cuenta-dj',[HomeController::class, 'miCuentaDj'])->name('Mi cuenta');
    Route::get('/mi-cuenta-dj',[DjsController::class, 'extraerDatosDj'])->name('Mi cuenta');
    Route::get('/generos-artistas', [HomeController::class, 'agregarExtras'])->name('Genero Artistas');
    Route::post('/generos-artistas', [HomeController::class, 'agregarExtras'])->name('Genero Artistas');
   

//PRUEBAS:


});