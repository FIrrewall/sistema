<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>viaticos</title>

    <!--<link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">-->
</head>
<style>
    table,
    td {

        border: none;
        page-break-inside: auto;
        /*border: 1px solid black;*/
    }

    th {
        color: #000000;
        background-color: #ADD8E6;
    }

    @page {
        margin-left: 2.00cm;
        margin-right: 2.00cm;
        margin-top: 1.50cm;
        margin-bottom: 1.50cm;
    }

    body {
        margin: 0;
        padding: 0;
        background: url('vendor/adminlte/dist/img/logoPrueba.png');
        opacity: 0.10;
        filter: alpha(opacity=10);
        background-size: contain;
        background-position: top center;
    }
</style>


<body>

    @foreach($descargos as $descargo)
    @if($descargo->id == $resId)
    <table border cellpadding=5 cellspacing=0 width="100%">
        <thead>
            <tr>
                <td align="center" width="20%">
                    <h2>Nº {{$descargo->id}}</h2>
                </td>
                <td align="center"><strong>
                        <h2>DESCARGO DE <br> VIATICOS</h2>
                    </strong></td>
                <td align="center" width="20%"><img src="vendor/adminlte/dist/img/logoPrueba.png" width="150" height="100"></td>
            </tr>
        </thead>
    </table>
    @endif
    @endforeach
    <table border="none" cellpadding=3 cellspacing=0 width="100%">
        @foreach($descargos as $descargo)
        @if($descargo->id == $resId)
        <tbody>
            <tr>
                <td width="20%"><strong>DE:</strong></td>
                <td colspan="2">{{$descargo->nombreSolicitante}}</td>
            </tr>
            <tr>
                <td width="20%"><strong>CARGO:</strong></td>
                <td colspan="2">{{$descargo->cargo}}</td>
            </tr>
            <tr>
                <td><strong>PARA:</strong></td>
                <td colspan="2">{{$descargo->nombreDestinatario}}</td>
            </tr>
            <tr>
                <td><strong>FECHA:</strong></td>
                <td colspan="2">{{ \Carbon\Carbon::parse($descargo->fecha)->format('d-m-Y')}}</td>
            </tr>
            <tr>
                <td><strong>DEPARTAMENTO:</strong></td>
                <td colspan="2">{{$descargo->departamento}}</td>
            </tr>
        </tbody>
        @endif
        @endforeach
    </table>
    <br />

    <table border cellpadding=5 cellspacing=0 width="100%">
        <thead>
            <tr>
                <th align="center"><strong>Codigo</strong></th>
                <th align="center"><strong>Detalle</strong></th>
                <th align="center"><strong>Fecha</strong></th>
                <th align="center"><strong>Hospedaje</strong></th>
                <th align="center"><strong>Desayuno</strong></th>
                <th align="center"><strong>Almuerzo</strong></th>
                <th align="center"><strong>Cena</strong></th>
                <th align="center"><strong>Gastos Varios</strong></th>
                <th align="center"><strong>Transporte</strong></th>
                <th align="center"><strong>Total</strong></th>
            </tr>


        <tbody>
            @foreach($viaticos as $viatico)
            @if($viatico->descargo_id == $resId)
            <tr>
                <td>{{$viatico->codigo}}</td>
                <td>{{$viatico->detalle}}</td>
                <td align=right>{{ \Carbon\Carbon::parse($viatico->fecha)->format('d-m-Y')}}</td>
                <td align=right>{{$viatico->alojamiento}}</td>
                <td align=right>{{$viatico->desayuno}}</td>
                <td align=right>{{$viatico->almuerzo}}</td>
                <td align=right>{{$viatico->cena}}</td>
                <td align=right>{{$viatico->gastosVarios}}</td>
                <td align=right>{{$viatico->transporte}}</td>
                @foreach($sumas as $suma)
                @if($viatico->codigo == $suma->codigo)
                <td align=right>{{ $suma->sumatoria}}</td>
                @break
                @endif
                @endforeach
            </tr>
            @endif
            @endforeach
            @foreach($totals as $montoTotal)
            <tr>
                <td colspan="8"></td>
                <td>Total</td>
                <td align=right>{{$montoTotal->total}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br />
    <br />
    <table border cellpadding=5 cellspacing=0 width="100%">
        <tr>
            <td width="45%" align="center">
                <table width="100%">
                    <tbody>
                        <tr align="center">
                            @foreach($descargos as $descargo)
                            @if($descargo->id == $resId)
                            <td align=justify colspan="2">Certifico que la informacion mostrada en este formato es una declaracion verdadera de gastos incurridos por mi persona por asuntos estrictamente requeridos para el funcionamiento de la oficina regional de {{$descargo->departamento}}</td>
                            @endif
                            @endforeach
                        </tr>
                        <tr>
                            <td> </td>
                        </tr>
                        <tr>
                            <td> </td>
                        </tr>
                        @foreach($descargos as $descargo)
                        @if($descargo->id == $resId)
                        <tr>
                            <td align=left>FIRMA:</td>
                            <td align=center>________________________________</td>
                        </tr>
                        <tr>
                            <td align=left>NOMBRE:</td>
                            <td align=center>{{$descargo->nombreSolicitante}}</td>
                        </tr>
                        <tr>
                            <td align=left>CI:</td>
                            <td align=center>{{$descargo->ci}}</td>
                        </tr>
                        <tr>
                            <td align=left>FECHA:</td>
                            <td align=center>{{ \Carbon\Carbon::parse($descargo->fecha)->format('d-m-Y')}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>

                </table>
            </td>
            <td width="10%"></td>
            <td width="45%" align="center">
                <table width="100%">
                    <thead>
                        <tr>
                            <th colspan="2" align="center">REPOSICIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td width="40%">APROBADO POR:</td>
                            <td width="60%">______________________________</td>
                        </tr>
                        <tr>
                            <td>CARGO:</td>
                            <td>______________________________</td>
                        </tr>
                        <tr>
                            <td>FECHA:</td>
                            <td>______________________________</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>

    </table>



</body>

</html>