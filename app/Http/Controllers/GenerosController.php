<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;
use App\Models\Mix;
use App\Http\Requests\GenerosRequest;
use App\Models\Interprete;
class GenerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $generos = Genero::all();
        $interpretes = Interprete::all();
        
        return view('dj.agregar_mix', compact('generos', 'interpretes'));
        
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
    public function store(GenerosRequest $request)
    {
        //
        $genero = new Genero();
        $genero->nombreGe = $request->nombreGe;
        $genero->save();
        return redirect()->route('Generos')->with('mensaje', 'Aok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(Genero $genero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $genero = Genero::findOrFail($id);
        $mixes = Mix::join('mix_generos', 'mix_id', '=', 'mixes.id')
        ->join('generos', 'generos.id', '=', 'genero_id')
        ->where('genero_id', '=', $id)->get();
        if(!$mixes->count()){
            return view('admin.genero.editar_genero')->with('genero', $genero);
        }else{
            return back()->with('genero', $id);
        }
        
    }   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $genero = Genero::findOrFail($id);
        $genero->nombreGe = $request->nombreGe;
        $genero->save();
        return redirect()->route('Generos')->with('mensaje', 'Eok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genero $genero)
    {
        //
    }
    public function buscarGenero(Request $request)
    {
        //
        
        
        $buscarporGenero = $request->get('buscarporGenero');
        if(!$buscarporGenero){
            $generos = Genero::all();
            return view('mixes.genero_buscador', compact('generos', 'buscarporGenero'));
        }else{
            $generos = Genero::where('nombreGe', 'like', '%'.$buscarporGenero.'%')->get();
            return view('mixes.genero_buscador', compact('generos', 'buscarporGenero'));
        }

    
        
        return view('mixes.genero_buscador', compact('generos', 'buscarporGenero'));
    }

    public function filtrarGenero($id, Request $request){
        
        
        $buscarporGeneroMix = $request->get('buscarporGeneroMix');
        $genero = Genero::findOrFail($id);
        if(!$buscarporGeneroMix){
            $mixes = Mix::select('mixes.*')
            ->join('mix_generos', 'mixes.id', '=', 'mix_generos.mix_id')
            ->join('generos', 'mix_generos.genero_id', '=', 'generos.id')
            ->where('generos.id', '=', $genero->id)->get();

            return view('mixes.filtrar_genero', compact('mixes', 'buscarporGeneroMix'));
        }else{
            $mixes = Mix::select('mixes.*')
            ->join('mix_interpretes', 'mixes.id', '=', 'mix_interpretes.mix_id')
            ->join('interpretes', 'interpretes.id', '=', 'mix_interpretes.interprete_id')
            ->join('mix_generos', 'mixes.id', '=', 'mix_generos.mix_id')
            ->join('generos', 'mix_generos.genero_id', '=', 'generos.id')
            ->orWhere('mixes.nombreMix', 'like', '%'.$buscarporGeneroMix.'%')
            ->orWhere('interpretes.nombreIn', 'like', '%'.$buscarporGeneroMix.'%')
            ->where('generos.id', '=', $genero->id)->get();
            return view('mixes.filtrar_genero', compact('mixes', 'buscarporGeneroMix'));
        }


        return view('mixes.filtrar_genero', compact('mixes', 'buscarporGeneroMix'));
    }

    public function generos_admin(){
        $generos = Genero::all();
        return view('admin.lista_generos', compact('generos'));
    }

    public function borrar_genero($id){
        $genero = Genero::findOrFail($id);

        $mixes = Mix::join('mix_generos', 'mix_id', '=', 'mixes.id')
        ->join('generos', 'generos.id', '=', 'genero_id')
        ->where('genero_id', '=', $id)->get();

        if(!$mixes->count()){
            $genero->delete();
            return back()->with('mensaje', 'ok');
        }else{
            return back()->with('mensaje', 'no');
        }
    }

    public function confirm_edit($id){
        $genero = Genero::findOrFail($id);
        return view('admin.genero.editar_genero')->with('genero', $genero);
    }

    public function generoForFiltro(){
        $generos = Genero::all();

        return view('mixes.catalogo', compact('generos'));
    }
}
