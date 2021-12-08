@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('title','Usuarios')

@section('content')
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
            <center>LISTA DE ROLES</center>
        </h1>
        <a href="{{ url('roles/create') }}" class="btn btn-success">Nuevo rol</a>
        <br />
        <br />
        <table class="table table-striped" id="empleado">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Servicio</th>
                    <th>Fecha de creacion</th>
                    <th>Permisos</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @forelse($roles as $rol)
                <tr>
                    <td>{{ $rol->id}}</td>
                    <td>{{ $rol->name}}</td>
                    <td>{{ $rol->guard_name}}</td>
                    <td>{{ \Carbon\Carbon::parse($rol->created_at)->format('d-m-Y')}}</td>
                    <td>
                        @forelse ($rol->permissions as $permission)
                        <span class="badge badge-info">{{$permission->name}}</span>
                        @empty
                        <span class="badge badge-danger">No asignado</span>
                        @endforelse
                    </td>
                    <td>

                        <a href="{{ url('/roles/'.$rol->id.'/edit') }}" class="btn btn-dark">Nuevo rol</a>

                        <form action="{{ url('/roles/'.$rol->id) }}" class="d-inline" method="post">
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
                                        <option value = '5'>5</option>                        
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