<?php

namespace App\Http\Controllers;

use App\Models\Interprete;
use App\Models\Genero;
use Illuminate\Http\Request;

class BusquedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dj.agregar_mix');
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
    public function edit(Interprete $interprete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interprete  $interprete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interprete $interprete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interprete  $interprete
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interprete $interprete)
    {
        //
    }

    public function buscador(Request $request){
        $genero = [];

        if($request->filled('q')){

            $genero = Genero::select("nombre", "id")

                        ->where('name', 'LIKE', '%'. $request->get('q'). '%')

                        ->get();

        }

    

        return response()->json($genero);
    }
}
