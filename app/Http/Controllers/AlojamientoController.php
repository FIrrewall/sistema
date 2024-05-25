<?php

namespace App\Http\Controllers;

use App\Models\alojamiento;
use App\Models\encargado;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class AlojamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('alojamiento_index'), 403);
        
        $datosAloja['aloja'] = Alojamiento::all();
        $encargado = Encargado::all();
        $useer = Auth::user()->id;
        $roles = Role::all()->pluck('name', 'id');
        return view('alojamiento.index', compact('useer','roles'), $datosAloja)->with(['encar' => $encargado]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('alojamiento_create'), 403);
        return view('alojamiento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alojamiento = alojamiento::all();
        $campos = [
            'nombreA' => 'required|string|max:10000',
            'canthabitacion' => 'required|integer|max:10000',
            'direccion' => 'required|string|max:10000'
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosAloja = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        $nombre = request()->input('nombreA');

        foreach ($alojamiento as $aloja) {
            $array[] = $aloja->nombreA;
        }
        
        if ($array[] = null) {
            Alojamiento::insert($datosAloja);
            $alerta = 'ok';
        } else {
            $indice = array_search($nombre, $array, false);

            if ($indice === false) {
                Alojamiento::insert($datosAloja);
                $alerta = 'ok';
            } else {
                $alerta = 'error';
            }
        }
        //return dd($array);
        return redirect('/alojamiento')->with('nuevo', $alerta);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\alojamiento  $alojamiento
     * @return \Illuminate\Http\Response
     */
    public function show(alojamiento $alojamiento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\alojamiento  $alojamiento
     * @return \Illuminate\Http\Response
     */
    public function edit(alojamiento $alojamiento)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alojamiento  $alojamiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosAlojamiento = request()->except(['_token', '_method']);
        Alojamiento::where('id', '=', $id)->update($datosAlojamiento);
        //$post = request()->input('informe_id');
        return redirect('alojamiento')->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alojamiento  $alojamiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('alojamiento_destroy'), 403);
        Alojamiento::destroy($id);
        return redirect('alojamiento')->with('eliminar', 'ok');
    }
}
