<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['empleados'] = Empleado::all();
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosEmpleado = request()->except('_token');
        /*$campos = [
            'Nombre' => 'required|string|max:100',
            'ApellidoPaterno' => 'required|string|max:100',
            'ApellidoMaterno' => 'required|string|max:100',
            'Correo' => 'required|email'
        ];
        $mensaje = [
            'required' => 'El :attribute es requerido',
            //'Foto.required' => 'La foto requerida'
        ];

        $this->validate($request, $campos, $mensaje);
        */
        //$image = $request->file('imagen');
        //$image->move('uploads', $image->getClientOriginalName());
        //$nombre_tabla->imagen = image->getClientOriginalName();

         
        
        if ($request->hasFile('Foto')) { 
            
            $datosEmpleado['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Empleado::insert($datosEmpleado);
        return response()->json($datosEmpleado);
        //return redirect('empleado')->with('mensaje', 'Empleado agregado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);

        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
        $datosEmpleado1 = request()->except(['_token', '_method']);
        if ($request->hasFile('Foto')) {

            Storage::delete('public/' . $empleado->Foto);

            $datosEmpleado1['Foto'] = $request->file('Foto')->store('uploads', 'public');
        }

        Empleado::where('id', '=', $id)->update($datosEmpleado1);

        // $empleado = Empleado::findOrFail($id);
        // return view('empleado.index', compact('empleado'));

        // $datos['empleados']=Empleado::paginate(5);
        // return view('empleado.', compact('datos'));
        return redirect('empleado')->with('mensaje', 'Empleado modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        if (Storage::delete('public/' . $empleado->Foto)) {
            Empleado::destroy($id);
        } else {
            Empleado::destroy($id);
        }


        return redirect('empleado')->with('mensaje', 'Empleado borrado');
    }

        //$datosEmpleado = request()->all();
        //Empleado::insert($datosEmpleado);
        //settype($id, "integer");
        //return $post;
        //return Route::get('/inventarioAñadir/{id}', [ExistenteController::class, 'index'])->with('mensaje');
        //return redirect()->route('inventarioAñadir',[ 'id' => 'inventari_id']);
        //return view(existentes',compact('id'))->with('mensaje'); redirect('inventarioAñadir/{{$id}}');
}
