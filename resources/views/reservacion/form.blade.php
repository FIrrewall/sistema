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
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ isset($reserva->nombre)? $reserva->nombre:old('nombre') }}" required>
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Apellido Paterno</label>
                    <input type="text" class="form-control" id="paterno" name="paterno" value="{{ isset($reserva->paterno)? $reserva->paterno:old('paterno') }}" required>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Apellido Materno</label>
                    <input type="text" class="form-control" id="materno" name="materno" value="{{ isset($reserva->materno)? $reserva->materno:old('materno') }}" required>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">CI</label>
                    <input type="text" class="form-control" id="ci" name="ci" value="{{ isset($reserva->ci)? $reserva->ci:old('ci') }}" required>
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Edad</label>
                    <input type="number" class="form-control" id="edad" name="edad" value="{{ isset($reserva->edad)? $reserva->edad:old('edad') }}" required>
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
                    <input type="text" class="form-control" id="nombreacompañante" name="nombreacompañante" value="{{ isset($reserva->nombreacompañante)? $reserva->nombreacompañante:old('nombreacompañante') }}">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Apellido Paterno</label>
                    <input type="text" class="form-control" id="paternoacompañante" name="paternoacompañante" value="{{ isset($reserva->paternoacompañante)? $reserva->paternoacompañante:old('paternoacompañante') }}">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Apellido Materno</label>
                    <input type="text" class="form-control" id="maternoacompañante" name="maternoacompañante" value="{{ isset($reserva->maternoacompañante)? $reserva->maternoacompañante:old('maternoacompañante') }}">
                </div>
                <div class="form-group">
                    <label for="inputEmail4">CI</label>
                    <input type="text" class="form-control" id="ciacompañante" name="ciacompañante" value="{{ isset($reserva->ciacompañante)? $reserva->ciacompañante:old('ciacompañante') }}">
                </div>
                <div class="form-group">
                    <label for="inputPassword4">Edad</label>
                    <input type="number" class="form-control" id="edadacompañante" name="edadacompañante" value="{{ isset($reserva->edadacompañante)? $reserva->edadacompañante:old('edadacompañante') }}">
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
        <select id="habitacion_id" name="habitacion_id" class="form-control">
            @foreach($habita as $hab)
            @if($hab->estadoH != 'OCUPADO' && $hab->estadoH != 'SUCIO')
            <option value="{{$hab->id}}">{{$hab->numhabitacion}} {{$hab->preferencias}}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="inputState">Tipo de servicio</label>
        <select id="tiempo" name="tiempo" class="form-control">
            <option value="TEMPORAL" selected>TEMPORAL</option>
            <option value="NOCHE">TODA LA NOCHE</option>
        </select>
    </div>
</div>


<!--
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="inputEmail4">Costo de Habitacion</label>
        <input type="number" step="0.1" class="form-control" id="costohabitacion" name="costohabitacion" value="{{ isset($reserva->costohabitacion)? $reserva->costohabitacion:old('costohabitacion') }}">
    </div>
    <div class="form-group col-md-4">
        <label for="inputPassword4">Costo Extra</label>
        <input type="number" step="0.1" class="form-control" id="costoExtra" name="costoExtra" value="{{ isset($reserva->costoExtra)? $reserva->costoExtra:old('costoExtra') }}">
    </div>
    <div class="form-group col-md-4">
        <label for="inputEmail4">Total</label>
        <input type="number" step="0.1" class="form-control" id="total" name="total" value="{{ isset($reserva->total)? $reserva->total:old('total') }}">
    </div>
</div>-->


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
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> {{$modo}}</button>
</div>



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