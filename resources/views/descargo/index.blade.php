@extends('adminlte::page')
<!--LINKS PARA EL SOPORTE DE BOOTSTRAP, DATATABLE Y RESPONSIVE-->
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection
<!--TITULO DE LA PAGINA-->
@section('title','Descargos')
<!--CONTENIDO DE LA PAGINA -->
@section('content')
<div class="card card-warning">
    <div class="card-header">
        <!--ENCABEZADO DE LA TABLA-->
        <table width=100%>
            <tr>
                <td align="left" width=5%>
                    <h2><i class="fas fa-clipboard-list"></i></h2>
                </td>
                <td align="center">
                    <h2>LISTA DE DESCARGOS</h2>
                </td>
            </tr>
        </table>
        <!------------------------------------------------------------------->
    </div>
    <div class="card-body">
        <!--ACCESO SOLO A QUIENES SE LOGUEARON DE FORMA CORRECTA-->
        @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{Session::get('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <!--INGRESAR NUEVO DESCARGO-->
        <a href="{{ url('descargos/create') }}" class="btn btn-success"><i class="fas fa-plus-square"></i> Nuevo</a>

        <br />
        <br />
        <div class="table-responsive">
        <!--TABLA DE TODA LA LISTA DE DESCARGOS-->
            <table class="table table-striped" id="empleado">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Departamento</th>
                        <th>Solicitante</th>
                        <th>Fecha</th>
                        <th>Desde</th>
                        <th>Hasta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                <!--LISTA QUE SOLO PUEDE VER SOLO EL ADMI Y EL GERENTE-->
                    @if($user == 'Nestor Catari Mamani' || $user == 'Amilkar Calderon' )
                    @foreach($descargos as $descargo)
                    <tr>
                        <td>{{ $descargo->id}}</td>
                        <td>{{ $descargo->departamento}}</td>
                        <td>{{ $descargo->nombreSolicitante}}</td>
                        <td>{{ \Carbon\Carbon::parse($descargo->fecha)->format('d-m-Y')}}</td>
                        <td>{{ \Carbon\Carbon::parse($descargo->fechaDesde)->format('d-m-Y')}}</td>
                        <td>{{ \Carbon\Carbon::parse($descargo->fechaHasta)->format('d-m-Y')}}</td>
                        <td>
                            <div class="dropdown">
                                @can('descargos_edit')
                                <a href="{{ url('/descargos/'.$descargo->id.'/edit') }}" class="btn btn-warning">
                                    <i class="fas fa-pen"></i>
                                </a>
                                @endcan
                                @can('descargos_destroy')
                                <form action="{{ url('/descargos/'.$descargo->id) }}" class="d-inline formulario-eliminar" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endcan
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ url('/cajaChica/'.$descargo->id) }}"><i class="fas fa-wallet"></i> Caja chica</a>
                                    <a class="dropdown-item" href="{{ url('/registroGastos/'.$descargo->id) }}"><i class="fas fa-funnel-dollar"></i> Gastos</a>
                                    <a class="dropdown-item" href="{{ url('/registroPasajes/'.$descargo->id) }}"><i class="fas fa-bus-alt"></i> Pasajes</a>
                                    <a class="dropdown-item" href="{{ url('/registroViaticos/'.$descargo->id) }}"><i class="fas fa-money-bill-alt"></i> Viaticos</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    @else
                    <!--LISTA DE DESCARGOS VIZUALIZADO POR LOS TECNICOS-->
                    @foreach($llenadoPor as $llenado)
                    <tr>
                        <td>{{ $llenado->id}}</td>
                        <td>{{ $llenado->departamento}}</td>
                        <td>{{ $llenado->nombreSolicitante}}</td>
                        <td>{{ \Carbon\Carbon::parse($llenado->fecha)->format('d-m-Y')}}</td>
                        <td>{{ \Carbon\Carbon::parse($llenado->fechaDesde)->format('d-m-Y')}}</td>
                        <td>{{ \Carbon\Carbon::parse($llenado->fechaHasta)->format('d-m-Y')}}</td>
                        <td>
                            <div class="dropdown">
                                @can('descargos_edit')
                                <a href="{{ url('/descargos/'.$llenado->id.'/edit') }}" class="btn btn-warning">
                                    <i class="fas fa-pen"></i>
                                </a>
                                @endcan
                                @can('descargos_destroy')
                                <form action="{{ url('/descargos/'.$llenado->id) }}" class="d-inline formulario-eliminar" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                @endcan
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ url('/cajaChica/'.$llenado->id) }}"><i class="fas fa-wallet"></i> Caja chica</a>
                                    <a class="dropdown-item" href="{{ url('/registroGastos/'.$llenado->id) }}"><i class="fas fa-funnel-dollar"></i> Gastos</a>
                                    <a class="dropdown-item" href="{{ url('/registroPasajes/'.$llenado->id) }}"><i class="fas fa-bus-alt"></i> Pasajes</a>
                                    <a class="dropdown-item" href="{{ url('/registroViaticos/'.$llenado->id) }}"><i class="fas fa-money-bill-alt"></i> Viaticos</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    @endif

                </tbody>

            </table>

        </div>
    </div>
</div>
@endsection
<!--SECCION DE JAVASCRIPT-->
@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
@include('sweetalert::alert')
<!--ALERTAS-->
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
    $('#empleado').DataTable({
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