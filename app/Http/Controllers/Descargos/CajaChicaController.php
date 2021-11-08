<?php

namespace App\Http\Controllers\Descargos;

use App\Http\Controllers\Controller;
use App\Models\CajaChica;
use Illuminate\Http\Request;

class CajaChicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cajaChica.index');
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
     * @param  \App\Models\CajaChica  $cajaChica
     * @return \Illuminate\Http\Response
     */
    public function show(CajaChica $cajaChica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CajaChica  $cajaChica
     * @return \Illuminate\Http\Response
     */
    public function edit(CajaChica $cajaChica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CajaChica  $cajaChica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CajaChica $cajaChica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CajaChica  $cajaChica
     * @return \Illuminate\Http\Response
     */
    public function destroy(CajaChica $cajaChica)
    {
        //
    }
}
