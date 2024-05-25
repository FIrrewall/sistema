@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('title','Entradas')

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <table width=100%>
            <tr>
                <td align="left" width=5%>
                    <h2><i class="fas fa-ticket-alt"></i></h2>
                </td>
                <td align="center">
                    <h2>ENTRADAS DEL MES DE {{$resul}}</h2>
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
        <!--<a href="{{ url('inventarios/create') }}" class="btn btn-info">Nuevo Inventario</a>-->

        <a href="{{ url('/entradaInventario/create/'.$id) }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Nuevo
        </a>

        <a href="{{ url('/entradas/pdf/'.$id) }}" class="btn btn-dark" onclick="alerta();">
            <i class="far fa-file-pdf"></i> Entradas
        </a>
        <br />
        <br />
        <div class="table-responsive">
            <table class="table table-striped" id="empleado">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Codigo</th>
                        <th># Factura</th>
                        <th># Nota</th>
                        <th>Fecha</th>
                        
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($entradas as $entrada)
                    @if($id == $entrada->inventari_id)
                    <tr>
                        <td>{{ $entrada->id}}</td>
                        <td>{{ $entrada->codigoEn}}</td>
                        <td>{{ $entrada->numeroFactura}}</td>
                        <td>{{ $entrada->numeroNotaEn}}</td>
                        <td>{{ \Carbon\Carbon::parse($entrada->fecha)->format('d-m-Y')}}</td>
                        <td>{{ $entrada->descripcionEn}}</td>
                        <td>{{ $entrada->cantidadEn}}</td>
                        <td>
                            @can('entradas_edit')
                            <a href="{{ url('/entradas/'.$entrada->id.'/edit') }}" class="btn btn-warning">
                                <i class="fas fa-pen"></i>
                            </a>
                            @endcan
                            @can('entradas_destroy')
                            <form action="{{ url('/entradas/'.$entrada->id) }}" class="d-inline formulario-eliminar" method="post">
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
            <br />
            <a href="{{ url('/existenteInventario/'.$id) }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
        </div>
    </div>
</div>
@endsection

@section('js')

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
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

<script type="text/javascript">
    function alerta() {
        let timerInterval
        Swal.fire({
            title: 'Lo estamos preparando!',
            icon: 'success',
            html: 'Aguarde un momento por favor',
            timer: 5000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
        })
    }
</script>

<script>
    $('#empleado').DataTable({
        responsive: false,
        autoWidth: false,
        "order": [[0,'desc']],
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