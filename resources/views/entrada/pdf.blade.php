<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entradas</title>
    <!--<link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">-->
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
    }

    @page {
        margin-left: 2.54cm;
        margin-right: 2.54cm;
        margin-top: 2.54cm;
        margin-bottom: 2.54cm;
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

    @foreach($inventarios as $inventario)
    @if($inventario->id == $resId)
    <table border cellpadding=5 cellspacing=0 width="100%">
        <thead>
            <tr>
                <td align="center" width="20%">
                    <h2>N° {{$inventario->id}}</h2>
                </td>
                <td align="center"><strong>
                        <h2>ENTRADAS <br> mes de {{$inventario->descripcion}}</h2>
                    </strong></td>
                <td align="center" width="20%"><img src="vendor/adminlte/dist/img/logoPrueba.png" width="150" height="120"></td>
            </tr>
        </thead>
    </table>
    @endif
    @endforeach
    <br />
    <br />


    <table border cellpadding=5 cellspacing=0 width="100%">
        <thead>
            <tr>
                <th align="center"><strong>ID</strong></th>
                <th align="center"><strong>Nº de Factura</strong></th>
                <th align="center"><strong>Nº de Nota</strong></th>
                <th align="center"><strong>Fecha</strong></th>
                <th align="center"><strong>Codigo</strong></th>
                <th align="center"><strong>Descripcion</strong></th>
                <th align="center"><strong>Cantidad</strong></th>
            </tr>
        </thead>
        @foreach($entradas as $entrada)
        @if($entrada->inventari_id == $resId)
        <tbody>
            <tr>
                <td align=center>{{$entrada->id}}</td>
                <td>{{$entrada->numeroFactura}}</td>
                <td>{{$entrada->numeroNotaEn}}</td>
                <td align=left>{{ \Carbon\Carbon::parse($entrada->fecha)->format('d-m-Y')}}</td>
                <td align=left>{{$entrada->codigoEn}}</td>
                <td align=left>{{$entrada->descripcionEn}}</td>
                <td align=right>{{$entrada->cantidadEn}}</td>
            </tr>
        </tbody>
        @endif
        @endforeach
    </table>


</body>

</html>