@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection



@section('content')
<br />
<div class="card">
    <div class="card-body">
        @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{Session::get('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <a href="{{ url('empleado/create') }}" class="btn btn-success">Nuevo empleado</a>
        <br/>
        <br/>
        <table class="table table-dark table-striped" id="empleado">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id}}</td>
                    <td>
                        <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto }}" width="100">
                    </td>
                    <td>{{ $empleado->Nombre}}</td>
                    <td>{{ $empleado->ApellidoPaterno}}</td>
                    <td>{{ $empleado->ApellidoMaterno}}</td>
                    <td>{{ $empleado->Correo}}</td>
                    <td>
                        <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">
                            Editar
                        </a>
                        <form action="{{ url('/empleado/'.$empleado->id) }}" class="d-inline" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>
@endsection

@section('js')

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script>
    $('#empleado').DataTable({
        responsive: true,
        autoWidth: false,
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



@foreach($salidas as $salida)
                        @if($salida->codigoSal == $existente->codigoProducto)
                        <td>{{$salida->cantidadSalida}}</td>
                        @break
                        @endif
                        @endforeach