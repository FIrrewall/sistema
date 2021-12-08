<div class="form-row">

    <div class="form-group col-md-4">
        <select id="informe_id" name="informe_id" class="form-control">
            <option value="{{$id}}">{{$id}}</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Nombre del Equipo</label>
    <input type="text" class="form-control" name="nombreEquipo" value="{{ isset($inCctv->nombreEquipo)? $inCctv->nombreEquipo:old('nombreEquipo') }}" id="nombreEquipo">
</div>
<div class="form-group">
    <label for="exampleFormControlInput1">Cantidad</label>
    <input type="number" class="form-control" name="cantidad" value="{{ isset($inCctv->cantidad)? $inCctv->cantidad:old('cantidad') }}" id="cantidad">
</div>

<div class="modal-footer">
    @csrf
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
</div>