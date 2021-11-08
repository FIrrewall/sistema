<div class="form-row">

    <div class="form-group col-md-4">
        <!--<input type="number" class="form-control" name="informe_id" value="{{ $informes->id}}" id="informe_id">-->

        <select id="informe_id" name="informe_id" class="form-control">
            <option value="{{ $informes->id}}">{{ $informes->tipoInforme}}</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Nombre del Modulo</label>
    <input type="text" class="form-control" name="nombreModulo" value="{{ isset($zona->nombreModulo)? $zona->nombreModulo:old('nombreModulo') }}" id="nombreModulo">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Numero de Serie</label>
    <input type="text" class="form-control" name="numeroSerie" value="{{ isset($zona->numeroSerie)? $zona->numeroSerie:old('numeroSerie') }}" id="numeroSerie">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Numero de Zona</label>
    <input type="number" class="form-control" name="numeroZona" value="{{ isset($zona->numeroZona)? $zona->numeroZona:old('numeroZona') }}" id="numeroZona">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Numero de Particion</label>
    <input type="number" class="form-control" name="numeroParticion" value="{{ isset($zona->numeroParticion)? $zona->numeroParticion:old('numeroParticion') }}" id="numeroParticion">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Nombre Particion</label>
    <input type="text" class="form-control" name="nombreParticion" value="{{ isset($zona->nombreParticion)? $zona->nombreParticion:old('nombreParticion') }}" id="nombreParticion">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Nombre del Sensor</label>
    <input type="text" class="form-control" name="nombreSensor" value="{{ isset($zona->nombreSensor)? $zona->nombreSensor:old('nombreSensor') }}" id="nombreSensor">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Descripcion</label>
    <input type="text" class="form-control" name="descripcion" value="{{ isset($zona->descripcion)? $zona->descripcion:old('descripcion') }}" id="descripcion">
</div>

<div class="modal-footer">
    @csrf
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>