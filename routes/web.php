<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, UsuariosController};


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


//PAGINAS:
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/sign-in', [HomeController::class, 'signin'])->name('signin');
Route::get('/prueba', [HomeController::class, 'prueba'])-> name('Catalogo');



//USUARIO:
Route::post('/usuarios/store', [UsuariosController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/logout', [UsuariosController::class, 'log_out'])->name('usuarios.logout');
Route::resource('/usuarios', UsuariosController::class);
Route::post('/usuarios/login', [UsuariosController::class, 'login'])->name('usuarios.login');



//PAGINA USUARIO
Route::get('/mi-cuenta', [HomeController::class, 'micuenta'])->name('cuenta.micuenta');

