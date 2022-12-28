<?php

namespace App\Http\Controllers;

use App\Models\Interprete;
use Illuminate\Http\Request;
use App\Models\Mix;
use App\Http\Requests\InterpretesRequest;

class InterpretesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $interpretes = Interprete::all();
        
        return view('dj.agregar_mix', compact('interpretes'));
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
    public function store(InterpretesRequest $request)
    {
        //
        $interprete = new Interprete();
        $interprete->nombreIn = $request->nombreIn;
        $interprete->save();
        return redirect()->route('Interpretes')->with('mensaje', 'Aok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interprete  $interprete
     * @return \Illuminate\Http\Response
     */
    public function show(Interprete $interprete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interprete  $interprete
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $interprete = Interprete::findOrFail($id);
        $mixes = Mix::join('mix_interpretes', 'mix_id', '=', 'mixes.id')
        ->join('interpretes', 'interpretes.id', '=', 'interprete_id')
        ->where('interprete_id', '=', $id)->get();
        if(!$mixes->count()){
            return view('admin.genero.editar_interprete')->with('interprete', $interprete);
        }else{
            return back()->with('interprete', $id);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interprete  $interprete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $interprete = Interprete::findOrFail($id);
        $interprete->nombreIn = $request->nombreIn;
        $interprete->save();
        return redirect()->route('Interpretes')->with('mensaje', 'Eok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interprete  $interprete
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $interprete = Interprete::findOrFail($id);
        $mixes = Mix::join('mix_interpretes', 'mix_id', '=', 'mixes.id')
        ->join('interpretes', 'interprete_id', '=', 'interpretes.id')
        ->where('interprete_id', '=', $id);

        if(!$mixes->count()){
            $interprete->delete();
            return back()->with('mensaje', 'ok');
        }else{
            return back()->with('mensaje', 'no');
        }
    }

    public function interpretes_admin(){
        $interpretes = Interprete::all();
        return view('admin.lista_interpretes', compact('interpretes'));
    }


    public function confirm_edit($id){
        $interprete = Interprete::findOrFail($id);
        return view('admin.interprete.editar_interprete')->with('interprete', $interprete);
    }

    public function listado(Request $request){
        
        $buscarporInterprete = $request->get('buscarporInterprete');
        if(!$buscarporInterprete){
            $interpretes = Interprete::all();
            return view('mixes.interprete.listar_interprete', compact('interpretes', 'buscarporInterprete'));
        }else{
            $interpretes = Interprete::where('nombreIn', 'like', '%'.$buscarporInterprete.'%')->get();
            return view('mixes.interprete.listar_interprete', compact('interpretes', 'buscarporInterprete'));
        }

    
        
        return view('mixes.interprete.listar_interprete', compact('interpretes', 'buscarporInterprete'));
    }

    public function filtrarGenero($id){
        $mixes = Mix::select('mixes.*')
        ->join('mix_interpretes', 'mixes.id', '=', 'mix_interpretes.mix_id')
        ->join('interpretes', 'mix_interpretes.interprete_id', '=', 'interpretes.id')
        ->where('interpretes.id', '=', $id)->get();

        return view('mixes.interprete.filtrar_interprete', compact('mixes'));
    }

}
