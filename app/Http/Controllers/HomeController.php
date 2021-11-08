<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //$path = $request->Foto->store('uploads', 'public');
        //$datosEmpleado['Foto'] = $request->file('Foto')->store('public/storage/uploads');

        //$imagen = $request->file('Foto')->store('uploads', 'public');
        //$nombre = time().'.'.$imagen->getClientOriginalExtension('Foto');
        //$destino = public_path('public/storage/uploads');
        //$request->Foto->move($destino, $nombre);
        //$datosEmpleado['Foto'] = $request->file('Foto')->store('uploads', 'public');
}
