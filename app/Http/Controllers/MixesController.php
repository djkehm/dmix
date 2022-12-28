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
use App\Models\Solicitud_venta;

class MixesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  

        $buscarpor = $request->get('buscarpor');
        if(!$buscarpor){
            $mixes = Mix::all();
            return view('mixes.catalogo', compact('mixes', 'buscarpor'));
            
        }else{
            $mixes = Mix::select('mixes.*')
            ->join('mix_interpretes', 'mixes.id', '=', 'mix_interpretes.mix_id')
            ->join('interpretes', 'interpretes.id', '=', 'mix_interpretes.interprete_id')
            ->join('mix_generos', 'mixes.id', '=', 'mix_generos.mix_id')
            ->join('generos', 'generos.id', '=', 'mix_generos.genero_id')
            ->orWhere('nombreMix', 'like', '%'.$buscarpor.'%')
            ->orWhere('nombreGe', 'like', '%'.$buscarpor.'%')
            ->orWhere('nombreIn', 'like', '%'.$buscarpor.'%')
            ->distinct()->get();
            return view('mixes.catalogo', compact('mixes', 'buscarpor'));
            //return $filtroGenero;
        }
        
    
        
    
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
        $mix->nombreMix = $request->nombre;
        $mix->descripcion = $request->descripcion;
        $mix->duracion = $request->duracion;
        $mix->fecha_publicacion = $now;
        $mix->precio = $request->precio;
        $mix->dj_id = $dj;
        $mix->save();



        //ALMACENAR RELACION ENTRE GENERO Y MIX
        foreach ($request->input('generos', []) as $i => $id) {
         $genero = $request->input('generos',[$i]);
         $generoID = $genero[$i];
         $generoSelect = Genero::findOrFail($generoID);
         $generoSelect->mixes()->syncWithoutDetaching([$mix->id]);
        }

        //ALMACENAR INTERPRETE Y MIX
        foreach ($request->input('interpretes', []) as $i => $id) {
            $interprete = $request->input('interpretes',[$i]);
            $interpreteID = $interprete[$i];
            $interpreteSelect = Interprete::findOrFail($interpreteID);
            $interpreteSelect->mixes()->syncWithoutDetaching([$mix->id]);
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
        $mixes->nombreMix = $request->nombre;
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
        $mixes = Mix::select('mixes.*')
        ->join('djs', 'mixes.dj_id', '=', 'djs.id')
        ->where('mixes.dj_id', '=', $dj)->get();
    
        return view('mixes.mis_mix')->with('mixes', $mixes);
    }

    public function mix_por_dj($dj, Request $request){
  
        $dj_id = $dj;
        $mixes = Mix::select('mixes.*')
        ->where('dj_id', '=', $dj_id)->get();
        $buscarporDjMix = $request->get('buscarporDjMix');
        if(!$buscarporDjMix){
            return view('mixes.por_dj', compact('mixes', 'buscarporDjMix'));
        }else{
            $mixes = Mix::select('mixes.*')
            ->where('dj_id', '=', $dj_id)->where('nombreMix', 'like', '%'.$buscarporDjMix.'%')->distinct()->get();
            return view('mixes.por_dj', compact('mixes', 'buscarporDjMix'));
        }
    
        return view('mixes.por_dj', compact('mixes', 'buscarporDjMix'));

        //return $mixes;
    }

    public function ranking_mix(){
        $rm = Solicitud_venta::selectRaw("count(mix_id) as cantidad")
        ->select('mixes.id','mixes.nombreMix', Solicitud_venta::raw('count(mix_id)'))
        ->join('mixes', 'mix_id', '=', 'mixes.id')
        //->where('mix_id', '=', 'mixes.id')->get();
        ->where('estado', '=', 'A')
        ->groupBy('mixes.nombreMix', 'id')
        ->orderBy(Solicitud_venta::raw('count(mix_id)'), 'DESC')->take(3)
        ->get();

        return $mixes;
    }

    public function ranking_dj(){
        $rd = Solicitud_venta::selectRaw("count(mix_id) as cantidad")
        ->select('djs.id','djs.nombreDj', Solicitud_venta::raw('count(mix_id)'))
        ->join('mixes', 'mix_id', '=', 'mixes.id')
        ->join('djs', 'mixes.dj_id', '=', 'djs.id')
        ->where('estado', '=', 'A')
        ->groupBy('djs.nombreDj', 'id')
        ->orderBy(Solicitud_venta::raw('count(mix_id)'), 'DESC')->take(3)
        ->get();

        return redirect()->route("Dj's")->with('rds', $rd);
    }

    public function ranking_genero(){
        $rgs = Solicitud_venta::selectRaw("count(solicitud_ventas.mix_id) as cantidad")
        ->select('generos.id','generos.nombreGe', Solicitud_venta::raw('count(solicitud_ventas.mix_id)'))
        ->join('mixes', 'solicitud_ventas.mix_id', '=', 'mixes.id')
        ->join('mix_generos', 'mix_generos.mix_id', '=', 'mixes.id')
        ->join('generos', 'generos.id', '=', 'mix_generos.genero_id')
        ->where('estado', '=', 'A')
        ->groupBy('generos.nombreGe', 'id')
        ->orderBy(Solicitud_venta::raw('count(solicitud_ventas.mix_id)'), 'DESC')->take(3)
        ->get();

        return redirect()->route('Buscar Genero')->with('rgs', $rgs);
    }

    public function ranking_interpretes(){
        $ris = Solicitud_venta::selectRaw("count(solicitud_ventas.mix_id) as cantidad")
        ->select('interpretes.id','interpretes.nombreIn', Solicitud_venta::raw('count(solicitud_ventas.mix_id)'))
        ->join('mixes', 'solicitud_ventas.mix_id', '=', 'mixes.id')
        ->join('mix_interpretes', 'mix_interpretes.mix_id', '=', 'mixes.id')
        ->join('interpretes', 'interpretes.id', '=', 'mix_interpretes.interprete_id')
        ->where('estado', '=', 'A')
        ->groupBy('interpretes.nombreIn', 'id')
        ->orderBy(Solicitud_venta::raw('count(solicitud_ventas.mix_id)'), 'DESC')->take(3)
        ->get();

        return redirect()->route('Buscar Interpretes')->with('ris', $ris);
    }

    public function filtroGenero(Request $request){
        $filtroGenero = $request->input('genero');
        $buscarpor = $request->get('buscarpor');
        $generos = Genero::findOrFail($filtroGenero);
        if(!$generos && !$buscarpor){
            $mixes = Mix::all();
            return view('mixes.catalogo', comapct('mixes','generos','buscarpor'));
        }else{
            $mixes = Mix::join('mix_generos', 'mix_id', '=', 'mixes.id')
                ->join('generos', 'generos.id', '=', 'genero_id')
                ->where('generos.id', '=', $filtroGenero)->distinct()->get();

            return view('mixes.catalogo', compact('mixes', 'generos', 'buscarpor'));
            //return $mixes;
        }
    }

}
