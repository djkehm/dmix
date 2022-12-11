<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};
use App\Http\Requests\UsuariosRequest;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuariosRequest $request)
    {
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->numero_celular = $request->numero_celular;
        $usuario->password = Hash::make($request->password);
        $usuario->tipo_usuario = $request->tipo_usuario;
        $usuario->save();
        if($usuario->tipo_usuario == 'D'){
            return redirect()->route('registroDj');
            //return dd('Elegiste Dj LPM');
        }
        if($usuario->tipo_usuario == 'C'){
            return redirect()->route('login');
            //return dd('Elegiste cliente CTM');
        }

        //return dd($usuario->tipo_usuario);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return Usuario::all();
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    public function login(Request $request){
        $credenciales = $request->only('email','password');

        if(Auth::attempt($credenciales)){
            //CREDENCIALES CORRECTAS
            $usuario = Usuario::where('email',$request->email)->first();
            
            if($usuario->tipo_usuario=='C'){
                return redirect()->route('Catalogo');
            }else{
                return redirect()->route('master.dj');
            }
            //return redirect()->route('prueba2');
            
        }else {
            //CREDENCIALES INCORRECTAS
            return back()->withErrors('Credenciales Incorrectas');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function tipo_usuario(){
        $usuario = Auth::user()->tipo_usuario;

        return Auth::user()->tipo_usuario;
    }
}
