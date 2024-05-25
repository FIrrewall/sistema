<?php

namespace App\Http\Controllers;

use App\Models\productoinventario;
use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class ProductoinventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        abort_if(Gate::denies('productoInventario_index'), 403);
        $datosProducto = producto::all();
        $datosProInve = productoinventario::all();
        $idIn = $id;
        $date = Carbon::now();
        $fec = $date->toDateString();
        $hora = $date->toTimeString();
        return view('productoinventarios.index', compact('idIn', 'fec', 'hora'))->with(['producto' => $datosProducto, 'proinve' => $datosProInve]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('productoInventario_create'), 403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosPro = producto::all();
        $datosProInve = productoinventario::all();
        $idPro = null;
        $datosInventario = request()->except('_token');
        $cantidad = request()->input('cantidad');
        $entrada = request()->input('entrada');
        $salida = request()->input('salida');
        $pro = request()->input('producto_id');
        $array = null;
        foreach ($datosProInve as $dapro) {
            $array[] = $dapro->producto_id;
        }
        if ($array == null) {
            $datosInventario['stock'] = ($cantidad + $entrada) - $salida;
            productoinventario::insert($datosInventario);
            $alerta = 'ok';
        } else {
            $indice = array_search($pro, $array, false);

            if ($indice === false) {
                $datosInventario['stock'] = ($cantidad + $entrada) - $salida;
                productoinventario::insert($datosInventario);
                $alerta = 'ok';
            } else {
                $alerta = 'error';
            }
        }


        //return dd($array, $hola);

        //$datosInventario['stock'] = ($cantidad + $entrada) - $salida;

        //return dd($datosInventario);

        //productoinventario::insert($datosInventario);
        $post = request()->input('inventario_id');
        return redirect('/productoInve/' . $post)->with('nuevo', $alerta);
        //return dd($datosInventario);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productoinventario  $productoinventario
     * @return \Illuminate\Http\Response
     */
    public function show(productoinventario $productoinventario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productoinventario  $productoinventario
     * @return \Illuminate\Http\Response
     */
    public function edit(productoinventario $productoinventario)
    {
        abort_if(Gate::denies('productoInventario_edit'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productoinventario  $productoinventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosInve = request()->except('_token', '_method');
        //$habita = habitacion::all();
        //return dd($datosAloja);
        //$post = request()->input('fecha');
        //$now = now();
        //$fecha = $date->toDateTimeString();
        $idProVen = request()->input('id');
        $idIn = request()->input('idIn');
        $var = request()->input('variable');
        $cant = request()->input('cantidad');
        $ent = request()->input('entrada');
        $sal = request()->input('salida');
        //return dd($sal);
        if ($var == 0) {
            //$datosInvenC = request()->except(['_token', '_method', 'variable', 'id','producto_id','idIn','entrada','salida','cantidad0','cantidad']);
            $canti = request()->input('cantidad0');
            $resul = $canti + $ent;
            if ($resul > $sal) {
                $datosInvenC['cantidad'] = $canti;
                $datosInvenC['stock'] = ($canti + $ent) - $sal;
                productoinventario::where('id', '=', $idProVen)->update($datosInvenC);
                $alerta = 'ok';
            } elseif ($resul == $sal) {
                $alerta = 'info';
            } elseif ($resul < $sal) {
                $alerta = 'error';
            }

            //return dd($datosInvenC);
        } elseif ($var == 1) {
            //$datosInvenE = request()->except(['_token', '_method', 'variable', 'id','producto_id','idIn','cantidad','salida']);
            $entra = request()->input('entrada1');
            $datosInvenE['entrada'] = $entra + $ent;
            $datosInvenE['stock'] = ($cant + $datosInvenE['entrada']) - $sal;
            productoinventario::where('id', '=', $idProVen)->update($datosInvenE);
            $alerta = 'ok';
            //return dd($datosInvenE);
        } elseif ($var == 2) {
            //$datosInvenS = request()->except(['_token', '_method', 'variable', 'id','producto_id','idIn','cantidad','entrada','salida','salida2']);
            $sali = request()->input('salida2');
            $salid = $sali + $sal;
            $res = $cant + $ent;
            if ($salid < $res) {
                $datosInvenS['salida'] = $sali + $sal;
                $datosInvenS['stock'] = ($cant + $ent) - $datosInvenS['salida'];
                productoinventario::where('id', '=', $idProVen)->update($datosInvenS);
                $alerta = 'ok';
            } elseif ($salid == $res) {
                $datosInvenS['salida'] = $sali + $sal;
                $datosInvenS['stock'] = ($cant + $ent) - $datosInvenS['salida'];
                productoinventario::where('id', '=', $idProVen)->update($datosInvenS);
                $alerta = 'info';
            } elseif ($salid > $res) {
                $alerta = 'error';
            }

            //return dd($datosInvenS);
        }

        /*if ($results == null) {
            Existente::insert($datosExistentes);
            $alerta = 'ok';
        } else {
            $alerta = 'error';
        }*/
        return redirect('/productoInve/' . $idIn)->with('actualizar', $alerta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productoinventario  $productoinventario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('productoInventario_destroy'), 403);
        $proven = productoinventario::findOrFail($id);
        $idInve = $proven->inventario_id;
        //return dd($idVen);
        productoinventario::destroy($id);
        return redirect('/productoInve/' . $idInve)->with('eliminar', 'ok');
    }
}
