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
                    <h2>RESUMEN</h2>
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
        @include('productoinventarios.create')
        <div class="table-responsive">
            </br>
            <table class="table table-striped" id="datosCctv">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Entrada</th>
                        <th>Salida</th>
                        <th>Stock</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proinve as $inve)
                    <tr>
                        <td>{{ $inve->id}}</td>
                        @foreach($producto as $pro)
                        @if($inve->producto_id == $pro->id)
                        <td>{{ $pro->nombre}}</td>
                        @endif
                        @endforeach
                        <td>{{ $inve->cantidad}}</td>
                        <td>{{ $inve->entrada}}</td>
                        <td>{{ $inve->salida}}</td>
                        <td>{{ $inve->stock}}</td>
                        <td class="text-center py-0 align-middle">

                            <div class="btn-group btn-group-sm">
                                @include('productoinventarios.edit', [$inve -> id,$idIn])
                                @include('productoinventarios.entrada', [$inve -> id,$idIn])
                                @include('productoinventarios.salida', [$inve -> id,$idIn])
                            </div>
                            <form action="{{ url('/productoinventario/'.$inve->id) }}" class="d-inline formulario-eliminar" method="post">
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
        </div>
        <div class="modal-footer justify-content-between">
            <a href="{{ url('inventario/'.$idIn) }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> &nbsp;Atras</a>
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
        text: 'El producto ya existe!',
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

@if (session('actualizar') == 'info')
<script>
    Swal.fire({
        icon: 'info',
        title: 'Alerta... ',
        text: 'Ya no hay productos disponibles!',
    })
</script>
@endif

@if (session('actualizar') == 'error')
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops... ',
        text: 'No cuenta con la cantidad necesaria!',
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