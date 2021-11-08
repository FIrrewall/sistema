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
        <h1>
            <center>INFORME</center>
        </h1>
        <div class="table-responsive">
            <a href="{{ url('informes/create') }}" class="btn btn-success">Nuevo empleado</a>
            <br />
            <br />
            <table class="table table-striped" id="datos">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo Informe</th>
                        <th>Departamento</th>
                        <th>Fecha</th>
                        <th>Ip Modulo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($informes as $informe)
                    <tr>
                        <td>{{ $informe->id}}</td>
                        @if($informe->nombreAgencia == "")
                        <td>{{ $informe->nombreAtm}}</td>
                        @else
                        <td>{{ $informe->nombreAgencia}}</td>
                        @endif
                        <td>{{ $informe->tipoInforme}}</td>
                        <td>{{ $informe->departamento}}</td>
                        <td>{{ \Carbon\Carbon::parse($informe->fecha)->format('d-m-Y')}}</td>
                        <td>{{ $informe->ipModulo}}</td>
                        <td>{{ $informe->estado}}</td>
                        <td>
                            <a href="{{ url('/informes/'.$informe->id.'/edit') }}" class="btn btn-warning">
                                Editar
                            </a>
                            <form action="{{ url('/informes/'.$informe->id) }}" class="d-inline" method="post">
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

</div>
@endsection

@section('js')

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script>
    $('#datos').DataTable({
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