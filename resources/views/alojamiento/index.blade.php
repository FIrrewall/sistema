@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection
@section('title','Alojamiento')
@section('content')
<div class="card card-dark">

    <div class="card-header">
        <table width=100%>
            <tr>
                <td align="left" width=5%>
                    <h2><i class="fas fa-hdd"></i></h2>
                </td>
                <td align="center">
                    <h2> ALOJAMIENTO </h2>
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

        @include('alojamiento.create')
        <div class="table-responsive">
            </br>
            <table class="table table-striped" id="datosHdd">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre de alojamiento</th>
                        <th>Nº de Habitaciones</th>
                        <th>Direccion</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @can('alojamiento_indexEmpleado')
                    @foreach($aloja as $alo)
                    @foreach($encar as $en)
                    @if($en->alojamiento_id == $alo->id && $en->id == $useer)
                    <tr>
                        <td>{{ $alo->id}}</td>
                        <td>{{ $alo->nombreA}}</td>
                        <td>{{ $alo->canthabitacion}}</td>
                        <td>{{ $alo->direccion}}</td>
                        <td class="text-center py-0 align-middle">

                            <div class="btn-group btn-group-sm">
                                @can('alojamiento_edit')
                                @include('alojamiento.edit', [$alo -> id])
                                @endcan
                                @can('habitaciones_index')
                                <a href="{{ url('/datosalojamiento/'.$alo->id) }}" class="btn btn-info">
                                    <i class="fas fa-door-open"></i>
                                </a>
                                @endcan
                                @can('inventario_index')
                                <a href="{{ url('/inventario/'.$alo->id) }}" class="btn btn-primary">
                                    <i class="fas fa-dolly-flatbed"></i>
                                </a>
                                @endcan
                            </div>
                            @can('alojamiento_destroy')
                            <form action="{{ url('/alojamiento/'.$alo->id) }}" class="d-inline formulario-eliminar" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endif
                    @endforeach
                    @endforeach
                    @endcan


                    @can('alojamiento_destroy')
                    @foreach($aloja as $alo)
                    <tr>
                        <td>{{ $alo->id}}</td>
                        <td>{{ $alo->nombreA}}</td>
                        <td>{{ $alo->canthabitacion}}</td>
                        <td>{{ $alo->direccion}}</td>
                        <td class="text-center py-0 align-middle">

                            <div class="btn-group btn-group-sm">
                                @can('alojamiento_edit')
                                @include('alojamiento.edit', [$alo -> id])
                                @endcan
                                @can('habitaciones_index')
                                <a href="{{ url('/datosalojamiento/'.$alo->id) }}" class="btn btn-info">
                                    <i class="fas fa-door-open"></i>
                                </a>
                                @endcan
                                @can('inventario_index')
                                <a href="{{ url('/inventario/'.$alo->id) }}" class="btn btn-primary">
                                    <i class="fas fa-dolly-flatbed"></i>
                                </a>
                                @endcan
                            </div>
                            @can('alojamiento_destroy')
                            <form action="{{ url('/alojamiento/'.$alo->id) }}" class="d-inline formulario-eliminar" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                    @endcan



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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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

@if (session('nuevo') == 'error')
<script>
    Swal.fire({
        icon: 'error',
        title: 'No se registro ... ',
        text: 'El nombre ya existe!',
    })
</script>
@endif

@if (session('actualizar') == 'ok')
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Actualizado',
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
        responsive: true,
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