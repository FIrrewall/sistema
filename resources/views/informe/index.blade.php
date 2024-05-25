@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('title','Informes')

@section('content')
<div class="card card-dark">
    <div class="card-header">
        <table width=100%>
            <tr>
                <td align="left" width=5%>
                    <h2><i class="fas fa-clipboard-list"></i></h2>
                </td>
                <td align="center">
                    <h2>LISTA DE INFORMES</h2>
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

        <div class="table-responsive">
            @can('informes_create')
            <a href="{{ url('informes/create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Nuevo</a>
            @endcan
            <br />
            <br />
            <table class="table table-striped"" id="datos">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Tipo Informe</th>
                        <th>Departamento</th>
                        <th>Fecha</th>
                        <th>Ip Modulo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @if($user == 'Nestor Catari Mamani' || $user == 'Amilkar Calderon' )
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
                        <td>
                            @can('informes_edit')
                            <a href="{{ url('/informes/'.$informe->id.'/edit') }}" class="btn btn-warning">
                                <i class="fas fa-pen"></i>
                            </a>
                            @endcan
                            @can('informes_destroy')
                            <form action="{{ url('/informes/'.$informe->id) }}" class="d-inline formulario-eliminar" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @endcan
                            <!--AUMENTAR EL PERMISO Y ASIGNARLE AL ROL-->
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-eye"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ url('/datosHdd/'.$informe->id) }}"><i class="fas fa-hdd"></i> HDD</a>
                                <a class="dropdown-item" href="{{ url('/cctvInventario/'.$informe->id) }}"> <i class="fas fa-video"></i> Inventario CCTV</a>
                                <a class="dropdown-item" href="{{ url('/alarmaInventario/'.$informe->id) }}"> <i class="fas fa-bullhorn"></i> Inventario Alarmas</a>
                                <a class="dropdown-item" href="{{ url('/zonas/'.$informe->id) }}"> <i class="fas fa-th-list"></i> Zonificacion</a>
                                <a class="dropdown-item" href="{{ url('/alarmaUsuarios/'.$informe->id) }}"><i class="fas fa-address-book"></i> Usuarios de Alarmas</a>
                                <a class="dropdown-item" href="{{ url('/registroNumero/'.$informe->id) }}"> <i class="fas fa-address-card"></i> Registro de Numeros</a>
                                <a class="dropdown-item" href="{{ url('/trabajos/'.$informe->id) }}"><i class="fas fa-clipboard-check"></i> Trabajos realizados</a>
                                <a class="dropdown-item" href="{{ url('/planosAgencias/'.$informe->id) }}"><i class="fas fa-map-marked-alt"></i> Planos</a>
                            </div>
                            @can('informes_pdf')
                            <a href="{{ url('/informe/pdf/'.$informe->id) }}" class="btn btn-dark" onclick="alerta();">
                                <i class="far fa-file-pdf"></i>
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach

                    @else

                    @foreach($llenadoPor as $llenado)
                    <tr>
                        <td>{{ $llenado->id}}</td>
                        @if($llenado->nombreAgencia == "")
                        <td>{{ $llenado->nombreAtm}}</td>
                        @else
                        <td>{{ $llenado->nombreAgencia}}</td>
                        @endif
                        <td>{{ $llenado->tipoInforme}}</td>
                        <td>{{ $llenado->departamento}}</td>
                        <td>{{ \Carbon\Carbon::parse($llenado->fecha)->format('d-m-Y')}}</td>
                        <td>{{ $llenado->ipModulo}}</td>
                        <td>
                            @can('informes_edit')
                            <a href="{{ url('/informes/'.$llenado->id.'/edit') }}" class="btn btn-warning">
                                <i class="fas fa-pen"></i>
                            </a>
                            @endcan
                            @can('informes_destroy')
                            <form action="{{ url('/informes/'.$llenado->id) }}" class="d-inline formulario-eliminar" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger" type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @endcan
                            <!--AUMENTAR EL PERMISO Y ASIGNARLE AL ROL-->
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-eye"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ url('/datosHdd/'.$llenado->id) }}"><i class="fas fa-hdd"></i> HDD</a>
                                <a class="dropdown-item" href="{{ url('/cctvInventario/'.$llenado->id) }}"> <i class="fas fa-video"></i> Inventario CCTV</a>
                                <a class="dropdown-item" href="{{ url('/alarmaInventario/'.$llenado->id) }}"> <i class="fas fa-bullhorn"></i> Inventario Alarmas</a>
                                <a class="dropdown-item" href="{{ url('/zonas/'.$llenado->id) }}"> <i class="fas fa-th-list"></i> Zonificacion</a>
                                <a class="dropdown-item" href="{{ url('/alarmaUsuarios/'.$llenado->id) }}"><i class="fas fa-address-book"></i> Usuarios de Alarmas</a>
                                <a class="dropdown-item" href="{{ url('/registroNumero/'.$llenado->id) }}"> <i class="fas fa-address-card"></i> Registro de Numeros</a>
                                <a class="dropdown-item" href="{{ url('/trabajos/'.$llenado->id) }}"><i class="fas fa-clipboard-check"></i> Trabajos realizados</a>
                                <a class="dropdown-item" href="{{ url('/planosAgencias/'.$llenado->id) }}"><i class="fas fa-map-marked-alt"></i> Planos</a>
                            </div>
                            @can('informes_pdf')
                            <a href="{{ url('/informe/pdf/'.$llenado->id) }}" class="btn btn-dark" onclick="alerta();">
                                <i class="far fa-file-pdf"></i>
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach

                    @endif
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
        'El informe se guardo con éxito.',
        'success'
    )
</script>
@endif

@if (session('actualizar') == 'ok')
<script>
    Swal.fire(
        'Actualizado!',
        'El informe se actualizo con éxito.',
        'success'
    )
</script>
@endif
<script>
    $('.formulario-eliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: '¿Estas seguro?',
            text: "Este informe se eliminara definitivamente!",
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
            timer: 17000,
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
    $('#datos').DataTable({
        responsive: true,
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