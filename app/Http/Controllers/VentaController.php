<?php

namespace App\Http\Controllers;

use App\Models\producto;
use App\Models\reservacion;
use App\Models\Productoventa;
use App\Models\Productoinventario;
use App\Models\venta;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class VentaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index($id)
  {
    //$datosVenta['venta'] = venta::all();
    abort_if(Gate::denies('ventas_index'), 403);
    $reservacion = reservacion::all();
    $datosVenta = DB::select('SELECT DISTINCT V.id,V.fecha,nombre,paterno
        FROM
          ventas AS V
        INNER JOIN
          reservacions R ON R.id = V.reservacion_id
        WHERE R.id = ' . $id . '');

    $date = Carbon::now();
    $fecha = $date->toDateString();


    return view('venta.index', compact('id', 'fecha'))->with(['datosVenta' => $datosVenta, 'reservacion' => $reservacion]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($id)
  {
    abort_if(Gate::denies('ventas_create'), 403);
    $productos = producto::pluck('nombre', 'id');
    //$producto = producto::all();
    $proinve = productoinventario::all();
    $venta = venta::all();

    $producto = DB::select('SELECT P.id,P.nombre,precio,stock
    FROM
      productos AS P
    INNER JOIN
      Productoinventarios PR ON P.id = PR.producto_id
    ORDER BY P.id');



    foreach ($venta as $ven) {
      $array[] = $ven->reservacion_id;
    }
    $indice = array_search($id, $array, false);

    if ($indice === false) {
      $idRese = $id;
      $date = Carbon::now();
      $fecha = $date->toDateString();
      return view('venta.create', compact('productos', 'idRese', 'fecha'))->with(['producto' => $producto, 'proinve' => $proinve]);
    } else {
      $alerta = 'error';
      return redirect('/ventas/' . $id)->with('nuevo', $alerta);
    }

    /*
    $idRese = $id;
    $date = Carbon::now();
    $fecha = $date->toDateString();

    return view('venta.create', compact('productos', 'idRese', 'fecha'))->with(['producto' => $producto]);*/
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $venta = venta::all();
    /*$venta = new venta();
    $venta->fecha = $request->get('fecha');
    $venta->reservacion_id = $request->get('reservacion_id');
    $venta->save();
    if ($request->producto_id) {
      $producto = $request->get('producto_id');
      $cantidad = $request->get('cantidad');
      $precio = $request->get('precio');
      $costototal = $request->get('costototal');
      $cont = 0;
      while ($cont < count($producto)) {
        $detalle = new Productoventa();
        $detalle->venta_id = $venta->id;
        $detalle->producto_id = $producto[$cont];
        $detalle->cantidad = $cantidad[$cont];
        $detalle->costo = $precio[$cont];
        $detalle->costototal = $costototal;
        $detalle->save();
        $cont = $cont + 1;
      }
      $post = request()->input('reservacion_id');
*/
    $array = null;


    $idres = request()->input('reservacion_id');

    foreach ($venta as $ven) {
      $array[] = $ven->reservacion_id;
    }

    
    if ($array == null) {
      $datosProducto = request()->except('_token', 'variable');
      venta::insert($datosProducto);
      $datosVenta = DB::select('SELECT V.id 
      from ventas AS V 
      order BY V.id DESC LIMIT 1');
      foreach ($datosVenta as $daven) {
        $idVe = $daven->id;
      }
      //return dd($idVe);
      $alerta = 'ok';
      return redirect('/venta/' . $idres)->with('nuevo', $alerta);
    } else {
      $indice = array_search($idres, $array, false);
      if ($indice === false) {
        $datosProducto = request()->except('_token', 'variable');
        venta::insert($datosProducto);
        $datosVenta = DB::select('SELECT V.id 
        from ventas AS V 
        order BY V.id DESC LIMIT 1');
        foreach ($datosVenta as $daven) {
          $idVe = $daven->id;
        }
        //return dd($idVe);
        $alerta = 'ok';
        return redirect('/venta/' . $idres)->with('nuevo', $alerta);
      } else {
        $alerta = 'error';
        return redirect('/ventas/' . $idres)->with('nuevo', $alerta);
      }
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\venta  $venta
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $producto = producto::all();
    //$venta = Venta::findOrFail($id);
    //$idRe = $venta->reservacion_id;
    //$idVen = $venta->venta_id;
    //$fecha = $venta->fecha;
    //$idven = $venta->id;
    $idReser = $id;

    $datosVenta = DB::select('SELECT V.id 
      from ventas AS V 
      order BY V.id DESC LIMIT 1');
    foreach ($datosVenta as $daven) {
      $idVe = $daven->id;
    }

    //$idVe = $id;
    //$idres = request()->input('variable');


    $proven = DB::select('SELECT PV.id,P.id AS idPro,V.id AS idVen,P.nombre,cantidad,costo,cantidad*costo AS subtotal,costototal
        FROM
          productos AS P
        INNER JOIN
          productoventas PV ON PV.producto_id = P.id
        INNER JOIN
          ventas V ON V.id = PV.venta_id
        INNER JOIN
          reservacions R ON R.id = V.reservacion_id
        WHERE R.id = ' . $idReser . '');

    $costo = DB::select('SELECT SUM(cantidad*costo) AS total
        FROM
          productos AS P
        INNER JOIN
          productoventas PV ON PV.producto_id = P.id
        INNER JOIN
          ventas V ON V.id = PV.venta_id
        INNER JOIN
          reservacions R ON R.id = V.reservacion_id
        WHERE R.id = ' . $idReser . '');

    //return dd($idres);

    //$venta = Venta::findOrFail($idRe);
    //return dd($fecha);
    //return dd($proven);
    //return dd($idRe, $idven, $venta);
    return view('venta.createProVen', compact('idVe', 'idReser'))->with(['proven' => $proven, 'producto' => $producto, 'costo' => $costo]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\venta  $venta
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //return dd($id);
    abort_if(Gate::denies('ventas_edit'), 403);
    $producto = producto::all();
    $venta = Venta::findOrFail($id);
    $idRe = $venta->reservacion_id;
    //$idVen = $venta->venta_id;
    $fecha = $venta->fecha;
    $idVen = $id;


    $proven = DB::select('SELECT PV.id,P.id AS idPro,V.id AS idVen,P.nombre,cantidad,costo,cantidad*costo AS subtotal,costototal
        FROM
          productos AS P
        INNER JOIN
          productoventas PV ON PV.producto_id = P.id
        INNER JOIN
          ventas V ON V.id = PV.venta_id
        INNER JOIN
          reservacions R ON R.id = V.reservacion_id
        WHERE R.id = ' . $idRe . '');

    $costo = DB::select('SELECT SUM(cantidad*costo) AS total
        FROM
          productos AS P
        INNER JOIN
          productoventas PV ON PV.producto_id = P.id
        INNER JOIN
          ventas V ON V.id = PV.venta_id
        INNER JOIN
          reservacions R ON R.id = V.reservacion_id
        WHERE R.id = ' . $idRe . '');

    //return dd($idres);

    //$venta = Venta::findOrFail($idRe);
    //return dd($fecha);
    //return dd($proven);
    //return dd($idRe, $idven, $venta);
    return view('venta.edit', compact('idVen', 'idRe'))->with(['proven' => $proven, 'producto' => $producto, 'costo' => $costo]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\venta  $venta
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $datosVenta = request()->except(['_token', '_method']);


    venta::where('id', '=', $id)->update($datosVenta);
    //$post = request()->input('informe_id');
    return redirect('venta')->with('actualizar', 'ok');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\venta  $venta
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    abort_if(Gate::denies('ventas_destroy'), 403);
    $venta = venta::findOrFail($id);
    $idVen = $venta->reservacion_id;
    venta::destroy($id);
    return redirect('/ventas/' . $idVen)->with('eliminar', 'ok');
  }
}
