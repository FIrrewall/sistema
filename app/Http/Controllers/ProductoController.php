<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('productos_index'), 403);
        $datosProducto['producto'] = producto::all();
        return view('productos.index', $datosProducto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('productos_create'), 403);
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produ = producto::all();
        $campos = [
            'nombre' => 'required|string|max:10000',
            'precio' => 'required|integer|max:10000',

        ];
        $mensaje = [
            'required' => 'El :attribute es requerido'
        ];

        $nom = request()->input('nombre');

        $this->validate($request, $campos, $mensaje);
        $array = null;
        foreach ($produ as $pro) {
            $array[] = $pro->nombre;
        }
        if ($array == null) {
            $datosProducto = request()->except('_token');
            producto::insert($datosProducto);
            $alerta = 'ok';
        } else {
            $indice = array_search($nom, $array, false);

            if ($indice === false) {
                $datosProducto = request()->except('_token');
                producto::insert($datosProducto);
                $alerta = 'ok';
            } else {
                $alerta = 'error';
            }
        }



        return redirect('/productos')->with('nuevo', $alerta);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(producto $producto)
    {
        abort_if(Gate::denies('productos_edit'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosProducto = request()->except(['_token', '_method']);
        producto::where('id', '=', $id)->update($datosProducto);
        //$post = request()->input('informe_id');
        return redirect('productos')->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('productos_destroy'), 403);
        producto::destroy($id);
        return redirect('productos')->with('eliminar', 'ok');
    }
}
