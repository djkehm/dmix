<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, UsuariosController, DjsController, MixesController, Solicitud_ventasController, GenerosController, InterpretesController, BusquedaController};


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

//EDITAR USUARIO
Route::get('/editar/cuenta/{id}', [UsuariosController::class, 'editar_usuario'])->name('Editar Datos');
Route::post('/editar/cuenta/{id}', [HomeController::class, 'editar_usuario'])->name('Editar Datos');
Route::post('/ususario/editar/enviar/{id}', [UsuariosController::class, 'update'])->name('ususario.update');

//GENEEROS
Route::get('/buscar/genero', [HomeController::class, 'buscarGenero'])->name('Buscar Genero');
Route::get('/buscar/genero', [GenerosController::class, 'buscarGenero'])->name('Buscar Genero');

Route::get('/buscar/genero/{id}', [HomeController::class, 'filtrarGenero'])->name('Filtro Genero');
Route::get('/buscar/genero/{id}', [GenerosController::class, 'filtrarGenero'])->name('Filtro Genero');
//FIN GENERO

//CREAR SOLICITUD
Route::get('/store/solicitud/{id}', [Solicitud_ventasController::class, 'store'])->name('store.solicitud');



//SOLICITUDES POR USUARIO-CLIENTE:
Route::get('/solicitud/cliente', [HomeController::class, 'solicitudCliente'])->name('Mis Solicitudes');
Route::get('/solicitud/cliente', [Solicitud_ventasController::class, 'solicitud_cliente'])->name('Mis Solicitudes');

//SOLICITUDES POR DJ:


//MIX POR DJ->CLIENTES.
Route::get('/catalogo/dj/{id}', [HomeController::class, 'porDj'])->name('mixDj');
Route::get('/catalogo/dj/{id}', [MixesController::class, 'mix_por_dj'])->name('mixDj');


//PAGINAS:
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/sign-in', [HomeController::class, 'signin'])->name('signin');
Route::get('/catalogo', [HomeController::class, 'catalogo'])-> name('Catalogo');
Route::get('/registro-dj',[HomeController::class, 'registroDj'])->name('registroDj');
Route::get('/catalogo', [MixesController::class, 'index'])->name('Catalogo');



//VER POR DJ
Route::get('/djs', [HomeController::class, 'djs'])->name("Dj's");
Route::get('/djs',[DjsController::class, 'index'])->name("Dj's");



//USUARIO:
Route::post('/usuarios/store', [UsuariosController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/logout', [UsuariosController::class, 'logout'])->name('usuarios.logout');
Route::resource('/usuarios', UsuariosController::class);
Route::post('/usuarios/login', [UsuariosController::class, 'login'])->name('usuarios.login');



//PAGINA USUARIO
Route::get('/mi-cuenta', [HomeController::class, 'miCuenta'])->name('Mis datos');



//DJ
Route::post('/djs/store', [DjsController::class, 'store'])->name('djs.store');
Route::get('/tipo_usuario', [UsuarioController::class, 'tipo_usuario'])->name('tipo_usuario');



//Route::resource('/djs', DjsController::class);

//MIX...



//SOLICITUDES
Route::get('/solicitudes/usuario', [Solicitud_ventasController::class, 'solicitud_cliente']);


//ADMIN


//RESTRICCIONES..

Route::middleware(['auth', 'solo_usuario_dj'])-> group(function(){
    //Route::resource('usuarios', UsuriaoController::class)->parameters(['usuarios'=>'user']);

    Route::get('/agregar/mix', [HomeController::class, 'agregarMix'])->name('Agregar Mix');
    Route::get('/agregar/mix', [GenerosController::class, 'index'])->name('Agregar Mix');
    Route::get('/agregar/mix', [BusquedaController::class, 'index'])->name('Agregar Mix');
    Route::get('/agregar/mix', [BusquedaController::class, 'buscador'])->name('Agregar Mix');

    Route::get('/ExtraerDj', [DjsController::class, 'extraerIdDj'])->name('extraer.id');
    Route::post('/mixes/store', [MixesController::class, 'store'])->name('mixes.store');


    Route::get('/ListarMix', [MixesController::class, 'listarPorDj'])->name('listar.mix.dj');



    Route::get('/Mis-Mix', [HomeController::class, 'misMix'])->name('mis.mix');
    Route::get('/Mis-Mix',[MixesController::class, 'mis_mix'])->name('mis.mix');



    Route::get('/mi-cuenta-dj',[HomeController::class, 'miCuentaDj'])->name('Mi Cuenta DJ');
    Route::get('/mi-cuenta-dj',[DjsController::class, 'extraerDatosDj'])->name('Mi Cuenta DJ');



    Route::get('/solicitud/dj', [HomeController::class, 'solicitudDj'])->name('solicitud.dj');
    Route::get('/solicitud/dj', [Solicitud_ventasController::class, 'solicitud_dj'])->name('solicitud.dj');


    Route::post('/editar/cuenta/{id}', [HomeController::class, 'editar_usuario'])->name('Editar Datos');
    Route::get('/editar/cuenta/{id}', [UsuariosController::class, 'editar_usuario'])->name('Editar Datos');
    
    Route::post('/ususario/editar/enviar/{id}', [UsuariosController::class, 'update'])->name('ususario.update');
    
    
    Route::get('/dj/editar/{id}', [HomeController::class, 'editarDj'])->name('Editar DJ');
    Route::get('/dj/editar/{id}', [DjsController::class, 'edit'])->name('Editar DJ');
    Route::post('/dj/editar/{id}', [DjsController::class, 'update'])->name('dj.update');

    Route::get('/update/solicitud/{id}/{estado}', [Solicitud_ventasController::class, 'update'])->name('update.solicitud');


    Route::get('/mix/eliminar/{id}', [MixesController::class, 'destroy'])->name('eliminar.mix');


    
    Route::get('/mix/editar/{id}', [HomeController::class, 'editarMix'])->name('Editar Mix');
    Route::get('/mix/editar/{id}', [MixesController::class, 'edit'])->name('Editar Mix');
    Route::post('/mix/editar/{id}', [MixesController::class, 'update'])->name('Editar Mix');


    Route::get('/solicitudes/dj', [HomeController::class, 'solicitud_Dj'])->name('Solicitudes');    
    Route::get('/solicitudes/dj', [Solicitud_ventasController::class, 'solicitud_dj'])->name('Solicitudes');
//PRUEBAS:

});

Route::middleware(['auth', 'solo_usuario_admin'])-> group(function(){
        //USUARIOS-ADMIN
    Route::get('/admin/usuarios', [HomeController::class, 'usuarios_admin'])->name('Usuarios');
    Route::get('/admin/usuarios', [UsuariosController::class, 'index'])->name('Usuarios');
    //DJS-ADMIN
    Route::get('/admin/djs', [HomeController::class, 'djs_admin'])->name("DJ's");
    Route::get('/admin/djs', [DjsController::class, 'djs_admin'])->name("DJ's");
    Route::get('/admin/djs/eliminar/{id}', [DjsController::class, 'eliminarDjAdmin'])->name('Eliminar DJ');
    

    //GENEROS-ADMIN
    Route::get('/admin/generos', [HomeController::class, 'generos_admin'])->name('Generos');
    Route::get('/admin/generos', [GenerosController::class, 'generos_admin'])->name('Generos');
    //INTERPRETES-ADMIN
    Route::get('/admin/interpretes', [HomeController::class, 'interpretes_admin'])->name('Interpretes');
    Route::get('/admin/interpretes', [InterpretesController::class, 'interpretes_admin'])->name('Interpretes');
});