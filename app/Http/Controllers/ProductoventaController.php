<?php

namespace App\Http\Controllers;

use App\Models\productoventa;
use App\Models\productoinventario;
use App\Models\producto;
use App\Models\venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProductoventaController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $variable = request()->input('variable');
        $totalVen = 0;
        $inven = productoinventario::all();
        $idProdu = request()->input('producto_id');
        $idVen = request()->input('venta_id');
        $idRes = request()->input('reserva_id');
        $can = request()->input('cantidad');
        $cos = request()->input('costo');
        if ($variable == 0) {
            foreach ($inven as $inve) {
                if ($inve->producto_id == $idProdu) {
                    $instock = $inve->stock;
                    $salida = $inve->salida;
                }
            }
            //$totSalida = $can + $salida;

            if ($can <= $instock) {

                $datosReser = request()->except('_token', 'variable', 'reserva_id');
                $datoProVen = productoventa::all();

                //$var = request()->input('variable');

                //return dd($var);
                foreach ($datoProVen as $pro) {
                    if ($pro->venta_id == $idVen) {
                        $totalVen = $pro->costototal;
                    }
                }

                $total = ($can * $cos) + $totalVen;
                $datosReser['costototal'] = $total;
                productoventa::insert($datosReser);

                //$datosVenta = request()->except(['_token', 'venta_id', 'cantidad', 'costo', 'producto_id']);
                $datosVenta['costototal'] = $total;
                productoventa::where('venta_id', '=', $idVen)->update($datosVenta);

                $totSalida = $can+$salida;
                $datoInventario['salida'] = $totSalida;
                $datoInventario['stock'] = $instock - $can;
                productoinventario::where('producto_id', '=', $idProdu)->update($datoInventario);

                return redirect('/venta/' . $idRes)->with('nuevo', 'ok');
            } else {
                $idRes = request()->input('reserva_id');
                return redirect('/venta/' . $idRes)->with('nuevo', 'error');
            }
        } else {

            foreach ($inven as $inve) {
                if ($inve->producto_id == $idProdu) {
                    $instock = $inve->stock;
                    $salida = $inve->salida;
                }
            }

            
            if ($can <= $instock) {
                $datosReser = request()->except('_token');
                $datoProVen = productoventa::all();

                $idVen = request()->input('venta_id');
                $can = request()->input('cantidad');
                $idReser = request()->input('reserva_id');
                $cos = request()->input('costo');

                foreach ($datoProVen as $pro) {
                    if ($pro->venta_id == $idVen) {
                        $totalVen = $pro->costototal;
                    }
                }
                $total = ($can * $cos) + $totalVen;
                $datosReser['costototal'] = $total;
                productoventa::insert($datosReser);

                //$datosVenta = request()->except(['_token', 'venta_id', 'cantidad', 'costo', 'producto_id']);
                $datosVenta['costototal'] = $total;
                productoventa::where('venta_id', '=', $idVen)->update($datosVenta);

                $totSalida = $can + $salida;
                $datoInventario['salida'] = $totSalida;
                $datoInventario['stock'] = $instock - $can;
                productoinventario::where('producto_id', '=', $idProdu)->update($datoInventario);

                return redirect('/venta/' . $idReser . '/edit')->with('actualizar', 'ok');

            }
            else{
                $idReser = request()->input('reserva_id');
                return redirect('/venta/' . $idReser . '/edit')->with('actualizar', 'error');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\productoventa  $productoventa
     * @return \Illuminate\Http\Response
     */
    public function show(productoventa $productoventa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\productoventa  $productoventa
     * @return \Illuminate\Http\Response
     */
    public function edit(productoventa $productoventa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\productoventa  $productoventa
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\productoventa  $productoventa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('productoVenta_destroy'),403);
        $proven = productoventa::findOrFail($id);
        $idVen = $proven->venta_id;
        //return dd($idVen);
        productoventa::destroy($id);
        return redirect('/venta/' . $idVen . '/edit')->with('eliminar', 'ok');
    }
}
