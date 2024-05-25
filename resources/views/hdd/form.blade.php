<div class="form-row">
    <div class="form-group col-md-10">
        <select id="informe_id" name="informe_id" class="form-control">
            <option value="{{$id}}">{{$resul}}</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label for="exampleFormControlInput1">Numero de Serie</label>
    <input type="text" class="form-control" name="numeroSerie" value="{{ isset($hdd->numeroSerie)? $hdd->numeroSerie:old('numeroSerie') }}" id="numeroSerie" required>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Marca</label>
    <input type="text" class="form-control" name="marca" value="{{ isset($hdd->marca)? $hdd->marca:old('marca') }}" id="marca" required>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Cantidad</label>
    <input type="number" class="form-control" name="cantidad" value="{{ isset($hdd->cantidad)? $hdd->cantidad:old('cantidad') }}" id="cantidad" required>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Capacidad en TB</label>
    <input type="text" class="form-control" name="capacidad" value="{{ isset($hdd->capacidad)? $hdd->capacidad:old('capacidad') }}" id="capacidad" required>
</div>

<div class="modal-footer justify-content-between">
    @csrf
    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline-light">{{$modo}}</button>
</div>