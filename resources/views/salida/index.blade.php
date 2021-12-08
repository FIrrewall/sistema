@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('title','Salidas')

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
            <center>SALIDAS</center>
        </h1>
        
        @include('salida.create')
        <br />
        <br />
        <table class="table table-striped" id="empleado">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom. Proyeyecto</th>
                    <th># Nota</th>
                    <th>Codigo</th>
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th># Serie</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($salidas as $salida)
                @if($id == $salida->inventari_id)
                <tr>
                    <td>{{ $salida->id}}</td>
                    <td>{{ $salida->nombreProyecto}}</td>
                    <td>{{ $salida->numeroNota}}</td>
                    <td>{{ $salida->codigo}}</td>
                    <td>{{ \Carbon\Carbon::parse($salida->fecha)->format('d-m-Y')}}</td>
                    <td>{{ $salida->descripcion}}</td>
                    <td>{{ $salida->numeroSerie}}</td>
                    <td>{{ $salida->cantidad}}</td>
                    <td>
                        @can('salidas_edit')
                        @include('salida.edit', compact($salida -> id))
                        @endcan
                        @can('salidas_destroy')
                        <form action="{{ url('/salidas/'.$salida->id)}}" class="d-inline" method="post">
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