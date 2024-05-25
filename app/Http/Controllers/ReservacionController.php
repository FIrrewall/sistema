<?php

namespace App\Http\Controllers;

use App\Models\reservacion;
use Illuminate\Http\Request;
use App\Models\encargado;
use App\Models\alojamiento;
use App\Models\habitacion;
use App\Models\productoventa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;

class ReservacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('reservas_index'), 403);
        $datosReser = reservacion::all();
        $datosEncarga = encargado::all();
        $datosHabita = habitacion::all();
        $productoventa = productoventa::all();
        $usuario = user::all();
        //$usuario = auth()->user();
        $useer = Auth::user()->id;

        $pagar = DB::select('SELECT DISTINCT reservacion_id AS idRe,costototal AS total
        FROM
          productoventas PV
        INNER JOIN
          ventas V ON V.id = PV.venta_id
        INNER JOIN
          reservacions R ON R.id = V.reservacion_id
        ORDER BY reservacion_id');

        $reservaciones = DB::select('SELECT R.id,R.nombre,R.paterno,H.numhabitacion,H.preferencias,R.horaentrada,R.horasalida,R.fecha,R.total,R.estado,R.habitacion_id
        FROM
          reservacions AS R
        INNER JOIN 
          habitacions H ON H.id = R.habitacion_id
        INNER JOIN 
          encargados E ON E.alojamiento_id = H.alojamiento_id
        INNER JOIN
          users U ON U.id = E.users_id
        WHERE U.id = '.$useer.'');



        $date = Carbon::now();
        $fec = $date->toDateString();
        $forfe = $date->format('Y-m-d');
        //$mes = $date->format('m');
        //$year = $date->format('Y');

        //return $year;
        //$totpagar = $pagar['totalConsumo'] + $pagar['totalHabi'];

        //return dd($pagar);

        //$user = $usuario->name;
        //return dd($reservaciones);
        
        return view('reservacion.index', compact('useer', 'forfe'))->with(['reservacion' => $reservaciones, 'encar' => $datosEncarga, 'habita' => $datosHabita, 'pagar' => $pagar, 'usuario' => $usuario]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('reservas_create'), 403);
        $useer = Auth::user()->id;
        //return dd($useer);
        $users = User::all();
        foreach ($users as $user) {
            if ($useer == $user->id) {
                $res = $user->name;
            }
        }
        //MANDAR FECHAS Y HORAS MEDIANTE CARBON
        $date = Carbon::now();
        $fec = $date->toDateString();
        $hora = $date->toTimeString();
        //$endDate = $date->addYears(5); 
        $endDate = $date->addHours(2);
        $horasum = $endDate->format('H:i:s');
        //return dd($hora,$endDate,$form);

        //$date1 = Carbon::createFromDate(1970,19,12)->age;
        //return dd($date1);

        $datosAloja['aloja'] = Alojamiento::all();
        $datosHabitacion = habitacion::all();
        $datosEncarga['encar'] = encargado::all();

        /*foreach ($datosEncarga as $emple) {
            foreach ($datosAloja as $aloja) {
                foreach ($datosHabitacion as $hab)
                if ($emple->id == $useer && $aloja->id == $hab->alojamiento_id) {
                    $habitacion[] = [$hab->numerohabitacion,$hab->preferencia];
                }
            }
        }*/
        $habitacion = DB::select('SELECT H.id AS id,numhabitacion, preferencias,estadoH
        FROM
          alojamientos AS A
        INNER JOIN
          encargados E ON A.id = E.alojamiento_id
        INNER JOIN
          habitacions H ON A.id = H.alojamiento_id
        INNER JOIN
          users U ON U.id = E.users_id
        WHERE U.id = ' . $useer . '');
        //$numhab['habita'] = $habitacion;


        //return dd($habitacion);
        //return dd($useer);
        //return dd($hora);
        return view('reservacion.create', compact('useer', 'res', 'fec', 'hora', 'horasum'))->with(['aloja' => $datosAloja, 'habitacion' => $datosHabitacion, 'users' => $users, 'habita' => $habitacion]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosReser = request()->except('_token');
        $habita = habitacion::all();
        //return dd($datosAloja);
        //$post = request()->input('fecha');
        //$now = now();
        //$fecha = $date->toDateTimeString();
        $post = request()->input('habitacion_id');
        $tiposervicio = request()->input('tiempo');

        foreach ($habita as $habi) {
            if ($habi->id == $post) {
                $prueba = $habi->preferencias;
                if ($prueba == 'SIMPLE') {
                    if ($tiposervicio == 'TEMPORAL') {
                        $datosReser['costohabitacion'] = 30;
                    } elseif ($tiposervicio == 'NOCHE') {
                        $datosReser['costohabitacion'] = 60;
                        $hora = 12;
                        $minuto = 00;
                        $segundo = 00;
                        $datosReser['horasalida'] = $hora . ":" . $minuto . ":" . $segundo;
                    }
                } elseif ($prueba == 'CON BAÑO PRIVADO') {
                    if ($tiposervicio == 'TEMPORAL') {
                        $datosReser['costohabitacion'] = 40;
                    } elseif ($tiposervicio == 'NOCHE') {
                        $datosReser['costohabitacion'] = 70;
                        $hora = 12;
                        $minuto = 00;
                        $segundo = 00;
                        $datosReser['horasalida'] = $hora . ":" . $minuto . ":" . $segundo;
                    }
                }
            }
        }
        //return dd($hora);

        $datosReser['estado'] = 'OCUPADO';
        $datosReser['costoExtra'] = 0;
        $datosReser['total'] = $datosReser['costohabitacion'] + $datosReser['costoExtra'];
        //$datosReser['costohabitacion']= 30;
        Reservacion::insert($datosReser);

        $datosHabitacion['estadoH'] = 'OCUPADO';

        Habitacion::where('id', '=', $post)->update($datosHabitacion);
        
        
        //return dd($datosReser);
        //return redirect('hdds')->with('mensaje','Empleado agregado con exito');
        //$post = request()->input('informe_id');
        return redirect('/reservacion')->with('nuevo', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reservacion  $reservacion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //$reserva = Reservacion::findOrFail($id);
        $datosreserva = DB::select('SELECT nombre,paterno,materno,edad,ci,estado,
        nombreacompañante, paternoacompañante,maternoacompañante, edadacompañante,ciacompañante, fecha, horaentrada,horasalida,
        costohabitacion, costoExtra, total, numhabitacion,preferencias, nombreE,paternoE,maternoE,nombreA
        FROM
          alojamientos AS A
        INNER JOIN
          encargados E ON A.id = E.alojamiento_id
        INNER JOIN
          habitacions H ON A.id = H.alojamiento_id
        INNER JOIN
          reservacions R ON H.id = R.habitacion_id
        WHERE R.id = ' . $id . '');

        //return dd($id);
        return view('reservacion.show')->with(['datosreserva' => $datosreserva]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reservacion  $reservacion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('reservas_edit'), 403);
        //abort_if(Gate::denies('informes_edit'),403);
        $reserva = Reservacion::findOrFail($id);
        $useer = Auth::user()->id;
        $users = User::all();
        foreach ($users as $user) {
            if ($useer == $user->id) {
                $res = $user->name;
            }
        }
        $habitacion = DB::select('SELECT H.id AS id,numhabitacion, preferencias,estadoH
        FROM
          alojamientos AS A
        INNER JOIN
          encargados E ON A.id = E.alojamiento_id
        INNER JOIN
          habitacions H ON A.id = H.alojamiento_id
        WHERE E.id = ' . $useer . '');

        $date = Carbon::now();
        $fec = $date->toDateString();
        $hora = $date->toTimeString();

        $endDate = $date->addHours(2);
        $horasum = $endDate->format('H:i:s');
        //$usuario = auth()->user();
        //$user = $usuario->name;
        return view('reservacion.edit', compact('reserva', 'useer', 'res', 'fec', 'hora', 'horasum'))->with(['habita' => $habitacion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reservacion  $reservacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = request()->input('aumentartiempo');
        $estado = request()->input('habitacionE');
        $habId = request()->input('habiId');
        $horaSalida = reservacion::all();



        //return dd($post);

        if ($post == null && $estado == null) {
            $datosReservacion = request()->except(['_token', '_method', 'horaentrada', 'horasalida', 'fecha']);
            Reservacion::where('id', '=', $id)->update($datosReservacion);
        } elseif ($post == 'HORA') {
            //return dd($id);

            foreach ($horaSalida as $hora) {
                //return dd($horaSalida);
                if ($hora->id == $id) {
                    $salida = $hora->horasalida;

                    $horsal = $salida[0] . "" . $salida[1];
                    $minsal = $salida[3] . "" . $salida[4];
                    $segsal = $salida[6] . "" . $salida[7];
                    $horasalida = $horsal + 1;

                    if ($horasalida < 24) {
                        $guardarHora = $horasalida . ":" . $minsal . ":" . $segsal;
                        //return dd($horsal, $salida, $minsal, $segsal, $horasalida, $guardar);
                    } else {
                        $horasalida = 00;
                        $guardarHora = $horasalida . ":" . $minsal . ":" . $segsal;
                    }

                    //--------------------------------//
                    $date = Carbon::now();
                    $habitacion = $hora->costohabitacion;
                    $tot = $hora->total;
                    $endDate = $date->addHours(1);
                    $horasum = $endDate->format('H:i:s');
                    //return dd($endDate);
                    $datoSalida = request()->except(['_token', '_method', 'aumentartiempo']);
                    $datoSalida['horasalida'] = $guardarHora;
                    $datoSalida['costoExtra'] = 10;
                    $datoSalida['total'] = $habitacion + $datoSalida['costoExtra'];
                    //return dd($datoSalida);
                    Reservacion::where('id', '=', $id)->update($datoSalida);
                }
            }
        } elseif ($estado != null) {

            $datoEstado = request()->except(['_token', '_method', 'costo', 'habiId', 'habitacionE']);
            $datoHabiE = request()->except(['_token', '_method', 'costo', 'habiId', 'habitacionE']);
            $datoEstado['estado'] = $estado;
            $datoHabiE['estadoH'] = $estado;
            //return dd($datoEstado);
            Reservacion::where('id', '=', $id)->update($datoEstado);
            Habitacion::where('id', '=', $habId)->update($datoHabiE);
        }


        //$post = request()->input('informe_id');
        return redirect('reservacion')->with('actualizar', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reservacion  $reservacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('reservas_destroy'), 403);
        $reserva = Reservacion::findOrFail($id);
        $idHab = $reserva->habitacion_id;
        $datoEstado['estadoH'] = 'LIBRE';
        Habitacion::where('id', '=', $idHab)->update($datoEstado);
        //return dd($idHab,$datoEstado);
        Reservacion::destroy($id);
        return redirect('reservacion')->with('eliminar', 'ok');
    }
}
