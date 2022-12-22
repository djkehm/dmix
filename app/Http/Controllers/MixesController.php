<?php

namespace App\Http\Controllers;

use App\Models\Mix;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Dj;
use App\Http\Controllers\DjsController;
use App\Models\Usuario;
use Illuminate\Support\Facades\{Auth, Hash};
use App\Models\Interprete;
use App\Models\Genero;

class MixesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mixes = Mix::all();
    
        return view('mixes.catalogo', compact('mixes'));
    
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
    public function store(Request $request)
    {
        //OBTENER DATOS DEL USUARIO Y EL ID DEL DJ PARA LA FK
        $mix = new Mix();
        $now = today();
        $auth_id = Auth::user()->id;
        $dj = Usuario::select('djs.id')->join('djs', 'usuarios.id', '=','djs.usuario_id')->where('djs.usuario_id', '=', $auth_id)->value('djs.id');


        //ALMACENAR LOS MIX
        $mix->nombre = $request->nombre;
        $mix->descripcion = $request->descripcion;
        $mix->duracion = $request->duracion;
        $mix->fecha_publicacion = $now;
        $mix->precio = $request->precio;
        $mix->dj_id = $dj;


        //ALMACENAR LOS INTERPRETES
        $mix->save();
        $interprete = new Interprete();
        $interprete->nombre = $request->interpretes;
        $interprete->mix_id = $mix->id;
        $interprete->save();


        //ALMACENAR RELACION ENTRE GENERO Y MIX
        foreach ($request->input('generos', []) as $i => $id) {
         $genero = $request->input('generos',[$i]);
         $generoID = $genero[$i];
         $generoSelect = Genero::findOrFail($generoID);
         $generoSelect->mixes()->syncWithoutDetaching([$mix->id]);
        }
        return redirect()->route('mis.mix');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mix  $mix
     * @return \Illuminate\Http\Response
     */
    public function show(Mix $mix)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mix  $mix
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mixes = Mix::findOrFail($id);
        $interprete = Interprete::select('nombre')->where('mix_id', '=', $id);
        return view('mixes.editar_mix',compact('mixes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mix  $mix
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $mixes = Mix::findOrFail($id);
        $mixes->nombre = $request->nombre;
        $mixes->descripcion = $request->descripcion;
        $mixes->duracion = $request->duracion;
        $mixes->precio = $request->precio;
        $mixes->save();
        return redirect()->route('mis.mix');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mix  $mix
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $mix = Mix::where('id', '=', $id);
        $mix->delete();
        return redirect()->route('mis.mix');
    }
    public function pruebasID(){
        $auth_id = Auth::user()->id;
        $dj = Usuario::select('djs.id')->join('djs', 'usuarios.id', '=','djs.usuario_id')->where('djs.usuario_id', '=', $auth_id)->value('djs.id');

        return [$auth_id, $dj];

    }

    public function mis_mix(){

        //OBTENER LOS MIX SUBIDO POR 1 DJ CON INICIO DE SESION
        $auth_id = Auth::user()->id;
        $dj = Usuario::select('djs.id')->join('djs', 'usuarios.id', '=','djs.usuario_id')->where('djs.usuario_id', '=', $auth_id)->value('djs.id');
        $mixes = Mix::select('mixes.id','mixes.nombre as NameMix','mixes.descripcion','mixes.duracion','mixes.fecha_publicacion','mixes.precio','djs.nombre as DjName')
        ->join('djs', 'mixes.dj_id', '=', 'djs.id')
        ->where('mixes.dj_id', '=', $dj)->get();
    
        return view('mixes.mis_mix')->with('mixes', $mixes);
    }

    public function mix_por_dj($dj){

        //OBTENER LOS MIX SUBIDO POR CADA DJ
        // $auth_id = Auth::user()->id;
        // $dj = Usuario::select('djs.id')->join('djs', 'usuarios.id', '=','djs.usuario_id')->where('djs.usuario_id', '=', $auth_id)->value('djs.id');

        $dj_id = $dj;
        // $mixes = Mix::select('id','mixes.nombre','mixes.descripcion','mixes.duracion','mixes.fecha_publicacion','mixes.precio')
        // ->where('dj_id', '=', $dj_id)->get();

        $mixes = Mix::where('dj_id', '=', $dj_id)->get();
    
        return view('mixes.por_dj')->with('mixes', $mixes);

        //return $mixes;
    }

}
