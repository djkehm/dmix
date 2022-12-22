<?php

namespace App\Http\Controllers;

use App\Models\Interprete;
use Illuminate\Http\Request;

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

    public function interpretes_admin(){
        $interpretes = Interprete::all();
        return view('admin.lista_interpretes', compact('interpretes'));
    }
}
