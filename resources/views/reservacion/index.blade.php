@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection
@section('title','Reservaciones')
@section('content')
<div class="card card-dark">

    <div class="card-header">
        <table width=100%>
            <tr>
                <td align="left" width=5%>
                    <h2><i class="fas fa-hdd"></i></h2>
                </td>
                <td align="center">
                    <h2> RESERVACIONES </h2>
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

        @can('reservas_create')
        <a href="{{ url('reservacion/create') }}" class="btn btn-success">
            <i class="fas fa-plus-square"></i> Nuevo
        </a>
        @endcan
        <div class="table-responsive">
            </br>
            <table class="table table-striped" id="datosHdd">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Habitacion</th>
                        <th>Entrada</th>
                        <th>Salida</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservacion as $reser)
                    <tr>
                        <td>{{ $reser->id }}</td>
                        <td>{{ $reser->nombre}} {{ $reser->paterno}}</td>
                        <td>{{$reser->numhabitacion}} {{$reser->preferencias}}</td>
                        <td><span class="badge badge-success">{{\Carbon\Carbon::parse($reser->horaentrada)->format('H:i a')}}</span></td>
                        <td><span class="badge badge-danger">{{\Carbon\Carbon::parse($reser->horasalida)->format('H:i a')}}</span></td>
                        <td>{{ $reser->total}}.- Bs</td>
                        <td>
                            @if ($reser->estado == 'OCUPADO')
                            <span class="badge badge-danger">OCUPADO</span>
                            @elseif($reser->estado == 'SUCIO')
                            <span class="badge badge-warning">SUCIO</span>
                            @elseif($reser->estado == 'LIBRE')
                            <span class="badge badge-success">LIBRE</span>
                            @endif
                        </td>

                        <td class="text-center py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ url('/reservacion/'.$reser->id) }}" class="btn btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ url('/reservacion/'.$reser->id.'/edit') }}" class="btn btn-warning">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{ url('/ventas/'.$reser->id) }}" class="btn btn-secondary">
                                    <i class="fas fa-cash-register"></i>
                                </a>
                                @include('reservacion.salida', [$reser -> id])
                                @include('reservacion.estado', [$reser -> id])
                            </div>
                            <form action="{{ url('/reservacion/'.$reser->id) }}" class="d-inline formulario-eliminar" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </br>

            <!--<a href="{{ url('/informes') }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>-->
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
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Eliminado con éxito.',
        showConfirmButton: false,
        timer: 1000
    })
</script>
@endif

@if (session('nuevo') == 'ok')
<script>  
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Guardado con éxito.',
        showConfirmButton: false,
        timer: 1000
    })
</script>
@endif

@if (session('actualizar') == 'ok')
<script>
    
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Actualizado!',
        showConfirmButton: false,
        timer: 1000
    })
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