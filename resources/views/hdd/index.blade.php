@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection





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
            <center>LISTA DE DISCOS DUROS</center>
        </h1>
        @include('hdd.create')
        <div class="table-responsive">
            </br>
            <table class="table table-striped" id="datosHdd">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nº de Serie</th>
                        <th>Marca</th>
                        <th>Cantidad</th>
                        <th>Capacidad en TB</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hdds as $hdd)
                    @if($informes -> id == $hdd->informe_id)
                    <tr>
                        <td>{{ $hdd->id}}</td>
                        <td>{{ $hdd->numeroSerie}}</td>
                        <td>{{ $hdd->marca}}</td>
                        <td>{{ $hdd->cantidad}}</td>
                        <td>{{ $hdd->capacidad}}</td>
                        <td>
                            @include('hdd.edit', compact($hdd -> id))
                            <form action="{{ url('/hdds/'.$hdd->id) }}" class="d-inline" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar">
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            </br>


            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown button
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ url('/inventarioCctvs') }}">Inventario de CCTV</a>
                    <a class="dropdown-item" href="{{ url('/inventarioAlarmas') }}">Inventario de Alarmas</a>
                    <a class="dropdown-item" href="{{ url('/zonificaciones') }}">Zonificacion</a>
                    <a class="dropdown-item" href="{{ url('/usuariosAlarma') }}">Usuarios de Alarmas</a>
                    <a class="dropdown-item" href="{{ url('/numeros') }}">Numeros registrados</a>
                    <a class="dropdown-item" href="{{ url('/trabajosRealizados') }}">Trabajos Realizados</a>
                    <a class="dropdown-item" href="#">Planos</a>
                </div>
            </div>

        </div>
    </div>
</div>








@endsection

@section('js')

<script src=" https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script>
    $('#datosHdd').DataTable({
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