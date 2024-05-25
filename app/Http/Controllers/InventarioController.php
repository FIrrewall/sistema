<?php

namespace App\Http\Controllers;

use App\Models\inventario;
use App\Models\alojamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('inventario_index'), 403);
        $aloja = alojamiento::all();
        $datosInve['inventario'] = inventario::all();
        $date = Carbon::now();
        $fec = $date->toDateString();
        $hora = $date->toTimeString();

        //$date = new Carbon('fecha')->locale('es');
        //echo $date->monthName;
        $fecha = $date->format('Y-m-d');
        $mes = $date->monthName;
        $dia = $date->dayName;
        $idAlo = $id;
        //return dd($fec,$hora,$mes,$fecha,$dia);
        return view('inventa.index', $datosInve, compact('fecha', 'mes', 'idAlo'))->with(['aloja' => $aloja]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('inventario_create'), 403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventario = inventario::all();

        $datosInventario = request()->except('_token');

        $desc = request()->input('descripcion');
        $idAlo = request()->input('alojamiento_id');
        var_dump(is_null($inventario));

        $array = null;
        $array1 = null;

        foreach ($inventario as $inventa) {
            $array[] = $inventa->descripcion;
            $array1[] = $inventa->alojamiento_id;
        }
        
        if ($array == null && $array1 == null) {
            inventario::insert($datosInventario);
            $alerta = 'ok';
        } else {
            $indice = array_search($desc, $array, false);
            $indice1 = array_search($idAlo, $array1, false);

            if ($indice1 === false) {
                inventario::insert($datosInventario);
                $alerta = 'ok';
            } elseif ($indice === false) {
                inventario::insert($datosInventario);
                $alerta = 'ok';
            } else {
                $alerta = 'error';
            }
        }

        $post = request()->input('alojamiento_id');

        return redirect('/inventario/' . $post)->with('nuevo', $alerta);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(inventario $inventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit(inventario $inventario)
    {
        abort_if(Gate::denies('inventario_edit'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inventario $inventario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('inventario_destroy'), 403);

        $salida = Inventario::findOrFail($id);
        $post = $salida->alojamiento_id;
        Inventario::destroy($id);
        return redirect('/inventario/' . $post)->with('eliminar', 'ok');
    }
}
