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
        $this->middleware('auth')->except(['login', 'index', 'signin', 'registroDj']);
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
    public function dashboard(){
        return view('layouts.master');
    }

    public function micuenta(){
        return view('cuenta.mi_cuenta');
    }

    public function catalogo(){
        return view('mixes.catalogo');
    }

    public function registroDj(){
        return view('dj.registro_dj');
    }

    public function prueba1(){
        
        dd('SE PUDO CON DJ');
    }
    public function masterDj(){
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

    public function agregarExtras(){
        return view('mixes.agregar_extra');
    }

}
