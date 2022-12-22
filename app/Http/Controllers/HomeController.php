<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\{Auth, Hash};

class HomeController extends Controller
{
    public function __construct() {
        //if(Auth::user()->tipo_usuario=='C'){
            
        //
        $this->middleware('auth')->except(['login', 'index', 'signin', 'registroDj', 'usuarios_admin', 'djs_admin']);
    }


    public function index(){
        //dd('Hola Mundo');
        return view('home.index');
    }
    public function login(){
        return view('iniciar_sesion');
    }
    public function signin(){
        return view('registrarse');
    }

    public function registroDj(){
        return view('dj.registro_dj');
    }


//DJ
    public function agregarMix(){
        return view('dj.agregar_mix');
    }

    public function misMix(){
        return view('mixes.mis_mix');
    }

    public function miCuentaDj(){
        return view('dj.mi_cuenta');
    }

    public function djs(){
        return view('dj.listar_dj');
    }

    public function solicitud_Dj(){
        return view('dj.solicitudes_dj');
    }

    public function editarDj(){
        return view('dj.editar_dj');
    }
// FIN DJ


//CLIENTE
    public function miCuenta(){
        return view('cuenta.mi_cuenta');
    }

    public function solicitudCliente(){
        return view('solicitudes_cliente');
    }

//FIN CLIENTE


//GENERAL
    public function catalogo(){
        return view('mixes.catalogo');
    }

    public function porDj(){
        return view('mixes.por_dj');
    }


    public function buscarGenero(){
        return view('mixes.genero_buscador');
    }

    public function filtrarGenero(){
        return view('mixes.filtrar_genero');
    }

    public function editar_usuario(){
        return view('cuenta.editar_usuario');
    }



//FIN GENERAL


//ADMINISTRADOR!    

    public function usuarios_admin(){
        return view('admin.lista_usuarios');
    }
    public function djs_admin(){
        return view('admin.lista_dj');
    }
    public function generos_admin(){
        return view('admin.lista_generos');
    }
    public  function interpretes_admin(){
        return view('admin.lista_interpretes');
    }
}
