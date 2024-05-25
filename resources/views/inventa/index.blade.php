@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection
@section('title','Planos')
@section('content')
<div class="card card-dark">
    <div class="card-header">
        <table width=100%>
            <tr>
                <td align="left" width=5%>
                    <h2><i class="fas fa-clone"></i></h2>
                </td>
                <td align="center">
                    <h2>INVENTARIO</h2>
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
        @include('inventa.create')
        <div class="table-responsive">
            </br>
            <table class="table table-striped" id="datosCctv">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inventario as $inve)
                    @if($inve->alojamiento_id == $idAlo)
                    <tr>
                        <td>{{$inve->id}}</td>
                        <td>{{$inve->descripcion}}</td>
                        <td>{{ \Carbon\Carbon::parse($inve->fecha)->format('d-m-Y')}}</td>
                        <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                @can('inventario_edit')
                                @include('inventa.edit', compact($inve -> id))
                                @endcan
                                @can('productoInventario_index')
                                <a href="{{ url('/productoInve/'.$inve->id) }}" class="btn btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @endcan
                            </div>
                            @can('inventario_destroy')
                            <form action="{{ url('/inventarios/'.$inve->id)}}" class="d-inline" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <div class="btn-group btn-group-sm">
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-footer justify-content-between">
            <a href="{{ url('/alojamiento') }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> &nbsp;Atras</a>
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
    Swal.fire(
        'Actualizado!',
        'El registro se actualizo con éxito.',
        'success'
    )
</script>
@endif

<script>
    $('#datosCctv').DataTable({
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