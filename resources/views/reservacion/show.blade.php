@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection
@section('title','Reservaciones')
@section('content')
<div class="card card-info">

    <div class="card-header">
        <table width=100%>
            <tr>
                <td align="left" width=5%>
                    <h2><i class="fas fa-bell"></i></h2>
                </td>
                <td align="center">
                    <h2> DETALLE DE RESERVACION </h2>
                </td>
            </tr>
        </table>
    </div>

    <div class="card-body">
        @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{Session::get('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="card bg-light d-flex flex-fill">
            @foreach($datosreserva as $reser)
            <div class="card-header text-muted border-bottom-2">
                <i class="fas fa-hotel"></i> <b>{{$reser->nombreA}}</b>
            </div>
            </br>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-7">
                        <p class="text-muted text-md"><i class="fas fa-male"></i>&nbsp; <b>Nombre: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$reser->nombre}} {{$reser->paterno}} {{$reser->materno}}</p>
                        <p class="text-muted text-md"><i class="fas fa-money-check"></i>&nbsp; <b>CI: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$reser->ci}} </p>
                        <p class="text-muted text-md"><i class="fas fa-user-check"></i>&nbsp; <b>Edad: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$reser->edad}} </p>
                        <p class="text-muted text-md"><i class="fas fa-female"></i>&nbsp; <b>Nombre: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$reser->nombreacompañante}} {{$reser->paternoacompañante}} {{$reser->maternoacompañante}}</p>
                        <p class="text-muted text-md"><i class="fas fa-money-check"></i>&nbsp; <b>CI: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$reser->ciacompañante}} </p>
                        <p class="text-muted text-md"><i class="fas fa-user-check"></i>&nbsp; <b>Edad: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$reser->edadacompañante}} </p>
                        <p class="text-muted text-md"><i class="fas fa-lg fa-building"></i>&nbsp; <b>Habitacion: </b> &nbsp;&nbsp;{{$reser->numhabitacion}} {{$reser->preferencias}} </p>
                        <p class="text-muted text-md"><i class="fas fa-calendar-alt"></i>&nbsp; <b>Fecha: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{\Carbon\Carbon::parse($reser->fecha)->format('d-m-Y')}}</p>
                        <p class="text-muted text-md"><i class="fas fa-clock"></i>&nbsp; <b>Hr. Entrada: </b>&nbsp;&nbsp;<span class="badge badge-success"> {{\Carbon\Carbon::parse($reser->horaentrada)->format('H:i a')}} </span></p>
                        <p class="text-muted text-md"><i class="fas fa-clock"></i>&nbsp; <b>Hr. Salida: </b>&nbsp;&nbsp;&nbsp;&nbsp; <span class="badge badge-danger"> {{\Carbon\Carbon::parse($reser->horasalida)->format('H:i a')}}</span></p>
                        <p class="text-muted text-md"><i class="fas fa-thermometer-half"></i>&nbsp; <b>Estado: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @if ($reser->estado == 'OCUPADO')
                            <span class="badge badge-danger">OCUPADO</span>
                            @elseif($reser->estado == 'SUCIO')
                            <span class="badge badge-warning">SUCIO</span>
                            @elseif($reser->estado == 'LIBRE')
                            <span class="badge badge-success">LIBRE</span>
                            @endif
                        </p>
                        <p class="text-muted text-md"><i class="fas fa-hand-holding-usd"></i>&nbsp; <b>C. Habitacion:</b>&nbsp;&nbsp;&nbsp;&nbsp; {{$reser->costohabitacion}}.- Bs</p>
                        <p class="text-muted text-md"><i class="fas fa-hand-holding-usd"></i>&nbsp; <b>C. Extra:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$reser->costoExtra}}.- Bs</p>
                        <p class="text-muted text-md"><i class="fas fa-hand-holding-usd"></i>&nbsp; <b>Total:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$reser->total}}.- Bs</p>
                    </div>
                    <div class="col-5 text-center">
                        <img src="/vendor/adminlte/dist/img/alojamiento.png" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                </div>
            </div>
            @endforeach
            <div class="card-footer">
                <div class="text-right">
                    <a href="/reservacion" class="btn btn-md btn-primary">
                        <i class="fas fa-undo-alt"></i> Atras
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('js')

<script src=" https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>



@if (session('eliminar') == 'ok')
<script>
    Swal.fire(
        'Eliminado!',
        'El registro se elimino con éxito.',
        'success'
    )
</script>
@endif

@if (session('nuevo') == 'ok')
<script>
    Swal.fire(
        'Guardado!',
        'El registro se guardo con éxito.',
        'success'
    )
</script>
@endif

@if (session('actualizar') == 'ok')
<script>
    Swal.fire(
        'Actualizado!',
        'El registro se actualizo con éxito.',
        'success'
    )
</script>
@endif

<script>
    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estas seguro?',
            text: "Este registro se eliminara definitivamente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
        })
    });
</script>


<script>
    $('#datosHdd').DataTable({
        responsive: false,
        autoWidth: false,
        "order": [
            [0, 'desc']
        ],
        "language": {
            "lengthMenu": "Mostrar " +
                `<select class="custom-selec custom-select-sm form-control form-control-sm">
                                        <option value = '10'>10</option>
                                        <option value = '25'>25</option>
                                        <option value = '50'>50</option>
                                        <option value = '100'>100</option>
                                        <option value = '-1'>Todos</option>
                                    </select>` +
                " registros por pagina",
            "zeroRecords": "Nada encontrado - Disculpa",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
    });
</script>
@endsection