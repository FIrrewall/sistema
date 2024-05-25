@extends('adminlte::page')

@section('content')
<div class="container">
    <div class="card card-info">
        <div class="card-header">
            <table width=100%>
                <tr>
                    <td align="left" width=5%>
                        <h2><i class="fas fa-clipboard"></i></h2>
                    </td>
                    <td align="center">
                        <h2> ACTUALIZAR INFORME</h2>
                    </td>
                </tr>
            </table>
        </div>
        <form action="{{ url('/reservacion/'.$reserva->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-info collapsed-card">
                            <div class="card-header">
                                <h1 class="card-title"> <i class="fas fa-male"></i> DATOS VARON</h1>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="display: block;">
                                <div class="form-group">
                                    <label for="inputEmail4">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$reserva->nombre}}">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword4">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="paterno" name="paterno" value="{{$reserva->paterno}}">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4">Apellido Materno</label>
                                    <input type="text" class="form-control" id="materno" name="materno" value="{{$reserva->materno}}">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4">CI</label>
                                    <input type="text" class="form-control" id="ci" name="ci" value="{{$reserva->ci}}">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword4">Edad</label>
                                    <input type="number" class="form-control" id="edad" name="edad" value="{{$reserva->edad}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-danger collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title"><i class="fas fa-female"></i> DATOS PAREJA</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="display: block;">
                                <div class="form-group">
                                    <label for="inputEmail4">Nombres</label>
                                    <input type="text" class="form-control" id="nombreacompañante" name="nombreacompañante" value="{{$reserva->nombreacompañante}}">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword4">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="paternoacompañante" name="paternoacompañante" value="{{$reserva->paternoacompañante}}">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4">Apellido Materno</label>
                                    <input type="text" class="form-control" id="maternoacompañante" name="maternoacompañante" value="{{$reserva->maternoacompañante }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4">CI</label>
                                    <input type="text" class="form-control" id="ciacompañante" name="ciacompañante" value="{{$reserva->ciacompañante }}">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword4">Edad</label>
                                    <input type="number" class="form-control" id="edadacompañante" name="edadacompañante" value="{{$reserva->edadacompañante}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputState">Estado</label>
                        <select id="compañia" name="compañia" class="form-control">
                            <option value="ACOMPAÑADO" selected>CON PAREJA</option>
                            <option value="SOLO">SOLO</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Habitacion</label>
                        <select id="habitacion_id" name="habitacion_id" class="form-control" disabled>
                            @foreach($habita as $habi)
                            @if($habi->id == $reserva->habitacion_id)
                            <option value="{{$habi->id}}" selected>{{$habi->numhabitacion}} {{$habi->preferencias}}</option>
                            @elseif($habi->estadoH != 'OCUPADO')
                            <option value="{{$habi->id}}">{{$habi->numhabitacion}} {{$habi->preferencias}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Tipo de servicio</label>
                        <select id="tiempo" name="tiempo" class="form-control" disabled>
                            <option value="TEMPORAL" selected>TEMPORAL</option>
                            <option value="NOCHE">TODA LA NOCHE</option>
                        </select>
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-2">
                        <!--HORA DE ENTRADAS-->
                        <input type="hidden" class="form-control" name="horaentrada" value="{{$hora}}" id="horaentrada" required>
                    </div>

                    <div class="form-group col-md-2">
                        <!--HORA DE SALIDAS-->
                        <input type="hidden" class="form-control" name="horasalida" value="{{$horasum}}" id="horasalida" required>
                    </div>
                    <div class="form-group col-md-2">
                        <!--FECHA-->
                        <input type="hidden" class="form-control" id="fecha" name="fecha" value="{{\Carbon\Carbon::parse($fec)->format('Y-m-d')}}">
                    </div>
                    <div class="form-group col-md-2">
                        <!--FECHA-->
                        <input type="hidden" class="form-control" id="encargado_id" name="encargado_id" value="{{$useer}}">
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    @csrf
                    <a href="{{ url('/reservacion') }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Actualizar</button>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection


@section('js')

<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.js'></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#compañia > option[value="{{isset($reserva->compañia)? $reserva->compañia:old(' + compañia + ')}}"]').attr('selected', 'selected');
        $('#tiempo > option[value="{{isset($reserva->tiempo)? $reserva->tiempo:old(' + tiempo + ')}}"]').attr('selected', 'selected');
        $('#habitacion_id > option[value="{{ isset($reserva->habitacion_id)? $reserva->habitacion_id:' + habitacion_id + '}}"]').attr('selected', 'selected');
        $('#compañia').change(function(e) {
            if ($(this).val() === "SOLO") {
                $('#nombreacompañante').prop("disabled", true);

            } else {
                $('#nombreacompañante').prop("disabled", false);

            }
            if ($(this).val() === "SOLO") {
                $('#paternoacompañante').prop("disabled", true);

            } else {
                $('#paternoacompañante').prop("disabled", false);

            }
            if ($(this).val() === "SOLO") {
                $('#maternoacompañante').prop("disabled", true);

            } else {
                $('#maternoacompañante').prop("disabled", false);

            }
            if ($(this).val() === "SOLO") {
                $('#edadacompañante').prop("disabled", true);

            } else {
                $('#edadacompañante').prop("disabled", false);

            }
            if ($(this).val() === "SOLO") {
                $('#ciacompañante').prop("disabled", true);

            } else {
                $('#ciacompañante').prop("disabled", false);
            }

        })

    });
</script>

@endsection