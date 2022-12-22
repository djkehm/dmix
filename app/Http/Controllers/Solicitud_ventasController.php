<?php

namespace App\Http\Controllers;

use App\Models\Solicitud_venta;
use Illuminate\Http\Request;
use App\Models\Mix;
use Illuminate\Support\Carbon;
use App\Models\Dj;
use App\Http\Controllers\DjsController;
use App\Models\Usuario;
use Illuminate\Support\Facades\{Auth, Hash};

class Solicitud_ventasController extends Controller
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
    public function store(Request $request,$id)
    {
        $id_user = Auth::user()->id ;
        $now = today();
        $verificar_solicitud = Solicitud_venta::select('solicitud_ventas.id')->where([['usuario_id','=', $id_user],['mix_id','=', $id]])->get();
        $verificar_dj = Dj::where('usuario_id', '=', $id_user);
        if(!$verificar_solicitud->count()){

            if(!$verificar_dj->count()){
                
                $solicitud = new Solicitud_venta();
                $solicitud->usuario_id = $id_user;
                $solicitud->mix_id = $id;
                $solicitud->fecha_solicitud = $now;
                $solicitud->fecha_actualizacion = $now;
                $solicitud->estado = "P";
                $solicitud->save();
                
                $respuestas = 'Solicitud realizada';
                return back()->withErrors($respuestas);
            }else{
                $respuesta = 'Usted es el creador de este Mix, No puede autosolicitarlo';
                return back()->withErrors($respuesta);  
            }
             
        }else{
            $respuesta = 'Ya cuenta con una solicitud para este Mix';
            return back()->withErrors($respuesta);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solicitud_venta  $solicitud_venta
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud_venta $solicitud_venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solicitud_venta  $solicitud_venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud_venta $solicitud_venta, $id, $estado)
    {
        //
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solicitud_venta  $solicitud_venta
     * @return \Illuminate\Http\Response
     */
    public function update($id, $estado)
    {
        //
        $now = today();
        $solicitud = Solicitud_venta::findOrFail($id);
        $solicitud->estado = $estado;
        $solicitud->fecha_actualizacion = $now;
        $solicitud->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solicitud_venta  $solicitud_venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud_venta $solicitud_venta)
    {
        //
    }

    
    public function solicitud_cliente(){
        $auth_id = Auth::user()->id;
        $solicitudes= Solicitud_venta::where('solicitud_ventas.usuario_id', '=', $auth_id)->get();

        return view('solicitudes_cliente')->with('solicitudes', $solicitudes);
    }

    public function solicitud_dj(){
        $auth_id = Auth::user()->id;
        $dj = Dj::select('djs.id')->where('usuario_id', '=',$auth_id)->value('id');
        $solicitudes= Solicitud_venta::join('mixes','mixes.id', '=', 'mix_id')
        ->join('usuarios','usuario_id','=','usuarios.id')
        ->select('solicitud_ventas.id','usuarios.nombre as nombreClie', 'mixes.nombre', 'usuarios.numero_celular', 'estado', 'usuarios.email','fecha_actualizacion','mixes.precio')
        ->where('mixes.dj_id', '=', $dj)->get();

        return view('dj.solicitudes_dj')->with('solicitudes', $solicitudes);
        //return $solicitudes;

    }
}
