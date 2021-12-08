@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('title','Caja_Chica')

@section('content')

</br>
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
        <h1>
            <center>CAJA CHICA</center>
        </h1>
        @include('cajaChica.create',[$id])
        <div class="table-responsive">
            </br>
            <table class="table table-striped" id="datosCctv">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Codigo</th>
                        <th>Detalle</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cajas as $caja)
                    @if($id == $caja->descargo_id)
                    <tr>
                        <td>{{ $caja->id}}</td>
                        <td>{{ $caja->codigo}}</td>
                        <td>{{ $caja->detalle}}</td>
                        <td>{{ $caja->clienteProyecto}}</td>
                        <td>{{ \Carbon\Carbon::parse($caja->fecha)->format('d-m-Y')}}</td>
                        <td>{{ $caja->monto}}</td>
                        <td>
                            @can('cajaChica_edit')
                            @include('cajaChica.edit', compact($caja -> id))
                            @endcan

                            @can('cajaChica_destroy')
                            <form action="{{ url('/cajas/'.$caja->id) }}" class="d-inline" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
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
        <a href="{{ url('/descargos/') }}" class="btn btn-success">Guardar Datos</a>
    </div>
</div>
@endsection

@section('js')

<script src=" https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script>
    $('#datosCctv').DataTable({
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