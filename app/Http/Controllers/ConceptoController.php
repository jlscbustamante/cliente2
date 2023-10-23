<?php

namespace App\Http\Controllers;

use App\Concepto;
use Illuminate\Http\Request;

class ConceptoController extends Controller
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
        $concepto = Concepto::create($request->all()); //Laravel 5.4
        return response()->json([
            "success" => true,
            "message" => "Concepto creado correctamente.",
            "data" => $concepto
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Concepto  $concepto
     * @return \Illuminate\Http\Response
     */
    public function show(Concepto $concepto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Concepto  $concepto
     * @return \Illuminate\Http\Response
     */
    public function edit(Concepto $concepto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Concepto  $concepto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Concepto $concepto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Concepto  $concepto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Concepto $concepto)
    {
        //
    }
}
