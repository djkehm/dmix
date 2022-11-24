<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['login', 'index', 'signin']);
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

    public function prueba(){
        return view('pruebas');
    }

}
