<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @foreach($informes as $informe)
    @if($informe->id == $infoId)
    @if($informe->tipoInforme == "AGENCIA")
    <title>{{$informe->tipoInforme}} {{$informe->nombreAgencia}}</title>
    @else
    <title>{{$informe->tipoInforme}} {{$informe->nombreAtm}}</title>
    @endif
    @endif
    @endforeach
</head>
<style>
    table,
    td {
        border: 1px solid black;
        page-break-inside: auto;
    }

    th {
        color: #000000;
        background-color: #ADD8E6;
        border: 1px solid black;
        page-break-inside: auto;
    }

    @page {
        margin-left: 2.54cm;
        margin-right: 2.54cm;
        margin-top: 2.00cm;
        margin-bottom: 2.00cm;
    }

    body {
        margin: 0;
        padding: 0;
        background: url('vendor/adminlte/dist/img/logoPrueba.png');
        opacity: 0.15;
        filter: alpha(opacity=15);
        background-size: contain;
        background-position: top center;
    }
</style>


<body>

    @foreach($informes as $informe)
    @if($informe->id == $infoId)
    <table border cellpadding=5 cellspacing=0 width="100%">
        <thead>
            <tr>
                <td align="center">
                    <h2>N° {{$informe->id}}</h2>
                </td>
                @if($informe->tipoInforme == "AGENCIA")
                <td align="center"><strong>
                        <h2>MANTENIMIENTO PREVENTIVO <br> {{$informe->tipoInforme}} {{$informe->nombreAgencia}}</h2>
                    </strong></td>
                @else
                <td align="center"><strong>
                        <h2>MANTENIMIENTO PREVENTIVO <br> {{$informe->tipoInforme}} {{$informe->nombreAtm}}</h2>
                    </strong></td>
                @endif
                <td align="center"><img src="vendor/adminlte/dist/img/logoPrueba.png" width="150" height="120"></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th align=left width="20%"><strong>Cliente</strong></th>
                <td colspan="2">{{$informe->cliente}}</td>
            </tr>
            <tr>
                <th align=left><strong>Direccion</strong></th>
                <td colspan="2">{{$informe->direccion}}</td>
            </tr>
            <tr>
                <th align=left><strong>Autor</strong></th>
                <td colspan="2">{{$informe->estado}}</td>
            </tr>
            <tr>
                <th align=left><strong>Fecha</strong></th>
                <td colspan="2">{{ \Carbon\Carbon::parse($informe->fecha)->format('d-m-Y')}}</td>
            </tr>
            <tr>
                <th align=left><strong>Tiempo de grabacion</strong></th>
                <td colspan="2">{{ \Carbon\Carbon::parse($informe->tiempoGrabacion)->format('d-m-Y')}}</td>
            </tr>
        </tbody>
    </table>
    <br />
    <table border cellpadding=5 cellspacing=0 width="100%">
        <thead>
            <tr align=center>
                <th colspan="2"><strong>DATOS SISTEMA DE ALARMAS</strong></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th align=left width="50%"><strong>Modelo de Panel</strong></th>
                <td width="50%">{{$informe->modeloPanel}}</td>
            </tr>
            <tr>
                <th align=left><strong>Linea telefonica de central receptora</strong></th>
                <td>{{$informe->lineaTelefonica}}</td>
            </tr>
            <tr>
                <th align=left><strong>IP Modulo</strong></th>
                <td>{{$informe->ipModulo}}</td>
            </tr>
        </tbody>
    </table>
    @endif
    @endforeach
    <br />
    <table border cellpadding=5 cellspacing=0 width=100%>
        <thead>
            <tr>
                <th>SISTEMA DE ALARMAS</th>
            </tr>
        </thead>
        <tbody>
            <tr>@foreach($informes as $informe)
                @if($informe->id == $infoId)
                <td align=justify>{{$informe->alarmas}}</td>
                @endif
                @endforeach
            </tr>

        </tbody>
    </table>
    <br />
    <table border cellpadding=5 cellspacing=0 width=100%>
        <thead>
            <tr>
                <th>SISTEMA CCTTV</th>
            </tr>
        </thead>
        <tbody>
            <tr>@foreach($informes as $informe)
                @if($informe->id == $infoId)
                <td align=justify>{{$informe->cctv}}
                </td>
                @endif
                @endforeach
            </tr>

        </tbody>
    </table>
    <br />

    <table border cellpadding=5 cellspacing=0 width=100%>
        <thead>
            <tr>
                <th>OBSERVACIONES</th>
            </tr>
        </thead>
        <tbody>
            <tr>@foreach($informes as $informe)
                @if($informe->id == $infoId)
                <td align=justify>{{$informe->cctv}}
                </td>
                @endif
                @endforeach
            </tr>

        </tbody>
    </table>
    <br />
    <table border cellpadding=5 cellspacing=0 width=100%>
        <thead>
            <tr>
                <th>RECOMENDACIONES</th>
            </tr>
        </thead>
        <tbody>
            <tr>@foreach($informes as $informe)
                @if($informe->id == $infoId)
                <td align=justify>{{$informe->cctv}}
                </td>
                @endif
                @endforeach
            </tr>

        </tbody>
    </table>
    <br />
    <br />
    <table border cellpadding=8 cellspacing=0 width=100%>
        <thead>
            <tr>
                <th>PLANOS DE CCTV</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cctvs as $cctv)
            @if($cctv->informe_id == $infoId)
            <tr>
                <th align=center>{{$cctv->nombre}}</th>
            </tr>
            <tr>
                <td align=center><img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$cctv->planta }}" width="550" height="370"></td>
            </tr>
            @endif
            @endforeach

        </tbody>
    </table>
    <br />
    <br />



    <table border cellpadding=5 cellspacing=0 align=center width=70%>
        <thead>
            <tr align=center>
                <th colspan="2"><strong>INVENTARIO CCTV</strong></th>
            </tr>
            <tr align=center>
                <th><strong>Descripcion</strong></th>
                <th><strong>Cantidad</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($inCctvs as $inCctv)
            @if($inCctv->informe_id == $infoId)
            <tr>
                <td>{{$inCctv->nombreEquipo}}</td>
                <td align=center>{{$inCctv->cantidad}}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <br />
    <br />
    <table border cellpadding=5 cellspacing=0 align=center width=80%>
        <thead>
            <tr>
                <th colspan=4 align=center><strong>LISTA DE HDD'S</strong></th>
            </tr>
            <tr align=center>
                <th><strong>Nº De Serie</strong></th>
                <th><strong>Marca</strong></th>
                <th><strong>Cantidad</strong></th>
                <th><strong>Capacidad en TB</strong></th>
            </tr>
        </thead>
        @foreach($hdds as $hdd)
        @if($hdd->informe_id == $infoId)
        <tbody>
            <tr>
                <td>{{$hdd->numeroSerie}}</td>
                <td>{{$hdd->marca}}</td>
                <td align=center>{{$hdd->cantidad}}</td>
                <td align=center>{{$hdd->capacidad}}</td>
            </tr>
        </tbody>
        @endif
        @endforeach
    </table>
    <br />
    <br />
    <table border cellpadding=8 cellspacing=0 width=100%>
        <thead>
            <tr>
                <th>PLANOS DE ALARMAS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alarmas as $alarma)
            @if($alarma->informe_id == $infoId)
            <tr>
                <th align=center>{{$alarma->nombre}}</th>
            </tr>
            <tr>
                <td align=center><img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$alarma->planta }}" width="550" height="360"></td>
            </tr>
            @endif
            @endforeach

        </tbody>
    </table>
    <br />
    <br />
    <table border cellpadding=5 cellspacing=0 align="center" width="70%">
        <thead>
            <tr>
                <th colspan=2 align=center><strong>SIMBOLOGIA</strong></th>
            </tr>
            <tr align=center>
                <th><strong>Nombre</strong></th>
                <th><strong>Simbolo</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($simbolos as $simbolo)
            <tr>
                <td>{{ $simbolo->nombreSimbolo}}</td>
                <td align=center><img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$simbolo->simbolo }}" width="50"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br />
    <br />
    <table border cellpadding=5 cellspacing=0 align=center width=70%>
        <thead align=center>
            <tr>
                <th colspan=2 align=center><strong>INVENTARIO ALARMAS</strong></th>
            </tr>
            <tr>
                <th><strong>Descripcion</strong></th>
                <th><strong>Cantidad</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($inAlarmas as $inAlarma)
            @if($inAlarma->informe_id == $infoId)
            <tr>
                <td>{{$inAlarma->nombreEquipo}}</td>
                <td align="center">{{$inAlarma->cantidad}}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <br />
    <br />
    <table border cellpadding=5 cellspacing=0 align=center width=100%>
        <thead>
            <tr>
                <th colspan=6 align=center><strong>ZONIFICACION</strong></th>
            </tr>
            <tr align=center>
                <th><strong>Nombre del modulo</strong></th>
                <th><strong>Identificador</strong></th>
                <th><strong>Zona</strong></th>
                <th><strong>Particion</strong></th>
                <th><strong>Dispositivo</strong></th>
                <th><strong>Localizacion</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($zonas as $zona)
            @if($zona->informe_id == $infoId)
            <tr>
                <td>{{$zona->nombreModulo}}</td>
                <td align=center>{{$zona->numeroSerie}}</td>
                <td align=center>{{$zona->numeroZona}}</td>
                <td>{{$zona->numeroParticion}} {{$zona->nombreParticion}}</td>
                <td>{{$zona->nombreSensor}}</td>
                <td>{{$zona->descripcion}}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <br />
    <br />
    <table border cellpadding=5 cellspacing=0 align=center width=70%>
        <thead>
            <tr>
                <th colspan=3 align=center><strong>USUARIOS DE ALARMAS</strong></th>
            </tr>
            <tr align=center>
                <th><strong>Nº de Usuario</strong></th>
                <th><strong>Nombre de Usuario</strong></th>
                <th><strong>Area</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            @if($usuario->informe_id == $infoId)
            <tr>
                <td align=center>{{$usuario->numeroUsuario}}</td>
                <td>{{$usuario->nombreUsuario}}</td>
                <td>{{$usuario->area}}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <br />
    <br />
    <table border cellpadding=5 cellspacing=0 align=center width=70%>
        <thead>
            <tr>
                <th colspan=2 align=center><strong>REGISTRO DE NUMEROS PARA EMERGENCIAS</strong></th>
            </tr>
            <tr align=center>
                <th><strong>Nombre</strong></th>
                <th><strong>Telefono o Celular</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($numeros as $numero)
            @if($numero->informe_id == $infoId)
            <tr>
                <td>{{$numero->nombre}}</td>
                <td align="right">{{$numero->telefono}}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <br />
    <br />
    <table border cellpadding=5 cellspacing=0 width=100% align=center>
        <thead>
            <tr>
                <th colspan=2 align=center><strong>TRABAJOS REALIZADOS</strong></th>
            </tr>
            <tr align=center>
                <th><strong>Descripcion</strong></th>
                <th><strong>Imagen</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($trabajos as $trabajo)
            @if($trabajo->informe_id == $infoId)
            <tr>
                <td width=40%>{{ $trabajo->descripcion}}</td>
                <td align=center width=60%><img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$trabajo->imagen }}" width="300" height="200"></td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</body>

</html>

@section('js')

<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.js'></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>


@include('sweetalert::alert')



@endsection