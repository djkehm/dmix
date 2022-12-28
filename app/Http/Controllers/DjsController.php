<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\{Auth, Hash};
use App\Models\Dj;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\DjsRequest;
use App\Models\Mix;
use App\Models\Solicitud_venta;
class DjsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscarporDj = $request->get('buscarporDj');
        if(!$buscarporDj){
            $djs = Dj::all();;
            return view('dj.listar_dj', compact('djs', 'buscarporDj'));
        }else{
            $djs = Dj::where('nombreDj', 'like', '%'.$buscarporDj.'%')->get();
            return view('dj.listar_dj', compact('djs', 'buscarporDj'));
        }

       

        return view('dj.listar_dj',compact('djs', 'buscarporDj'));
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
    
    

    
    public function store(DjsRequest $request)
    {
        //
        
        $dj = new Dj();
        $dj->nombreDj = $request->nombre;
        $dj->email = $request->email;
        $dj->numero_celular = $request->numero_celular;
        $dj->usuario_id = $usuario_id = Usuario::latest()->value('id');
        $dj->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dj  $dj
     * @return \Illuminate\Http\Response
     */
    public function show(Dj $dj)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dj  $dj
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $djs = Dj::findOrFail($id);

        return view('dj.editar_dj', compact('djs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dj  $dj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dj = Dj::findOrFail($id);
        $dj->nombreDj = $request->nombre;
        $dj->email = $request->email;
        $dj->numero_celular = $request->numero_celular;

        $dj->save();

        return redirect()->route('Mi Cuenta DJ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dj  $dj
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $dj = Dj::findOrFail($id);
        $usuario = Usuario::findOrFail($dj->usuario_id);
        $dj->estado_cuenta = 'EU';
        $usuario->tipo_usuario = 'C';
        $dj->save();
        $usuario->save();
        Auth::logout();
        return redirect()->route('login');

    }



    public function extraerIdDj(){
        $dj = Usuario::select('djs.id')->join('djs', 'usuarios.id', '=','djs.usuario_id')->get();

        return $dj;
    }

    public function extraerDatosDj(){
        $auth_id = Auth::user()->id;
        $djID = Usuario::select('djs.id')->join('djs', 'usuarios.id', '=','djs.usuario_id')->where('djs.usuario_id', '=', $auth_id)->value('djs.id');
        $djs = Dj::select('djs.id','djs.nombreDj','djs.email','djs.numero_celular')
        ->join('usuarios', 'usuarios.id', '=', 'djs.usuario_id')
        ->where('djs.id', '=', $djID)->get();
    
        return view('dj.mi_cuenta')->with('djs', $djs);
    }
    
    public function djs_admin(){
        $djs = DJ::all();
        return view('admin.lista_dj', compact('djs'));
    }

    public function validacionContenido($id){
        
        $dj = DJ::findOrFail($id);

        $mixes = Mix::where('dj_id', '=', $dj->id)->get();

        $solicitudes = Solicitud_venta::join('mixes', 'mix_id', '=', 'mixes.id')
        ->join('djs', 'dj_id', '=', 'djs.id')
        ->where('mixes.dj_id', '=', $dj->id)->get();

        if($mixes->count()<>0 || $solicitudes->count()<>0){
            return redirect()->route("DJ's")->with('dj', $dj->id);
        }else{
            $dj->estado_cuenta = 'IA';
            $dj->save();
            return back()->with('mensaje', 'ok');
        }
        
    }

    public function pruebaJS(){
        return 'Funciono';
    }

    public function djContenido($id){
        $dj = Dj::findOrFail($id);
        $usuario = Usuario::findOrFail($dj->usuario_id);
        $dj->estado_cuenta = 'IA';
        $usuario->tipo_cuenta = 'C';
        $usuario->save();
        $dj->save();
        return redirect()->route("DJ's")->with('mensaje', 'ok');

    }
}
