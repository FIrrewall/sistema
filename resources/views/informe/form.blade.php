@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="form-row">
    <!-- CARACTERISTICAS DE CLIENTE -->
    <div class="form-group col-md-4">
        <label for="inputEmail4">Cliente</label>
        <input type="text" class="form-control" name="cliente" value="{{ isset($informe->cliente)? $informe->cliente:old('cliente') }}" id="cliente" required>
    </div>
    <!-- CARACTERISTICAS DE DIRECCION -->
    <div class="form-group col-md-8">
        <label for="inputPassword4">Direccion</label>
        <input type="text" class="form-control" name="direccion" value="{{ isset($informe->direccion)? $informe->direccion:old('direccion') }}" id="direccion" required>
    </div>
    <!-- CARACTERISTICAS DE FECHA -->
    <div class="form-group col-md-4">
        <label for="fecha">Fecha</label>
        <input type="date" class="form-control" name="fecha" value="{{ isset($informe->fecha)? \Carbon\Carbon::parse($informe->fecha)->format('Y-m-d'):old('fecha') }}" id="fecha" required>
    </div>
    <!-- CARACTERISTICAS DE DEPARTAMENTO  tiempoGrabacion cctv alarams -->
    <div class="form-group col-md-4">
        <label for="departamento">Departamento</label>
        <select class="form-control" name="departamento" id="departamento">
            <option value="La Paz">La Paz</option>
            <option value="Oruro">Oruro</option>
            <option value="Potosi">Potosi</option>
            <option value="Cochabamba">Cochabamba</option>
            <option value="Tarija">Tarija</option>
            <option value="Sucre">Sucre</option>
            <option value="Santa Cruz">Santa Cruz</option>
            <option value="Beni">Beni</option>
            <option value="Pando">Pando</option>
        </select>
    </div>

    <!-- CARACTERISTICAS DE DEPARTAMENTO -->
    <div class="form-group col-md-4">
        <label for="inputState">Informe para:</label>
        <select id="tipoInforme" name="tipoInforme" class="form-control">
            <option value="AGENCIA">AGENCIA</option>
            <option value="ATM">ATM</option>
        </select>
    </div>
</div>
<div class="form-row">
    <!-- CARACTERISTICAS DE FECHA -->
    <div class="form-group col-md-4">
        <label for="inputAddress">Nombre de Agencia:</label>
        <input id="nombreAgencia" type="text" class="form-control" name="nombreAgencia" value="{{ isset($informe->nombreAgencia)? $informe->nombreAgencia:old('nombreAgencia') }}" placeholder="">
    </div>
    <!-- CARACTERISTICAS DE FECHA -->
    <div class="form-group col-md-4">
        <label for="inputAddress">Nombre de Atm:</label>
        <input id="nombreAtm" type="text" class="form-control" disabled="disabled" name="nombreAtm" value="{{ isset($informe->nombreAtm)? $informe->nombreAtm:old('nombreAtm') }}" placeholder="">
    </div>

    <div class="form-group col-md-4">
        <label for="inputAddress">Tiempo de grabacion:</label>
        <input type="date" class="form-control" name="tiempoGrabacion" value="{{ isset($informe->tiempoGrabacion)? \Carbon\Carbon::parse($informe->tiempoGrabacion)->format('Y-m-d'):old('fecha') }}" id="tiempoGrabacion" required>
    </div>
</div>


<div class="form-row">
    <!-- CARACTERISTICAS DE MODELO PANEL -->
    <div class="form-group col-md-4">
        <label for="inputEmail4">Modelo De Panel</label>
        <input type="text" class="form-control" id="modeloPanel" name="modeloPanel" value="{{ isset($informe->modeloPanel)? $informe->modeloPanel:old('modeloPanel') }}" required>
    </div>
    <!-- CARACTERISTICAS DE MODELO PANEL -->
    <div class="form-group col-md-4">
        <label for="inputEmail4">Linea Telefonica</label>
        <input type="text" class="form-control" id="lineaTelefonica" name="lineaTelefonica" value="{{ isset($informe->lineaTelefonica)? $informe->lineaTelefonica:old('lineaTelefonica') }}" required>
    </div>


    <div class="form-group col-md-4">
        <label>Direccion IP del Modulo</label>

        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-laptop"></i></span>
            </div>
            <input type="text" class="form-control" id="ipModulo" name="ipModulo" value="{{ isset($informe->ipModulo)? $informe->ipModulo:old('ipModulo') }}" required>
        </div>
        <!-- /.input group -->
    </div>

</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="observaciones">Resumen CCTV</label>
        <textarea class="form-control" type="text" id="cctv" name="cctv" required>{{ isset($informe->cctv)? $informe->cctv:old('cctv') }}</textarea>
    </div>
    <div class="form-group col-md-6">
        <label for="observaciones">Resumen Alarmas</label>
        <textarea class="form-control" type="text" id="alarmas" name="alarmas" required>{{ isset($informe->alarmas)? $informe->alarmas:old('alarmas') }}</textarea>
    </div>
</div>
<!-- CARACTERISTICAS DE OBSERVACIONES -->
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="observaciones">Observaciones</label>
        <textarea class="form-control" type="text" id="observaciones" name="observaciones" required>{{ isset($informe->observaciones)? $informe->observaciones:old('observaciones') }}</textarea>
    </div>
    <!-- CARACTERISTICAS DE RECOMENDACIONES -->
    <div class="form-group col-md-6">
        <label for="recomendaciones">Recomendaciones</label>
        <textarea class="form-control" type="text" id="recomendaciones" name="recomendaciones" required>{{ isset($informe->recomendaciones)? $informe->recomendaciones:old('recomendaciones') }}</textarea>
    </div>
</div>
<div class="form-group col-md-4">
    <label for="inputState">Autor</label>
    <select class="form-control" name="estado" id="estado">
        <option value="{{$user}}">{{$user}}</option>
    </select>
</div>
</br>
<div class="modal-footer justify-content-between">
    @csrf
    <a href="{{ url('/informes') }}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Atras</a>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
</div>


@section('js')

<script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.js'></script>
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#departamento > option[value="{{isset($informe->departamento)? $informe->departamento:old(' + departamento + ')}}"]').attr('selected', 'selected');
        $('#estado > option[value="{{ isset($informe->estado)? $informe->estado:' + estado + '}}"]').attr('selected', 'selected');
        $('#tipoInforme').change(function(e) {
            if ($(this).val() === "AGENCIA") {
                $('#nombreAtm').prop("disabled", true);
            } else {
                $('#nombreAtm').prop("disabled", false);
            }
            if ($(this).val() === "ATM") {
                $('#nombreAgencia').prop("disabled", true);
            } else {
                $('#nombreAgencia').prop("disabled", false);
            }
        })
        $('#tipoInforme > option[value="{{ isset($informe->tipoInforme)? $informe->tipoInforme:' + tipoInforme + '}}"]').attr('selected', 'selected');

    });
</script>

@include('sweetalert::alert')



@endsection