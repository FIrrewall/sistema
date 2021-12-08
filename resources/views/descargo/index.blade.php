@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('title','Descargos')

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
            <center>LISTA DE DESCARGOS</center>
        </h1>
        <!--<a href="{{ url('inventarios/create') }}" class="btn btn-info">Nuevo Inventario</a>-->
        @include('descargo.create')
        <br />
        <br />
        <table class="table table-striped" id="empleado">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Departamento</th>
                    <th>Solicitante</th>
                    <th>Fecha</th>
                    <th>Desde</th>
                    <th>Hasta</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach($descargos as $descargo)
                <tr>
                    <td>{{ $descargo->id}}</td>
                    <td>{{ $descargo->departamento}}</td>
                    <td>{{ $descargo->nombreSolicitante}}</td>
                    <td>{{ \Carbon\Carbon::parse($descargo->fecha)->format('d-m-Y')}}</td>
                    <td>{{ \Carbon\Carbon::parse($descargo->fechaDesde)->format('d-m-Y')}}</td>
                    <td>{{ \Carbon\Carbon::parse($descargo->fechaHasta)->format('d-m-Y')}}</td>
                    <td>
                        
                        <!--
                        <form action="{{ url('/descargos/'.$descargo->id) }}" class="d-inline" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                        </form>-->
                        <div class="dropdown">
                            @can('descargos_edit')
                            @include('descargo.edit', compact($descargo -> id))
                            @endcan
                            @can('descargos_destroy')
                            <form action="{{ url('/descargos/'.$descargo->id) }}" class="d-inline" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                            </form>
                            @endcan
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                selec
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ url('/cajaChica/'.$descargo->id) }}">Caja chica</a>
                                <a class="dropdown-item" href="{{ url('/registroGastos/'.$descargo->id) }}">Gastos</a>
                                <a class="dropdown-item" href="{{ url('/registroPasajes/'.$descargo->id) }}">Pasajes</a>
                                <a class="dropdown-item" href="{{ url('/registroViaticos/'.$descargo->id) }}">Viaticos</a>
                            </div>
                        </div>
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