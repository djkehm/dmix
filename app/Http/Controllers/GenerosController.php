<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;
use App\Models\Mix;

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
        
        return view('dj.agregar_mix', compact('generos'));
        
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
        //
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
    public function edit(Genero $genero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genero $genero)
    {
        //
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
    public function buscarGenero()
    {
        //
        $generos = Genero::all();
        
        return view('mixes.genero_buscador', compact('generos'));
    }

    public function filtrarGenero($id){
        $mixes = Mix::join('mix_generos', 'mixes.id', '=', 'mix_generos.mix_id')
        ->join('generos', 'mix_generos.genero_id', '=', 'generos.id')
        ->where('generos.id', '=', $id)->get();

        return view('mixes.filtrar_genero', compact('mixes'));
    }

    public function generos_admin(){
        $generos = Genero::all();
        return view('admin.lista_generos', compact('generos'));
    }
}
