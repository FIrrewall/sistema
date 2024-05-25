<?php

namespace App\Http\Controllers;

use App\Models\habitacion;
use Illuminate\Http\Request;
use App\Models\Alojamiento;
use App\Models\Reservacion;
use Illuminate\Support\Facades\Gate;

class HabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('habitaciones_index'),403);
        $datosHabi['habi'] = Habitacion::all();
        $datosAloja = Alojamiento::all();
        //return view('habitacion.index',$datosHabi, $datosAloja);

        foreach ($datosAloja as $daloja) {
            if ($id == $daloja->id) {
                $resul = $daloja->nombreA;
            }
        }
        //$informe = Informe::all();

        return view('habitacion.index', $datosHabi, compact('id', 'resul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('habitaciones_create'),403);
        $datosAloja['aloja'] = Alojamiento::all();
        return view('habitacion.create', $datosAloja);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'numhabitacion' => 'required|integer|max:100000',
            'preferencias' => 'required|string|max:10000',
            'alojamiento_id' => 'required|integer|max:10000'
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosEmpleado = request()->all();
        $datosHabi = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        //return dd($datosAloja);
        Habitacion::insert($datosHabi);

        //return redirect('hdds')->with('mensaje','Empleado agregado con exito');
        //$post = request()->input('informe_id');
        //return redirect('/habitaciones')->with('nuevo', 'ok');
        $post = request()->input('alojamiento_id');
        return redirect('/datosalojamiento/'.$post)->with('nuevo','ok');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function show(habitacion $habitacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function edit(habitacion $habitacion)
    {
        abort_if(Gate::denies('habitaciones_edit'),403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
   
    {
        $datosHabitacion = request()->except(['_token', '_method']);
        //$datosReservacion = request()->except(['_token', '_method','numhabitacion','preferencias','alojamiento_id']);
        $estado = request()->input('estadoH');
        $datosReservacion['estado'] = $estado;

        Habitacion::where('id', '=', $id)->update($datosHabitacion);
        Reservacion::where('habitacion_id','=',$id)->update($datosReservacion);
        //$post = request()->input('informe_id');
        //return redirect('alojamiento')->with('actualizar', 'ok');
        $post = request()->input('alojamiento_id');
        return redirect('/datosalojamiento/'.$post)->with('actualizar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\habitacion  $habitacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('habitaciones_destroy'),403);
        Habitacion::destroy($id);
        return redirect('habitacion')->with('eliminar', 'ok');
    }
}
