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
        $rds = Solicitud_venta::selectRaw("count(mix_id) as cantidad")
        ->select('djs.id','djs.nombreDj', Solicitud_venta::raw('count(mix_id)'))
        ->join('mixes', 'mix_id', '=', 'mixes.id')
        ->join('djs', 'mixes.dj_id', '=', 'djs.id')
        ->where('estado', '=', 'A')
        ->groupBy('djs.nombreDj', 'id')
        ->orderBy(Solicitud_venta::raw('count(mix_id)'), 'DESC')->take(3)
        ->get();
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
    
    public function listar_interprete(){
        return view('mixes.interprete.listar_interprete');
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

    public function agregar_genero(){
        return view('admin.genero.agregar_genero');
    }

    public function edit_genero(){
        return view('admin.genero.editar_genero');
    }

    public function agregar_interprete(){
        return view('admin.interprete.agregar_interprete');
    }

    public function edit_interprete(){
        
        return view('admin.interprete.editar_interprete');
    }
}
