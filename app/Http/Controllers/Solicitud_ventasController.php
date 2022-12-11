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
        if(!$verificar_solicitud->count()){
             $solicitud = new Solicitud_venta();
             $solicitud->usuario_id = $id_user;
             $solicitud->mix_id = $id;
             $solicitud->fecha_solicitud = $now;
             $solicitud->fecha_actualizacion = $now;
             $solicitud->estado = "P";
             $solicitud->save();

            return $solicitud;
        }else{
            return 'Ya tiene una solicitud en este mix';
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
    public function update(Request $request, Solicitud_venta $solicitud_venta)
    {
        //
        $now = today();
        $solicitud = Solicitud_venta::findOrFail($id);
        $solicitud->estado = $estado;
        $solicitud->fecha_actualizacion = $now;

        return 'Ha sido actualizada';
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

    public function misSolicitudesDj(){
        $auth_id = Auth::user()->id;
        $dj = Solicitud_venta::select('djs.id')->join('mixes', 'mixes.id', '=','solicitud_ventas.mix_id')->join('djs', 'mixes.dj_id', '=', 'djs.id')->where('djs.usuario_id', '=', $auth_id)->value('djs.id');
        $solicitud = Solicitud_venta::select('mixes.id','estado')
        ->join('mixes', 'mixes.id', '=', 'solicitud_ventas.mix_id')
        ->where('mixes.dj_id', '=', $dj)->get();
    
        // return view('mixes.mis_mix')->with('mixes', $mixes);
        return $solicitud;
    }

    public function solicitud_cliente(){
        $auth_id = Auth::user()->id;
        $solicitud = Solicitud_venta::select('mixes.id','estado')
        ->join('mixes', 'solicitud_ventas.mix_id', '=', 'mixes.id')
        ->where('solicitud_ventas.usuario_id', '=', $auth_id)->get();

        return $solicitud;
    }
}
