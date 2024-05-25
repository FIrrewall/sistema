<?php

namespace App\Http\Controllers;

use App\Models\resumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ResumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //abort_if(Gate::denies('alojamiento_create'), 403);
        return view('control.index');
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
     * @param  \App\Models\resumen  $resumen
     * @return \Illuminate\Http\Response
     */
    public function show(resumen $resumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\resumen  $resumen
     * @return \Illuminate\Http\Response
     */
    public function edit(resumen $resumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\resumen  $resumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, resumen $resumen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\resumen  $resumen
     * @return \Illuminate\Http\Response
     */
    public function destroy(resumen $resumen)
    {
        //
    }
}
