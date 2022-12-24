<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\{Auth, Hash};
use App\Http\Requests\UsuariosRequest;
use App\Http\Controllers\DjsController;
use App\Models\Dj;

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
        $usuarios = Usuario::all();
        return view('admin.lista_usuarios', compact('usuarios'));
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
        $edad = Carbon::createFromDate($request->fecha_nacimiento)->age;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->numero_celular = $request->numero_celular;
        $usuario->password = Hash::make($request->password);
        $usuario->tipo_usuario = $request->tipo_usuario;
        if($edad<18){
            $mensaje = 'Tienes que ser mayor de 18 años.';
            return back()->withErrors($mensaje);
        }else{
            $usuario->save();
        }
        
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
    public function update(Request $request, $id)
    {
        //
        $usuario = Usuario::findOrFail($id);
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->numero_celular = $request->numero_celular;

        $usuario->save();

        if($usuario->tipo_usuario == 'C'){
            return redirect()->route('Mis datos');
        }else{
            return redirect()->route('Mi Cuenta DJ');
        }
        
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


            if($usuario->estado_cuenta == 'IA'){
                return back()->withErrors('Has sido inhabilitado por el administrador. Si quieres mas información toma contacto con administracion@dmix.cl');
            }elseif($usuario->estado_cuenta == 'BU'){
                return back()->withErrors('Esta cuenta fue borrada por el usuario.');
            }
            
            if($usuario->tipo_usuario=='C'){
                return redirect()->route('Catalogo');
            }elseif($usuario->tipo_usuario == 'D'){
                return redirect()->route('Catalogo');
            }elseif($usuario->tipo_usuario == 'A'){
                return redirect()->route('Usuarios');
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

    public function editar_usuario($id){
        $usuarios = Usuario::findOrFail($id);

        //return $usuarios;

        return view('cuenta.editar_usuario', compact('usuarios'));
    }
    

    public function inhabilitar_user($id){
        $usuario = Usuario::findOrFail($id);
        $dj = Dj::where('usuario_id', '=', $id)->where('estado_cuenta', '=', 'A')->get();

        if(!$dj->count()){
            $usuario->estado_cuenta = 'IA';
            $usuario->save();
            return redirect()->route('Usuarios')->with('mensaje', 'ok');
        }else{
            return redirect()->route('Usuarios')->with('error', 'dj');
        }  
    }

    public function rediAdminDj($id){
        $djs = Dj::where('usuario_id', '=', $id)->get();

        return view('admin.lista_dj',compact('djs'));
    }


}
