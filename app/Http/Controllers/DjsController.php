<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\{Auth, Hash};
use App\Models\Dj;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\DjsRequest;
use App\Models\Mix;
class DjsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $djs = Dj::all();

        return view('dj.listar_dj')->with('djs', $djs);
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
        $dj->nombre = $request->nombre;
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
    public function edit(Dj $dj)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dj  $dj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dj $dj)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dj  $dj
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dj $dj)
    {
        //
    }



    public function extraerIdDj(){
        $dj = Usuario::select('djs.id')->join('djs', 'usuarios.id', '=','djs.usuario_id')->get();

        return $dj;
    }

    public function extraerDatosDj(){
        $auth_id = Auth::user()->id;
        $djID = Usuario::select('djs.id')->join('djs', 'usuarios.id', '=','djs.usuario_id')->where('djs.usuario_id', '=', $auth_id)->value('djs.id');
        $djs = Dj::select('djs.nombre','djs.email','djs.numero_celular')
        ->join('usuarios', 'usuarios.id', '=', 'djs.usuario_id')
        ->where('djs.id', '=', $djID)->get();
    
        return view('dj.mi_cuenta')->with('djs', $djs);
    }
    
}
