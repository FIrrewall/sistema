@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection
@section('title','Usuarios de Alarmas')
@section('content')
<div class="card card-dark">
    <div class="card-header">
        <table width=100%>
            <tr>
                <td align="left" width=5%>
                    <h2><i class="fas fa-address-book"></i></h2>
                </td>
                <td align="center">
                    <h2> USUARIOS DE {{$resul}}</h2>
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
        <a href="{{ url('/alarmaUsuarios/create/'.$id) }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Nuevo</a>
        <div class="table-responsive">
            </br>
            <table id="datos" class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Numero de Usuario</th>
                        <th>Nombre</th>
                        <th>Area</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    @if($id == $usuario->informe_id)
                    <tr>
                        <td>{{ $usuario->id}}</td>
                        <td>{{ $usuario->numeroUsuario}}</td>
                        <td>{{ $usuario->nombreUsuario}}</td>
                        <td>{{ $usuario->numeroArea}} {{ $usuario->area}}</td>
                        <td>
                            @can('usuariosAlarma_edit')
                            <a href="{{ url('/usuariosAlarma/'.$usuario->id.'/edit') }}" class="btn btn-warning">
                                <i class="fas fa-pen"></i>
                            </a>
                            @endcan
                            @can('usuariosAlarma_destroy')
                            <form action="{{ url('/usuariosAlarma/'.$usuario->id) }}" class="d-inline formulario-eliminar" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        </br>
        <a href="{{ url('/informes') }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
    </div>
</div>


@endsection

@section('js')

<script src=" https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>


@include('sweetalert::alert')

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
    $('#datos').DataTable({
        responsive: false,
        autoWidth: false,
        "order": [[0,'desc']],
        "language": {
            "lengthMenu": "Mostrar " +
                `<select class="custom-selec custom-select-sm form-control form-control-sm">
                                        <option value = '5'>5</option>                        
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



<!--<script>
    $('#datosUsuarios').DataTable({
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
</script>-->
@endsection