<?php

namespace App\Http\Controllers\Informes;

use App\Http\Controllers\Controller;
use App\Models\Informe;
use App\Models\Hdd;
use App\Models\Plano;
use App\Models\Simbolo;
use App\Models\InventarioAlarma;
use App\Models\Zonificacion;
use App\Models\UsuariosAlarma;
use App\Models\Numero;
use App\Models\TrabajosRealizado;
use App\Models\InventarioCctv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use PDF;
class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('informes_index'),403);
        $datos['informes']=Informe::all();
        //$usuario = auth()->user();
        $usuario = auth()->user();
        $user = $usuario->name;
        $prueva = json_encode($user);
        $llenadoPor = DB::select('SELECT *
        FROM informes
        WHERE estado LIKE '.$prueva.'');

        return view('informe.index',$datos, compact('user'))->with(['llenadoPor' => $llenadoPor]);
        //return dd($llenadoPor);
    }
    public function pdf($id)
    {
        abort_if(Gate::denies('informes_pdf'),403);
        $informes = Informe::all();
        $hdds = Hdd::all();
        $inCctv = InventarioCctv::all();
        $planos = Plano::all();
        $simbologia = Simbolo::all();
        $inAlarma = InventarioAlarma::all();
        $zonas = Zonificacion::all();
        $usuarios = UsuariosAlarma::all();
        $numeros = Numero::all();
        $trabajos = TrabajosRealizado::all();
        
        $cctv = DB::select('SELECT nombre,planta,tipoPlano,informe_id
        FROM planos
        WHERE tipoPlano = "CCTV"');
        $alarma = DB::select('SELECT nombre,planta,tipoPlano,informe_id
        FROM planos
        WHERE tipoPlano = "ALARMAS"');
        //$hdds['informe_id']=Hdd::all();
        //$pruebas ['pruebas'] = Hdd::latest('id');
        //$info = Hdd::find('informe_id');
        //return $alarma;
        $pdf = PDF::loadView('informe.pdf',['informes'=>$informes, 'hdds' => $hdds, 'inCctvs' => $inCctv, 'cctvs' => $cctv, 'alarmas' => $alarma, 'simbolos' => $simbologia, 'inAlarmas' => $inAlarma, 'zonas' => $zonas, 'usuarios' => $usuarios, 'numeros' => $numeros, 'trabajos' => $trabajos,'infoId' => $id]);
        //return $pruebas;
        return $pdf->stream();
        //return view('informe.pdf',compact('informes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('informes_create'),403);
        $usuario = auth()->user();
        $user = $usuario->name;
        return view('informe.create',compact('user'));
        //return dd($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'cliente'=>'required|string|max:100',
            'direccion'=>'required|string|max:100',
            'modeloPanel'=>'required|string|max:100',
            'lineaTelefonica'=>'required|string|max:100',
            'ipModulo'=>'required|string|max:100',
            'observaciones'=>'required|string',
            'recomendaciones'=>'required|string'
        ];
        $mensaje =[
            'required'=>':attribute es requerido'
        ];
        
        $this->validate($request,$campos,$mensaje);     
        
        //$datosEmpleado = request()->all();
        $datosInforme = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        Informe::insert($datosInforme);
        //$post = request()->except('_token','tipoInforme','departamento','cliente','direccion','fecha','nombreAgencia','nombreAtm','modeloPanel','lineaTelefonica','ipModulo','observaciones','recomendaciones','estado');
        //serialize($post);
        return redirect('informes')->with('nuevo','ok');
        //return view('hdds/{$informes->id}')->with('mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function show(Informe $informe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('informes_edit'),403);
        $informe=Informe::findOrFail($id);
        $usuario = auth()->user();
        $user = $usuario->name;
        return view('informe.edit', compact('informe','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosEmpleado = request()->except(['_token','_method']);                
        Informe::where('id', '=' , $id)->update($datosEmpleado);
        return redirect('informes')->with('actualizar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Informe  $informe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('informes_destroy'),403);
        Informe::destroy($id);
        return redirect('informes')->with('eliminar','ok');
    }


    public function work()
    {
        return view('informe.work');
    }
}
