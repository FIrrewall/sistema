@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('title','Entradas')

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
        <h1>
            <center>ENTRADAS</center>
        </h1>
        <!--<a href="{{ url('inventarios/create') }}" class="btn btn-info">Nuevo Inventario</a>-->
        @include('entrada.create')
        <br />
        <br />
        <table class="table table-striped" id="empleado">
            <thead>
                <tr>
                    <th>ID</th>
                    <th># Factura</th>
                    <th># Nota</th>
                    <th>Fecha</th>
                    <th>Codigo</th>
                    <th>Descripcion</th>
                    <th># Serie</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($entradas as $entrada)
                @if($id == $entrada->inventari_id)
                <tr>
                    <td>{{ $entrada->id}}</td>
                    <td>{{ $entrada->numeroFactura}}</td>
                    <td>{{ $entrada->numeroNota}}</td>
                    <td>{{ \Carbon\Carbon::parse($entrada->fecha)->format('d-m-Y')}}</td>
                    <td>{{ $entrada->codigo}}</td>
                    <td>{{ $entrada->descripcion}}</td>
                    <td>{{ $entrada->numeroSerie}}</td>
                    <td>{{ $entrada->cantidad}}</td>
                    <td>
                        @can('entradas_edit')
                        @include('entrada.edit', compact($entrada -> id))
                        @endcan
                        @can('entradas_destroy')
                        <form action="{{ url('/entradas/'.$entrada->id) }}" class="d-inline" method="post">
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
        <a href="{{ url('/existenteInventario/'.$id) }}" class="btn btn-success">Volver</a>
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