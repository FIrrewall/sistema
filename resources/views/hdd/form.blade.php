<div class="form-row">
    <div class="form-group col-md-4">
        <select id="informe_id" name="informe_id" class="form-control">
            <option value="{{$id}}">{{$id}}</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="exampleFormControlInput1">Numero de Serie</label>
    <input type="text" class="form-control" name="numeroSerie" value="{{ isset($hdd->numeroSerie)? $hdd->numeroSerie:old('numeroSerie') }}" id="numeroSerie">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Marca</label>
    <input type="text" class="form-control" name="marca" value="{{ isset($hdd->marca)? $hdd->marca:old('marca') }}" id="marca">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Cantidad</label>
    <input type="number" class="form-control" name="cantidad" value="{{ isset($hdd->cantidad)? $hdd->cantidad:old('cantidad') }}" id="cantidad">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Capacidad</label>
    <input type="text" class="form-control" name="capacidad" value="{{ isset($hdd->capacidad)? $hdd->capacidad:old('capacidad') }}" id="capacidad">
</div>

<div class="modal-footer">
    @csrf
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>