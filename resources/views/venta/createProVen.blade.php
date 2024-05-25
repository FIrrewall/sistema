@extends('adminlte::page')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/css/admin_custom.css">
@endsection
@section('title', 'Alojamiento')


@section('content')
<div class="card card-dark">
    <div class="card-header">
        <table width=100%>
            <tr>
                <td align="left" width=5%>
                    <h2><i class="fas fa-hdd"></i></h2>
                </td>
                <td align="center">
                    <h2> ACTUALIZAR VENTA </h2>
                </td>
            </tr>
        </table>
    </div>

    <div class="card-body">
        @if (Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form action="{{ url ('/productoventa')}}" method="post" entype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="col-md-5 mb-3">
                    <input type="hidden" class="form-control" name="venta_id" value="{{$idVe}}" id="venta_id" required>
                    <input type="hidden" class="form-control" name="variable" value="0" id="variable" required>
                    <input type="hidden" class="form-control" name="reserva_id" value="{{$idReser}}" id="reserva_id" required>
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-4">
                    <label for="exampleFormControlInput1">Producto</label>
                    <select id="producto_id" name="producto_id" class="form-control" onchange="select();">
                        @foreach ($producto as $pro)
                        <option value="{{ $pro->id }}">{{ $pro->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-4">
                    <label for="exampleFormControlInput1">Cantidad</label>
                    <input type="number" class="form-control" name="cantidad" id="cantidad" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="exampleFormControlInput1">Costo</label>
                    <select type="number" id="costo" name="costo" class="form-control" onchange="select1();">
                        @foreach ($producto as $pro)
                        <option value="{{$pro->precio}}">{{ $pro->precio }} &nbsp;&nbsp;Bs.-</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="modal-footer justify-content-between">
                @csrf
                <button type="submit" class="btn btn-success"><i class="fas fa-upload"></i> &nbsp;Agregar</button>
            </div>
        </form>

        </br>
        <div class="table-responsive">
            <table class="table table-striped" id="detalles">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Costo</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proven as $ven)
                    <tr>
                        <td>{{$ven->id}}</td>
                        <td>{{$ven->nombre}}</td>
                        <td>{{$ven->cantidad}}</td>
                        <td>{{$ven->costo}}</td>
                        <td>{{$ven->subtotal}}</td>
                        <td class="text-right py-0 align-middle">
                            <form action="{{ url('/productoventa/'.$ven->id) }}" class="d-inline formulario-eliminar" method="post">
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
                <tfoot>
                    @foreach ($costo as $cos)
                    <tr>
                        <th>Costo Total</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>{{$cos->total}}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </tfoot>
            </table>
        </div>

        <div class="modal-footer justify-content-between">
            <a href="{{ url('/ventas/'.$idReser) }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> &nbsp;Atras</a>
        </div>
        
    </div>

</div>
@stop

@section('js')

<script src=" https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!--<script>
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
</script>-->

<script type="text/javascript">
    //var sel = document.getElementById( 'codigoProducto' );
    //var index = sel.selectedIndex;

    var selection = document.getElementById("producto_id");
    var descripcion = document.getElementById("costo");

    function select() {
        for (var i = 0; i < descripcion.length; i++) {
            if (selection.selectedIndex == descripcion[i].index) {
                descripcion.options[i].selected = true;
                //console.log(descripcion[i].text);
            }
        }
    }

    function select1() {
        for (var i = 0; i < selection.length; i++) {
            if (descripcion.selectedIndex == selection[i].index) {
                selection.options[i].selected = true;
                //console.log(selection[i].text);
            }
        }
    }
</script>


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
        icon: 'warning',
        title: 'Opps ... ',
        text: 'No le alcanza los productos!',
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

@if (session('actualizar') == 'error')
<script>
    Swal.fire({
        icon: 'warning',
        title: 'Opps ... ',
        text: 'No le alcanza los productos!',
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
    $('#detalles').DataTable({
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