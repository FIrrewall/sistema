<?php

namespace App\Http\Controllers;

//use App\Http\Controllers\Controller;
use App\Models\Descargo;
use App\Models\Informe;
use App\Models\Existente;
use App\Models\Control;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('control_index'),403);
        $informes = DB::select('SELECT MONTH(fecha) mes, COUNT(*) CantMes 
        FROM informes 
        WHERE YEAR(fecha) = YEAR(CURDATE()) 
            AND MONTH(fecha) BETWEEN 1 AND 12
        GROUP BY MONTH(fecha)
        ORDER BY 1');

        $prueba = [];
        $ingresos = [];
        $saliente = [];
        $rendicion = [];

        foreach ($informes as $informe) {
            switch ($informe->mes) {
                case 1:
                    if ($informe->mes != null) {
                        $prueba[] = ["Enero",intval($informe->CantMes)];
                    }
                    break;
                case 2:
                    if ($informe->mes != null) {
                        $prueba[] = ["Febrero",intval($informe->CantMes)];
                    }
                    break;
                case 3:
                    if ($informe->mes != null) {
                        $prueba[] = ["Marzo",intval($informe->CantMes)];
                    }
                    break;
                case 4:
                    if ($informe->mes != null) {
                        $prueba[] = ["Abril",intval($informe->CantMes)];
                    }
                    break;
                case 5:
                    if ($informe->mes != null) {
                        $prueba[] = ["Mayo", intval($informe->CantMes)];
                    }
                    break;
                case 6:
                    if ($informe->mes != null) {
                        $prueba[] = ["Junio", intval($informe->CantMes)];
                    }
                    break;
                case 7:
                    if ($informe->mes != null) {
                        $prueba[] = ["Julio", intval($informe->CantMes)];
                    }
                    break;
                case 8:
                    if ($informe->mes != null) {
                        $prueba[] = ["Agosto", intval($informe->CantMes)];
                    }
                    break;
                case 9:
                    if ($informe->mes != null) {
                        $prueba[] = ["Septiembre", intval($informe->CantMes)];
                    }
                    break;
                case 10:
                    if ($informe->mes != null) {
                        $prueba[] = ["Octubre", intval($informe->CantMes)];
                    }
                    break;
                case 11:
                    if ($informe->mes != null) {
                        $prueba[] = ["Noviembre", intval($informe->CantMes)];
                    }
                    break;
                case 12:
                    if ($informe->mes != null) {
                        $prueba[] = ["Diciembre", intval($informe->CantMes)];
                    }
                    break;
            }
        }

        $entradas = DB::select('SELECT MONTH(fecha) mes, COUNT(*) CantMes 
        FROM entradas 
        WHERE YEAR(fecha) = YEAR(CURDATE()) 
            AND MONTH(fecha) BETWEEN 1 AND 12
        GROUP BY MONTH(fecha)
        ORDER BY 1');

        foreach ($entradas as $entrada) {
            switch ($entrada->mes) {
                case 1:
                    if ($entrada->mes != null) {
                        $ingresos[] = ["Enero",intval($entrada->CantMes)];
                    }
                    break;
                case 2:
                    if ($entrada->mes != null) {
                        $ingresos[] = ["Febrero",intval($entrada->CantMes)];
                    }
                    break;
                case 3:
                    if ($entrada->mes != null) {
                        $ingresos[] = ["Marzo",intval($entrada->CantMes)];
                    }
                    break;
                case 4:
                    if ($entrada->mes != null) {
                        $ingresos[] = ["Abril",intval($entrada->CantMes)];
                    }
                    break;
                case 5:
                    if ($entrada->mes != null) {
                        $ingresos[] = ["Mayo",intval($entrada->CantMes)];
                    }
                    break;
                case 6:
                    if ($entrada->mes != null) {
                        $ingresos[] = ["Junio",intval($entrada->CantMes)];
                    }
                    break;
                case 7:
                    if ($entrada->mes != null) {
                        $ingresos[] = ["Julio",intval($entrada->CantMes)];
                    }
                    break;
                case 8:
                    if ($entrada->mes != null) {
                        $ingresos[] = ["Agosto",intval($entrada->CantMes)];
                    }
                    break;
                case 9:
                    if ($entrada->mes != null) {
                        $ingresos[] = ["Septiembre",intval($entrada->CantMes)];
                    }
                    break;
                case 10:
                    if ($entrada->mes != null) {
                        $ingresos[] = ["Octubre",intval($entrada->CantMes)];
                    }
                    break;
                case 11:
                    if ($entrada->mes != null) {
                        $ingresos[] = ["Noviembre",intval($entrada->CantMes)];
                    }
                    break;
                case 12:
                    if ($entrada->mes != null) {
                        $ingresos[] = ["Diciembre",intval($entrada->CantMes)];
                    }
                    break;
            }
        }

        $salidas = DB::select('SELECT MONTH(fecha) mes, COUNT(*) CantMes 
        FROM salidas 
        WHERE YEAR(fecha) = YEAR(CURDATE()) 
        AND MONTH(fecha) BETWEEN 1 AND 12
        GROUP BY MONTH(fecha)
        ORDER BY 1');

        foreach ($salidas as $salida) {
            switch ($salida->mes) {
                case 1:
                    if ($salida->mes != null) {
                        $saliente[] = ["Enero",intval($salida->CantMes)];
                    }
                    break;
                case 2:
                    if ($salida->mes != null) {
                        $saliente[] = ["Febrero",intval($salida->CantMes)];
                    }
                    break;
                case 3:
                    if ($salida->mes != null) {
                        $saliente[] = ["Marzo",intval($salida->CantMes)];
                    }
                    break;
                case 4:
                    if ($salida->mes != null) {
                        $saliente[] = ["Abril",intval($salida->CantMes)];
                    }
                    break;
                case 5:
                    if ($salida->mes != null) {
                        $saliente[] = ["Mayo",intval($salida->CantMes)];
                    }
                    break;
                case 6:
                    if ($salida->mes != null) {
                        $saliente[] = ["Junio",intval($salida->CantMes)];
                    }
                    break;
                case 7:
                    if ($salida->mes != null) {
                        $saliente[] = ["Julio",intval($salida->CantMes)];
                    }
                    break;
                case 8:
                    if ($salida->mes != null) {
                        $saliente[] = ["Agosto",intval($salida->CantMes)];
                    }
                    break;
                case 9:
                    if ($salida->mes != null) {
                        $saliente[] = ["Septiembre",intval($salida->CantMes)];
                    }
                    break;
                case 10:
                    if ($salida->mes != null) {
                        $saliente[] = ["Octubre",intval($salida->CantMes)];
                    }
                    break;
                case 11:
                    if ($salida->mes != null) {
                        $saliente[] = ["Noviembre",intval($salida->CantMes)];
                    }
                    break;
                case 12:
                    if ($salida->mes != null) {
                        $saliente[] = ["Diciembre",intval($salida->CantMes)];
                    }
                    break;
            }
        }

        $descargos = DB::select('SELECT MONTH(fecha) mes, COUNT(*) CantMes 
        FROM descargos 
        WHERE YEAR(fecha) = YEAR(CURDATE()) 
        AND MONTH(fecha) BETWEEN 1 AND 12
        GROUP BY MONTH(fecha)
        ORDER BY 1');

        foreach ($descargos as $descargo) {
            switch ($descargo->mes) {
                case 1:
                    if ($descargo->mes != null) {
                        $rendicion[] = ["Enero",intval($descargo->CantMes)];
                    }
                    break;
                case 2:
                    if ($descargo->mes != null) {
                        $rendicion[] = ["Febrero",intval($descargo->CantMes)];
                    }
                    break;
                case 3:
                    if ($descargo->mes != null) {
                        $rendicion[] = ["Marzo",intval($descargo->CantMes)];
                    }
                    break;
                case 4:
                    if ($descargo->mes != null) {
                        $rendicion[] = ["Abril",intval($descargo->CantMes)];
                    }
                    break;
                case 5:
                    if ($descargo->mes != null) {
                        $rendicion[] = ["Mayo",intval($descargo->CantMes)];
                    }
                    break;
                case 6:
                    if ($descargo->mes != null) {
                        $rendicion[] = ["Junio",intval($descargo->CantMes)];
                    }
                    break;
                case 7:
                    if ($descargo->mes != null) {
                        $rendicion[] = ["Julio",intval($descargo->CantMes)];
                    }
                    break;
                case 8:
                    if ($descargo->mes != null) {
                        $rendicion[] = ["Agosto",intval($descargo->CantMes)];
                    }
                    break;
                case 9:
                    if ($descargo->mes != null) {
                        $rendicion[] = ["Septiembre",intval($descargo->CantMes)];
                    }
                    break;
                case 10:
                    if ($descargo->mes != null) {
                        $rendicion[] = ["Octubre",intval($descargo->CantMes)];
                    }
                    break;
                case 11:
                    if ($descargo->mes != null) {
                        $rendicion[] = ["Noviembre",intval($descargo->CantMes)];
                    }
                    break;
                case 12:
                    if ($descargo->mes != null) {
                        $rendicion[] = ["Diciembre",intval($descargo->CantMes)];
                    }
                    break;
            }
        }

        $totalInf = DB::select('SELECT COUNT(*) AS cantidad
        FROM informes');

        $totalEnt = DB::select('SELECT COUNT(*) AS cantidad
        FROM entradas');

        $totalSal = DB::select('SELECT COUNT(*) AS cantidad
        FROM salidas');

        $totalDes = DB::select('SELECT COUNT(*) AS cantidad
        FROM descargos');
        dd(json_encode($prueba));
        //return $prueba;
        //return $cantidad;
        //return $info; ->with(['informes' => $informes])
        //return view('control.index', ["data" => json_encode($prueba), "data1" => json_encode($ingresos), "data2" => json_encode($saliente), "data3" => json_encode($rendicion)])->with(['totalInfs' => $totalInf,'totalEnts' => $totalEnt,'totalSals' => $totalSal,'totalDes' => $totalDes]);
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
     * @param  \App\Models\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function show(Control $control)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function edit(Control $control)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Control $control)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Control  $control
     * @return \Illuminate\Http\Response
     */
    public function destroy(Control $control)
    {
        //
    }
}
